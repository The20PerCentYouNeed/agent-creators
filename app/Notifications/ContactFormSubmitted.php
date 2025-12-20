<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormSubmitted extends Notification
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
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $businessSizeLabels = [
            'small' => 'Small (1-50 employees)',
            'medium' => 'Medium (51-200 employees)',
            'large' => 'Large (201-1000 employees)',
            'enterprise' => 'Enterprise (1000+ employees)',
        ];

        $industryLabels = [
            'technology' => 'Technology',
            'healthcare' => 'Healthcare',
            'finance' => 'Finance',
            'ecommerce' => 'E-commerce',
            'education' => 'Education',
            'manufacturing' => 'Manufacturing',
            'other' => 'Other',
        ];

        $message = (new MailMessage)
            ->subject('New Contact Form Submission - '.$this->data['company'])
            ->greeting('New Contact Form Submission')
            ->line('You have received a new contact form submission from your website.')
            ->line('**Contact Information**')
            ->line('**Name:** '.$this->data['full_name'])
            ->line('**Email:** '.$this->data['email'])
            ->line('**Phone:** '.$this->data['phone'])
            ->line('**Company:** '.$this->data['company'])
            ->line('**Business Size:** '.($businessSizeLabels[$this->data['business_size']] ?? $this->data['business_size']))
            ->line('**Industry:** '.($industryLabels[$this->data['industry']] ?? $this->data['industry']));

        if (! empty($this->data['project_description'])) {
            $message->line('**Project Description:**')
                ->line($this->data['project_description']);
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
