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
        for ($daysOffset = -7; $daysOffset <= 7; $daysOffset++) {
            $baseCount = 35;
            if ($daysOffset >= -1 && $daysOffset <= 1) {
                $baseCount = 50;
            }
            elseif ($daysOffset >= 0) {
                $baseCount = 45;
            }

            $dailyCount = $baseCount + rand(0, 10);

            for ($i = 0; $i < $dailyCount; $i++) {
                $createdAt = Carbon::now()
                    ->addDays($daysOffset)
                    ->setTime(rand(8, 20), rand(0, 59), rand(0, 59));

                AgentInteraction::factory()
                    ->for($agent)
                    ->successful()
                    ->create([
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt,
                    ]);
            }

            $failures = (int) ($dailyCount * 0.04);
            for ($i = 0; $i < $failures; $i++) {
                $createdAt = Carbon::now()
                    ->addDays($daysOffset)
                    ->setTime(rand(8, 20), rand(0, 59), rand(0, 59));

                AgentInteraction::factory()
                    ->for($agent)
                    ->failed()
                    ->create([
                        'created_at' => $createdAt,
                        'updated_at' => $createdAt,
                    ]);
            }
        }
    }

    private function createDailyMetrics(Agent $agent): void
    {
        for ($daysOffset = -30; $daysOffset <= 7; $daysOffset++) {
            $date = Carbon::now()->addDays($daysOffset)->toDateString();

            $dayProgress = $daysOffset + 30;

            $totalRequests = 400 + ($dayProgress * 30);

            if ($daysOffset >= -1 && $daysOffset <= 7) {
                $totalRequests += rand(20, 80);
            }

            $failureRate = rand(3, 5);
            $failedRequests = max(1, (int) ($totalRequests * ($failureRate / 100)));
            $successfulRequests = $totalRequests - $failedRequests;

            $avgResponseTime = (int) (1500 - ($dayProgress * 12));
            $avgResponseTime = max(600, min(1500, $avgResponseTime));
            $p50 = (int) ($avgResponseTime * 0.75);
            $p95 = (int) ($avgResponseTime * 1.6);
            $p99 = (int) ($avgResponseTime * 2.2);

            $totalTokensInput = $totalRequests * rand(150, 250);
            $totalTokensOutput = $totalRequests * rand(300, 500);
            $totalTokens = $totalTokensInput + $totalTokensOutput;

            $costPerMillionTokens = 2.50;
            $totalCost = ($totalTokens / 1000000) * $costPerMillionTokens;

            AgentMetric::create([
                'agent_id' => $agent->id,
                'date' => $date,
                'total_requests' => $totalRequests,
                'successful_requests' => $successfulRequests,
                'failed_requests' => $failedRequests,
                'error_rate' => round($failureRate, 2),
                'avg_response_time_ms' => $avgResponseTime,
                'p50_response_time_ms' => $p50,
                'p95_response_time_ms' => $p95,
                'p99_response_time_ms' => $p99,
                'total_tokens_input' => (int) $totalTokensInput,
                'total_tokens_output' => (int) $totalTokensOutput,
                'total_tokens' => (int) $totalTokens,
                'total_cost' => round($totalCost, 2),
                'unique_users' => (int) ($totalRequests * 0.65) + rand(5, 20),
                'avg_satisfaction_score' => rand(440, 495) / 100,
                'escalation_count' => (int) ($totalRequests * 0.02),
                'peak_hour' => rand(11, 15),
            ]);
        }
    }
}
