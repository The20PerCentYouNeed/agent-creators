<?php

namespace App\View\Components;

use App\Models\NyraConversation;
use Illuminate\View\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chatbot extends Component
{
    public ?string $threadId;

    public int $messageCount;

    public bool $hasRated;

    public function __construct()
    {
        $this->threadId = session('openai_thread_id');
        $this->messageCount = 0;
        $this->hasRated = false;

        if ($this->threadId) {
            $conversation = NyraConversation::where('thread_id', $this->threadId)->first();
            if ($conversation) {
                $this->messageCount = $conversation->message_count;
                $this->hasRated = $conversation->rating !== null;
            }
        }
    }

    public function render()
    {
        $messages = $this->fetchAllThreadMessages($this->threadId);

        return view('components.chatbot', [
            'messages' => $messages,
            'messageCount' => $this->messageCount,
            'hasRated' => $this->hasRated,
        ]);
    }

    protected function fetchAllThreadMessages(?string $threadId): array
    {
        $messages = [];

        $messages[] = [
            'id' => 1,
            'role' => 'assistant',
            'text' => __("Hi, I'm Nyra — the living case study of <a href=\":link\">noctuacore.ai</a>. I was created to show you how an AI Agent can work for you.", [
                'link' => localized_route('home'),
            ]),
        ];

        $messages[] = [
            'id' => 2,
            'role' => 'assistant',
            'text' => __('Where do you want to start from?'),
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
                'id' => $message->id,
                'role' => $message->role,
                'text' => $this->removeMarkdownFormatting(trim(implode("\n", $textParts))),
            ];
        }

        return $messages;
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
}
