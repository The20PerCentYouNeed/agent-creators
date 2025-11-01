<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatBotController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
        ]);

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
            'tools' => [
                ['type' => 'file_search'],
            ],
        ]);

        do {
            usleep(500000);
            $run = OpenAI::threads()->runs()->retrieve($threadId, $run->id);
        } while (in_array($run->status, ['queued', 'in_progress']));

        if ($run->status !== 'completed') {
            return response()->json([
                'error' => 'Failed to get response from AI',
            ], 500);
        }

        $messages = OpenAI::threads()->messages()->list($threadId, [
            'limit' => 1,
        ]);

        $assistantMessage = $messages->data[0];
        $responseText = $assistantMessage->content[0]->text->value;

        return response()->json([
            'message' => $responseText,
            'timestamp' => now()->format('h:i A'),
        ]);
    }
}
