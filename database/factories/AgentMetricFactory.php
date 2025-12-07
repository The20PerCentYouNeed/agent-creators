<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AgentMetricFactory extends Factory
{
    public function definition(): array
    {
        $totalRequests = fake()->numberBetween(100, 300);
        $failureRate = fake()->randomFloat(2, 2, 6);
        $failedRequests = (int) ($totalRequests * ($failureRate / 100));
        $successfulRequests = $totalRequests - $failedRequests;

        $avgResponseTime = fake()->numberBetween(600, 1500);
        $p50 = (int) ($avgResponseTime * 0.7);
        $p95 = (int) ($avgResponseTime * 1.8);
        $p99 = (int) ($avgResponseTime * 2.5);

        $avgTokensPerRequest = fake()->numberBetween(400, 600);
        $totalTokens = $totalRequests * $avgTokensPerRequest;
        $totalTokensInput = (int) ($totalTokens * 0.35);
        $totalTokensOutput = $totalTokens - $totalTokensInput;

        $costInput = ($totalTokensInput / 1_000_000) * 2.50;
        $costOutput = ($totalTokensOutput / 1_000_000) * 10.00;
        $totalCost = $costInput + $costOutput;

        return [
            'agent_id' => \App\Models\Agent::factory(),
            'date' => fake()->dateTimeBetween('-30 days', 'now'),
            'total_requests' => $totalRequests,
            'successful_requests' => $successfulRequests,
            'failed_requests' => $failedRequests,
            'error_rate' => $failureRate,
            'avg_response_time_ms' => $avgResponseTime,
            'p50_response_time_ms' => $p50,
            'p95_response_time_ms' => $p95,
            'p99_response_time_ms' => $p99,
            'total_tokens_input' => $totalTokensInput,
            'total_tokens_output' => $totalTokensOutput,
            'total_tokens' => $totalTokens,
            'total_cost' => round($totalCost, 2),
            'unique_users' => fake()->numberBetween((int) ($totalRequests * 0.6), (int) ($totalRequests * 0.8)),
            'avg_satisfaction_score' => fake()->randomFloat(2, 4.0, 4.8),
            'escalation_count' => fake()->numberBetween(0, (int) ($totalRequests * 0.05)),
            'peak_hour' => fake()->randomElement([9, 10, 11, 14, 15]),
        ];
    }

    public function forDate(string $date): static
    {
        return $this->state(fn (array $attributes) => [
            'date' => $date,
        ]);
    }
}
