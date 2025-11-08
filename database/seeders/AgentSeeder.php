<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\AgentInteraction;
use App\Models\AgentMetric;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Creating agents for this company...');

        $agentCount = rand(5, 8);

        for ($i = 0; $i < $agentCount; $i++) {
            $agent = Agent::factory()
                ->active()
                ->create();

            $this->command->info("  Created agent: {$agent->name} ({$agent->type})");

            $this->createInteractions($agent);

            $this->createDailyMetrics($agent);
        }

        $this->command->info('✅ Agent seeding completed!');
        $this->command->newLine();
        $this->command->info('Summary:');
        $this->command->info('  Agents: ' . \App\Models\Agent::count());
        $this->command->info('  Interactions: ' . \App\Models\AgentInteraction::count());
        $this->command->info('  Daily Metrics: ' . \App\Models\AgentMetric::count());
    }

    private function createInteractions(Agent $agent): void
    {
        $interactionCount = rand(30, 60);

        for ($i = 0; $i < $interactionCount; $i++) {
            $createdAt = Carbon::now()->subDays(rand(0, 7))->subHours(rand(0, 23));

            AgentInteraction::factory()
                ->for($agent)
                ->successful()
                ->create([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
        }

        $failedCount = (int) ($interactionCount * 0.08);
        for ($i = 0; $i < $failedCount; $i++) {
            $createdAt = Carbon::now()->subDays(rand(0, 7))->subHours(rand(0, 23));

            AgentInteraction::factory()
                ->for($agent)
                ->failed()
                ->create([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
        }
    }

    private function createDailyMetrics(Agent $agent): void
    {
        // Generate metrics with an upward trend for marketing purposes
        for ($daysAgo = 29; $daysAgo >= 0; $daysAgo--) {
            $date = Carbon::now()->subDays($daysAgo)->format('Y-m-d');

            // Growth factor: increases as we get closer to today (from 0.5 to 1.5)
            $growthFactor = 0.5 + (29 - $daysAgo) / 29; // 0.5 at day 29, 1.5 at day 0

            // Base numbers that will be multiplied by growth factor
            $baseRequests = rand(400, 800);
            $totalRequests = (int) ($baseRequests * $growthFactor);
            $failureRate = rand(2, 8); // 2-8% failure rate (92-98% success)
            $failedRequests = (int) ($totalRequests * ($failureRate / 100));
            $successfulRequests = $totalRequests - $failedRequests;

            // Response times improve slightly over time (newer = better optimized)
            $baseResponseTime = rand(1000, 1800);
            $avgResponseTime = (int) ($baseResponseTime / $growthFactor * 0.9); // Slight improvement over time
            $p50 = (int) ($avgResponseTime * 0.8);
            $p95 = (int) ($avgResponseTime * 1.5);
            $p99 = (int) ($avgResponseTime * 2);

            $totalTokensInput = rand(50000, 150000) * $growthFactor;
            $totalTokensOutput = rand(100000, 300000) * $growthFactor;
            $totalTokens = $totalTokensInput + $totalTokensOutput;

            AgentMetric::create([
                'agent_id' => $agent->id,
                'date' => $date,
                'total_requests' => $totalRequests,
                'successful_requests' => $successfulRequests,
                'failed_requests' => $failedRequests,
                'error_rate' => $failureRate,
                'avg_response_time_ms' => $avgResponseTime,
                'p50_response_time_ms' => $p50,
                'p95_response_time_ms' => $p95,
                'p99_response_time_ms' => $p99,
                'total_tokens_input' => (int) $totalTokensInput,
                'total_tokens_output' => (int) $totalTokensOutput,
                'total_tokens' => (int) $totalTokens,
                'total_cost' => ($totalTokens / 1000) * 0.002,
                'unique_users' => rand(50, (int) ($totalRequests * 0.7)),
                'avg_satisfaction_score' => rand(400, 500) / 100, // 4.0-5.0
                'escalation_count' => rand(0, (int) ($totalRequests * 0.05)),
                'peak_hour' => rand(9, 17),
            ]);
        }
    }
}
