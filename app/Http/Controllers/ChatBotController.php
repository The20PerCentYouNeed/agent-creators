<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

            $run = OpenAI::threads()->runs()->create($threadId, [
                'assistant_id' => config('openai.assistant_id'),
            ]);
        }
        catch (\Exception $e) {
            Log::error('Failed to create thread or run', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Failed to connect to AI service. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 503);
        }

        // Handle the run with function calls.
        $maxIterations = 15;
        $iteration = 0;

        do {
            usleep(500000);

            try {
                $run = OpenAI::threads()->runs()->retrieve($threadId, $run->id);
            }
            catch (\Exception $e) {
                Log::error('Failed to retrieve run status', [
                    'error' => $e->getMessage(),
                    'thread_id' => $threadId,
                    'run_id' => $run->id ?? 'unknown',
                ]);

                return response()->json([
                    'error' => 'Connection error with AI service. Please try again.',
                    'details' => config('app.debug') ? $e->getMessage() : null,
                ], 503);
            }

            Log::info('Run status', ['status' => $run->status]);

            // Handle function calls.
            if ($run->status === 'requires_action') {
                $this->handleFunctionCalls($threadId, $run);
            }

            $iteration++;
        } while (in_array($run->status, ['queued', 'in_progress', 'requires_action']) && $iteration < $maxIterations);

        if ($run->status !== 'completed') {
            Log::error('Failed to get response from AI', ['status' => $run->status]);

            return response()->json([
                'error' => 'Failed to get response from AI',
                'status' => $run->status,
            ], 500);
        }

        try {
            $messages = OpenAI::threads()->messages()->list($threadId, [
                'limit' => 1,
            ]);

            $assistantMessage = $messages->data[0];
            $responseText = $assistantMessage->content[0]->text->value;
        }
        catch (\Exception $e) {
            Log::error('Failed to retrieve assistant message', [
                'error' => $e->getMessage(),
                'thread_id' => $threadId,
            ]);

            return response()->json([
                'error' => 'Failed to retrieve AI response. Please try again.',
                'details' => config('app.debug') ? $e->getMessage() : null,
            ], 503);
        }

        // Clean markdown symbols from response.
        $responseText = $this->removeMarkdownFormatting($responseText);

        return response()->json([
            'id' => $assistantMessage->id,
            'role' => $assistantMessage->role,
            'text' => $responseText,
            'created_at' => isset($assistantMessage->createdAt) ? Carbon::createFromTimestamp($assistantMessage->createdAt)->format('h:i A') : null,
        ]);
    }

    private function handleFunctionCalls(string $threadId, $run)
    {
        Log::info('Handling function calls', ['run' => $run]);
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
                    $errorMsg = 'Error: Invalid or unauthorized URL. '
                    . 'Only agent-creators.ai URLs are allowed.';
                    $toolOutputs[] = [
                        'tool_call_id' => $toolCall->id,
                        'output' => $errorMsg,
                    ];
                }
            }
        }

        // Submit tool outputs.
        if (!empty($toolOutputs)) {
            try {
                $run = OpenAI::threads()->runs()->submitToolOutputs($threadId, $run->id, [
                    'tool_outputs' => $toolOutputs,
                ]);
            }
            catch (\Exception $e) {
                Log::error('Failed to submit tool outputs', [
                    'error' => $e->getMessage(),
                    'thread_id' => $threadId,
                    'run_id' => $run->id ?? 'unknown',
                ]);

                throw $e;
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
     * Remove markdown formatting from text.
     */
    private function removeMarkdownFormatting(string $text): string
    {
        // Remove asterisks (single and double) used for bold/italic.
        $text = preg_replace('/\*{1,2}([^*]+)\*{1,2}/', '$1', $text);
        $text = preg_replace('/\*{1,2}/', '', $text);

        // Remove hash symbols used for headers.
        $text = preg_replace('/^#+\s*/m', '', $text);

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
