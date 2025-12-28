<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DetailedFormSubmitted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public array $data
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Format a value for display (simple formatting without extensive mappings).
     */
    private function formatValue(?string $value): string
    {
        if (empty($value)) {
            return 'N/A';
        }

        // Simple formatting: replace underscores with spaces and capitalize.
        return ucwords(str_replace(['_', '-'], ' ', $value));
    }

    /**
     * Format an array of values for display.
     */
    private function formatArray(array $values): string
    {
        if (empty($values)) {
            return 'N/A';
        }

        return implode(', ', array_map(fn ($v) => $this->formatValue($v), $values));
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $step1 = $this->data['step_1'] ?? [];
        $step2 = $this->data['step_2'] ?? [];
        $step3 = $this->data['step_3'] ?? [];
        $step4 = $this->data['step_4'] ?? [];
        $step5 = $this->data['step_5'] ?? [];
        $step6 = $this->data['step_6'] ?? [];
        $step7 = $this->data['step_7'] ?? [];
        $step8 = $this->data['step_8'] ?? [];
        $step9 = $this->data['step_9'] ?? [];

        $company = $step1['company'] ?? 'Unknown Company';
        $email = $step1['email'] ?? '';

        $message = (new MailMessage)
            ->subject('New Detailed Form Submission - ' . $company)
            ->greeting('New Detailed Form Submission')
            ->line('You have received a new detailed form submission from your website.');

        // Step 1: Contact Information.
        if (!empty($step1)) {
            $message->line('**Step 1: Contact Information**')
                ->line('**Name:** ' . ($step1['full_name'] ?? 'N/A'))
                ->line('**Email:** ' . ($step1['email'] ?? 'N/A'))
                ->line('**Phone:** ' . ($step1['phone'] ?? 'N/A'))
                ->line('**Company:** ' . ($step1['company'] ?? 'N/A'))
                ->line('**Website/Social:** ' . ($step1['website_social'] ?? 'N/A'))
                ->line('**Industry:** ' . ($step1['industry'] ?? 'N/A'));
        }

        // Step 2: Platform Information.
        if (!empty($step2)) {
            $message->line('**Step 2: Platform Information**')
                ->line('**Platform:** ' . $this->formatValue($step2['platform'] ?? null))
                ->line('**Has Live Chat:** ' . $this->formatValue($step2['has_live_chat'] ?? null));
        }

        // Step 3: Communication Channels.
        if (!empty($step3)) {
            $message->line('**Step 3: Communication Channels**')
                ->line('**Channels:** ' . $this->formatArray($step3['channels'] ?? []));

            if (!empty($step3['integration_goal'])) {
                $message->line('**Integration Goal:**')
                    ->line($step3['integration_goal']);
            }
        }

        // Step 4: Functions.
        if (!empty($step4)) {
            $message->line('**Step 4: Desired Functions**')
                ->line('**Functions:** ' . $this->formatArray($step4['functions'] ?? []));

            if (!empty($step4['additional_details'])) {
                $message->line('**Additional Details:**')
                    ->line($step4['additional_details']);
            }
        }

        // Step 5: Email Marketing.
        if (!empty($step5)) {
            $emailPlatform = $this->formatValue($step5['email_platform'] ?? null);
            $emailTypes = $this->formatArray($step5['email_types'] ?? []);
            $message->line('**Step 5: Email Marketing**')
                ->line('**Email Platform:** ' . $emailPlatform)
                ->line('**Email Types:** ' . $emailTypes);
        }

        // Step 6: Content & Operations.
        if (!empty($step6)) {
            $readyContent = $this->formatValue($step6['ready_content'] ?? null);
            $operatingHours = $this->formatValue($step6['operating_hours'] ?? null);
            $message->line('**Step 6: Content & Operations**')
                ->line('**Ready Content:** ' . $readyContent)
                ->line('**Operating Hours:** ' . $operatingHours);
        }

        // Step 7: Software Integration.
        if (!empty($step7)) {
            $softwareType = $this->formatValue($step7['software_type'] ?? null);
            $desiredFunctions = $this->formatArray($step7['desired_functions'] ?? []);
            $apiAccess = $this->formatValue($step7['api_access'] ?? null);
            $message->line('**Step 7: Software Integration**')
                ->line('**Software Type:** ' . $softwareType)
                ->line('**Software Name:** ' . ($step7['software_name'] ?? 'N/A'))
                ->line('**Desired Functions:** ' . $desiredFunctions)
                ->line('**API Access:** ' . $apiAccess);
        }

        // Step 8: Team Information.
        if (!empty($step8)) {
            $technicalPerson = $this->formatValue($step8['technical_person_available'] ?? null);
            $message->line('**Step 8: Team Information**')
                ->line('**Website Manager:** ' . ($step8['website_manager'] ?? 'N/A'))
                ->line('**Technical Person Available:** ' . $technicalPerson)
                ->line('**Social Media Manager:** ' . ($step8['social_media_manager'] ?? 'N/A'));
        }

        // Step 9: Additional Information.
        if (!empty($step9)) {
            $message->line('**Step 9: Additional Information**');

            if (!empty($step9['expectations'])) {
                $message->line('**Expectations:**')
                    ->line($step9['expectations']);
            }

            if (!empty($step9['other_info'])) {
                $message->line('**Other Information:**')
                    ->line($step9['other_info']);
            }

            if (!empty($step9['additional_file_names'])) {
                $fileNames = $step9['additional_file_names'];
                $message->line('**Additional Files:**')
                    ->line(implode("\n", $fileNames));
            }
        }

        return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => $this->data,
        ];
    }
}
