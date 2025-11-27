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
            'id' => 1,
            'role' => 'assistant',
            'text' => __('Γεια! Είμαι η Nyra. Πώς μπορώ να βοηθήσω σήμερα; Μπορείς να με ρωτήσεις οτιδήποτε σχετικά με τους AI agents και την πλατφόρμα μας.'),
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
                'id' => $message->id,
                'role' => $message->role,
                'text' => $this->removeMarkdownFormatting(trim(implode("\n", $textParts))),
                'created_at' => isset($message->createdAt) ? Carbon::createFromTimestamp($message->createdAt)->format('h:i A') : null,
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
