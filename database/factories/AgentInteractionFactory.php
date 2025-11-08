<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgentInteraction>
 */
class AgentInteractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $intents = [
            'product_inquiry',
            'technical_support',
            'billing_question',
            'general_info',
            'complaint',
            'feature_request',
        ];

        $userQuestions = [
            'How do I reset my password?',
            'What are your pricing plans?',
            'I need help with my account.',
            'When will my order arrive?',
            'Can you help me understand this feature?',
            'I\'m experiencing a technical issue.',
            'How do I cancel my subscription?',
            'What payment methods do you accept?',
        ];

        $agentResponses = [
            'I\'d be happy to help you with that. Let me guide you through the process.',
            'Thank you for reaching out. Here\'s what you need to know...',
            'I understand your concern. Let me provide you with the information you need.',
            'Great question! Here\'s a detailed answer...',
            'I apologize for any inconvenience. Let me help you resolve this.',
        ];

        $statuses = ['success', 'error', 'timeout', 'partial'];
        $sentiments = ['positive', 'neutral', 'negative'];

        $status = fake()->randomElement($statuses);
        $tokensInput = fake()->numberBetween(10, 500);
        $tokensOutput = $status === 'success' ? fake()->numberBetween(50, 1000) : 0;
        $tokensTotal = $tokensInput + $tokensOutput;

        return [
            'agent_id' => \App\Models\Agent::factory(),
            'session_id' => fake()->uuid(),
            'user_identifier' => fake()->optional(0.7)->email() ?? 'anonymous_'.fake()->uuid(),
            'user_input' => fake()->randomElement($userQuestions),
            'agent_response' => $status === 'success' ? fake()->randomElement($agentResponses) : null,
            'intent' => fake()->randomElement($intents),
            'sentiment' => fake()->randomElement($sentiments),
            'tokens_input' => $tokensInput,
            'tokens_output' => $tokensOutput,
            'tokens_total' => $tokensTotal,
            'response_time_ms' => fake()->numberBetween(200, 5000),
            'cost' => ($tokensTotal / 1000) * 0.002, // Rough estimate
            'status' => $status,
            'error_message' => $status !== 'success' ? fake()->sentence() : null,
            'confidence_score' => $status === 'success' ? fake()->randomFloat(2, 70, 99) : null,
            'user_satisfaction' => fake()->optional(0.4)->numberBetween(1, 5),
            'escalated_to_human' => fake()->boolean(10), // 10% escalation rate
            'metadata' => [
                'ip_address' => fake()->ipv4(),
                'user_agent' => fake()->userAgent(),
            ],
        ];
    }

    public function successful(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'success',
            'agent_response' => fake()->sentence(20),
            'error_message' => null,
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'error',
            'agent_response' => null,
            'error_message' => fake()->sentence(),
            'tokens_output' => 0,
        ]);
    }
}
