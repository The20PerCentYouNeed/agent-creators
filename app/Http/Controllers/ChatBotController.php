<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;
use Symfony\Component\DomCrawler\Crawler;

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

            // Cancel any stuck runs before adding a new message.
            $this->cancelActiveRuns($threadId);

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
                    'url' => $url ?? 'unknown',
                ]);

                echo 'data: ' . json_encode(['error' => 'Failed to process function calls']) . "\n\n";
                ob_flush();
                flush();
            }
        }
    }

    private function isAllowedUrl(string $url): bool
    {
        $parsedUrl = parse_url($url);

        return isset($parsedUrl['host']) && str_ends_with($parsedUrl['host'], 'agent-creators.ai');
    }

    private function removeMarkdownFormatting(string $text): string
    {
        $text = preg_replace('/\*{1,2}([^*]+)\*{1,2}/', '$1', $text);
        $text = preg_replace('/\*{1,2}/', '', $text);

        $text = preg_replace('/^#+\s*/m', '', $text);

        return $text;
    }

    private function fetchUrlContent(string $url): string
    {
        try {
            $response = Http::timeout(10)->get($url);

            if (!$response->successful()) {
                return "Error: Could not fetch content from URL. Status: {$response->status()}";
            }

            $html = $response->body();

            $crawler = new Crawler($html);

            $crawler->filter('script, style, nav, header, footer, aside')->each(function (Crawler $node) {
                foreach ($node as $domNode) {
                    $domNode->parentNode->removeChild($domNode);
                }
            });

            $text = $crawler->filter('main, article, .content, body')->first();
            $textContent = $text->count() > 0 ? $text->text() : $crawler->filter('body')->text();

            $textContent = preg_replace('/\s+/', ' ', $textContent);
            $textContent = trim($textContent);

            return $textContent ?: 'No text content found on this page.';
        }
        catch (\Exception $e) {
            Log::error('Failed to fetch URL content', [
                'url' => $url,
                'error' => $e->getMessage(),
            ]);

            return "Error fetching URL: {$e->getMessage()}";
        }
    }

    /**
     * Cancel any active or stuck runs on a thread before adding new messages.
     */
    private function cancelActiveRuns(string $threadId): void
    {
        try {
            $runs = OpenAI::threads()->runs()->list($threadId, ['limit' => 5]);

            foreach ($runs->data as $run) {
                if (in_array($run->status, ['in_progress', 'requires_action', 'queued'])) {
                    OpenAI::threads()->runs()->cancel($threadId, $run->id);
                    Log::info('Cancelled stuck run', [
                        'thread_id' => $threadId,
                        'run_id' => $run->id,
                        'status' => $run->status,
                    ]);
                }
            }
        }
        catch (\Exception $e) {
            Log::warning('Failed to cancel active runs', [
                'thread_id' => $threadId,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
