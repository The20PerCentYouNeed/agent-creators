<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBotController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        try {
            if (!session()->has('openai_thread_id')) {
                $thread = OpenAI::threads()->create([]);
                session(['openai_thread_id' => $thread->id]);
            }

            $threadId = session('openai_thread_id');

            OpenAI::threads()->messages()->create($threadId, [
                'role' => 'user',
                'content' => $validated['message'],
            ]);
        }
        catch (\Exception $e) {
            Log::error('Failed to create thread or message', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Failed to connect to AI service. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 503);
        }

        return response()->stream(function () use ($threadId) {
            try {
                $this->streamAssistantResponse($threadId);
            }
            catch (\Exception $e) {
                Log::error('Streaming error', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);

                            echo 'data: ' . json_encode([
                                'error' => 'An error occurred during streaming',
                                'details' => config('app.debug') ? $e->getMessage() : null,
                            ]) . "\n\n";
                            ob_flush();
                            flush();

                            usleep(5000);
            }
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
            'Connection' => 'keep-alive',
        ]);
    }

    private function streamAssistantResponse(string $threadId): void
    {
        $stream = OpenAI::threads()->runs()->createStreamed($threadId, [
            'assistant_id' => config('openai.assistant_id'),
        ]);

        $fullText = '';
        $messageId = null;

        foreach ($stream as $response) {
            if (connection_aborted()) {
                break;
            }

            if ($response->event === 'thread.message.delta') {
                if (!empty($response->response->delta->content)) {
                    foreach ($response->response->delta->content as $content) {
                        if ($content->type === 'text' && $content->text->value !== null) {
                            $textChunk = $content->text->value;
                            $cleanedChunk = $this->removeMarkdownFormatting($textChunk);
                            $fullText .= $cleanedChunk;

                            echo $cleanedChunk;
                            ob_flush();
                            flush();

                            usleep(5000);
                        }
                    }
                }
            }

            if ($response->event === 'thread.message.created') {
                $messageId = $response->response->id;
            }

            if ($response->event === 'thread.run.requires_action') {
                $this->handleFunctionCallsStreamed($threadId, $response->response, $fullText, $messageId);
                break;
            }

            if ($response->event === 'thread.run.completed') {
                break;
            }

            if ($response->event === 'thread.run.failed' || $response->event === 'thread.run.cancelled') {
                echo 'data: ' . json_encode(['error' => 'The assistant run failed or was cancelled']) . "\n\n";
                ob_flush();
                flush();
                break;
            }
        }
    }

    private function handleFunctionCallsStreamed(string $threadId, $run, string &$fullText, ?string &$messageId): void
    {
        $toolCalls = $run->requiredAction->submitToolOutputs->toolCalls ?? [];
        $toolOutputs = [];

        foreach ($toolCalls as $toolCall) {
            if ($toolCall->function->name === 'fetch_url') {
                $url = json_decode($toolCall->function->arguments, true)['url'] ?? null;

                if ($url && $this->isAllowedUrl($url)) {
                    $content = $this->fetchUrlContent($url);
                    $toolOutputs[] = [
                        'tool_call_id' => $toolCall->id,
                        'output' => $content,
                    ];
                }
                else {
                    $errorMsg = 'Error: Invalid or unauthorized URL. Only agent-creators.ai URLs are allowed.';
                    $toolOutputs[] = [
                        'tool_call_id' => $toolCall->id,
                        'output' => $errorMsg,
                    ];
                }
            }
        }

        if (!empty($toolOutputs)) {
            try {
                $stream = OpenAI::threads()->runs()->submitToolOutputsStreamed($threadId, $run->id, [
                    'tool_outputs' => $toolOutputs,
                ]);

                foreach ($stream as $response) {
                    if (connection_aborted()) {
                        break;
                    }

                    if ($response->event === 'thread.message.delta') {
                        if (!empty($response->response->delta->content)) {
                            foreach ($response->response->delta->content as $content) {
                                if ($content->type === 'text' && $content->text->value !== null) {
                                    $textChunk = $content->text->value;
                                    $cleanedChunk = $this->removeMarkdownFormatting($textChunk);
                                    $fullText .= $cleanedChunk;

                                    echo $cleanedChunk;
                                    ob_flush();
                                    flush();

                                    usleep(5000);
                                }
                            }
                        }
                    }

                    if ($response->event === 'thread.message.created') {
                        $messageId = $response->response->id;
                    }

                    if ($response->event === 'thread.run.completed') {
                        break;
                    }
                }
            }
            catch (\Exception $e) {
                Log::error('Failed to submit tool outputs', [
                    'error' => $e->getMessage(),
                    'thread_id' => $threadId,
                    'run_id' => $run->id ?? 'unknown',
                ]);

                echo 'data: ' . json_encode(['error' => 'Failed to process function calls']) . "\n\n";
                ob_flush();
                flush();
            }
        }
    }

    /**
     * Check if URL is allowed (only agent-creators.ai).
     */
    private function isAllowedUrl(string $url): bool
    {
        $parsedUrl = parse_url($url);

        return isset($parsedUrl['host']) && str_ends_with($parsedUrl['host'], 'agent-creators.ai');
    }

    /**
     * Remove markdown formatting from text but preserve HTML anchor tags.
     */
    private function removeMarkdownFormatting(string $text): string
    {
        // Remove asterisks (single and double) used for bold/italic.
        $text = preg_replace('/\*{1,2}([^*]+)\*{1,2}/', '$1', $text);
        $text = preg_replace('/\*{1,2}/', '', $text);

        // Remove hash symbols used for headers.
        $text = preg_replace('/^#+\s*/m', '', $text);

        // Note: HTML anchor tags (<a href="...">...</a>) are preserved intentionally.
        return $text;
    }

    /**
     * Fetch and clean content from URL.
     */
    private function fetchUrlContent(string $url): string
    {
        try {
            $response = Http::timeout(10)->get($url);

            if (!$response->successful()) {
                return "Error: Could not fetch content from URL. Status: {$response->status()}";
            }

            $html = $response->body();

            // Remove script, style, and other non-content tags.
            $html = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/mi', '', $html);
            $html = preg_replace('/<style\b[^<]*(?:(?!<\/style>)<[^<]*)*<\/style>/mi', '', $html);
            $html = preg_replace('/<nav\b[^<]*(?:(?!<\/nav>)<[^<]*)*<\/nav>/mi', '', $html);
            $html = preg_replace('/<header\b[^<]*(?:(?!<\/header>)<[^<]*)*<\/header>/mi', '', $html);
            $html = preg_replace('/<footer\b[^<]*(?:(?!<\/footer>)<[^<]*)*<\/footer>/mi', '', $html);

            // Remove common navigation patterns.
            $html = preg_replace('/<a\b[^>]*>(.*?)<\/a>/i', '$1', $html);

            // Convert HTML to text.
            $text = strip_tags($html);

            // Clean up whitespace.
            $text = preg_replace('/\s+/', ' ', $text);
            $text = trim($text);

            // Limit length to avoid token limits (keep first 10000 characters for better context).
            if (strlen($text) > 10000) {
                $text = substr($text, 0, 10000) . '... [Content truncated]';
            }

            return $text ?: 'No text content found on this page.';
        }
        catch (\Exception $e) {
            return "Error fetching URL: {$e->getMessage()}";
        }
    }
}
