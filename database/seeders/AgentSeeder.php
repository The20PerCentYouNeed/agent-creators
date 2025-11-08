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
        // Generate metrics with guaranteed upward trend for marketing purposes
        $baseRequests = 300; // Fixed base to ensure consistency

        for ($daysAgo = 29; $daysAgo >= 0; $daysAgo--) {
            $date = Carbon::now()->subDays($daysAgo)->format('Y-m-d');

            // Strong growth factor: increases linearly as we get closer to today
            // Day 29: 300 requests, Day 0 (today): 1200+ requests (4x growth!)
            $dayProgress = 29 - $daysAgo; // 0 at day 29, 29 at today
            $totalRequests = $baseRequests + ($dayProgress * 30) + rand(0, 50); // Guaranteed increase each day

            $failureRate = rand(2, 6); // 2-6% failure rate (94-98% success)
            $failedRequests = (int) ($totalRequests * ($failureRate / 100));
            $successfulRequests = $totalRequests - $failedRequests;

            // Response times improve over time (decrease = better)
            $avgResponseTime = 1800 - ($dayProgress * 20) + rand(-50, 50); // Gets faster over time
            $p50 = (int) ($avgResponseTime * 0.8);
            $p95 = (int) ($avgResponseTime * 1.5);
            $p99 = (int) ($avgResponseTime * 2);

            // Token usage grows with requests
            $totalTokensInput = $totalRequests * rand(100, 200);
            $totalTokensOutput = $totalRequests * rand(200, 400);
            $totalTokens = $totalTokensInput + $totalTokensOutput;

            AgentMetric::create([
                'agent_id' => $agent->id,
                'date' => $date,
                'total_requests' => $totalRequests,
                'successful_requests' => $successfulRequests,
                'failed_requests' => $failedRequests,
                'error_rate' => $failureRate,
                'avg_response_time_ms' => max(500, $avgResponseTime), // Never below 500ms
                'p50_response_time_ms' => $p50,
                'p95_response_time_ms' => $p95,
                'p99_response_time_ms' => $p99,
                'total_tokens_input' => (int) $totalTokensInput,
                'total_tokens_output' => (int) $totalTokensOutput,
                'total_tokens' => (int) $totalTokens,
                'total_cost' => ($totalTokens / 1000) * 0.002,
                'unique_users' => (int) ($totalRequests * 0.6) + rand(10, 50),
                'avg_satisfaction_score' => rand(420, 500) / 100, // 4.2-5.0
                'escalation_count' => rand(0, (int) ($totalRequests * 0.03)),
                'peak_hour' => rand(10, 16),
            ]);
        }
    }
}
