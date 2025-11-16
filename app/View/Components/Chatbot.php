<?php

namespace App\View\Components;

use Illuminate\Support\Carbon;
use Illuminate\View\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chatbot extends Component
{
    public $threadId;

    public function __construct()
    {
        $this->threadId = session('openai_thread_id');
    }

    public function render()
    {

        $messages = $this->fetchAllThreadMessages($this->threadId);

        return view('components.chatbot', [
            'messages' => $messages,
        ]);
    }

    protected function fetchAllThreadMessages(?string $threadId): array
    {
        $messages = [];

        $messages[] = [
            'id'         => 1,
            'role'       => 'assistant',
            'text'       => __('Hello! How can I help you today? Feel free to ask me anything about AI agent creators and our platform.'),
            'created_at' => now()->format('h:i A'),
        ];

        if (!$threadId) {
            return $messages;
        }

        $params = [
            'limit' => 100,
            'order' => 'asc',
        ];

        $page = OpenAI::threads()->messages()->list($threadId ?? '', $params);

        foreach ($page->data as $message) {
            $textParts = [];
            foreach ($message->content as $part) {
                if (isset($part->type) && $part->type === 'text' && isset($part->text->value)) {
                    $textParts[] = $part->text->value;
                }
            }

            $messages[] = [
                'id'         => $message->id,
                'role'       => $message->role,
                'text'       => trim(implode("\n", $textParts)),
                'created_at' => isset($message->createdAt) ? Carbon::createFromTimestamp($message->createdAt)->format('h:i A') : null,
            ];
        }

        return $messages;
    }
}
