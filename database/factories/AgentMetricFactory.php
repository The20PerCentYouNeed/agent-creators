<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AgentMetric>
 */
class AgentMetricFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalRequests = fake()->numberBetween(100, 5000);
        $failureRate = fake()->randomFloat(2, 0, 15); // 0-15% failure rate
        $failedRequests = (int) ($totalRequests * ($failureRate / 100));
        $successfulRequests = $totalRequests - $failedRequests;

        $avgResponseTime = fake()->numberBetween(300, 2000);
        $p50 = (int) ($avgResponseTime * 0.8);
        $p95 = (int) ($avgResponseTime * 1.5);
        $p99 = (int) ($avgResponseTime * 2);

        $totalTokensInput = fake()->numberBetween(50000, 500000);
        $totalTokensOutput = fake()->numberBetween(100000, 1000000);
        $totalTokens = $totalTokensInput + $totalTokensOutput;

        return [
            'agent_id' => \App\Models\Agent::factory(),
            'date' => fake()->dateTimeBetween('-90 days', 'now'),
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
            'total_cost' => ($totalTokens / 1000) * 0.002, // Rough cost estimate
            'unique_users' => fake()->numberBetween(50, (int) ($totalRequests * 0.7)),
            'avg_satisfaction_score' => fake()->randomFloat(2, 3.5, 5.0),
            'escalation_count' => fake()->numberBetween(0, (int) ($totalRequests * 0.1)),
            'peak_hour' => fake()->numberBetween(9, 17), // Business hours
        ];
    }

    public function forDate(string $date): static
    {
        return $this->state(fn (array $attributes) => [
            'date' => $date,
        ]);
    }
}
