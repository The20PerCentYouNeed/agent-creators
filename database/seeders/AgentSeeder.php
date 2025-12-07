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

            $this->createDailyMetricsAndInteractions($agent);
        }

        $this->command->info('✅ Agent seeding completed!');
        $this->command->newLine();
        $this->command->info('Summary:');
        $this->command->info('  Agents: ' . Agent::count());
        $this->command->info('  Interactions: ' . AgentInteraction::count());
        $this->command->info('  Daily Metrics: ' . AgentMetric::count());
    }

    private function createDailyMetricsAndInteractions(Agent $agent): void
    {
        // Create 38 days of data: 30 days back + today + 7 days forward
        for ($daysOffset = -30; $daysOffset <= 7; $daysOffset++) {
            $date = Carbon::now()->addDays($daysOffset);
            $dayOfWeek = $date->dayOfWeek; // 0 = Sunday, 6 = Saturday
            $isWeekend = in_array($dayOfWeek, [0, 6]);

            // Calculate day progress for trending metrics (0 to 37)
            $dayProgress = $daysOffset + 30;
            $progressFactor = $dayProgress / 37; // 0 to 1

            // Base requests with weekend drop and growth trend
            $baseRequests = 150 + (int) ($progressFactor * 100); // 150 → 250 over time
            if ($isWeekend) {
                $baseRequests = (int) ($baseRequests * 0.4); // 60% drop on weekends
            }

            // Add daily variance (±15%)
            $variance = rand(-15, 15) / 100;
            $totalRequests = (int) ($baseRequests * (1 + $variance));
            $totalRequests = max(20, $totalRequests);

            // Failure rate: starts at 5%, improves to 2.5% over time (AI getting better)
            $failureRate = 5 - ($progressFactor * 2.5);
            $failureRate = max(2, min(6, $failureRate + (rand(-10, 10) / 10)));
            $failedRequests = max(0, (int) ($totalRequests * ($failureRate / 100)));
            $successfulRequests = $totalRequests - $failedRequests;

            // Response time: starts at 1800ms, improves to 800ms over time
            $avgResponseTime = (int) (1800 - ($progressFactor * 1000));
            $avgResponseTime = max(600, min(2000, $avgResponseTime + rand(-100, 100)));
            $p50 = (int) ($avgResponseTime * 0.7);  // Median is faster
            $p95 = (int) ($avgResponseTime * 1.8);  // 95th percentile
            $p99 = (int) ($avgResponseTime * 2.5);  // 99th percentile (slowest)

            // Token calculation (realistic for conversational AI)
            $avgTokensPerRequest = rand(400, 600); // Input + output per request
            $inputRatio = 0.35; // 35% input, 65% output (typical for Q&A)
            $totalTokens = $totalRequests * $avgTokensPerRequest;
            $totalTokensInput = (int) ($totalTokens * $inputRatio);
            $totalTokensOutput = $totalTokens - $totalTokensInput;

            // Realistic pricing (GPT-4o: $2.50/M input, $10/M output)
            $costInput = ($totalTokensInput / 1_000_000) * 2.50;
            $costOutput = ($totalTokensOutput / 1_000_000) * 10.00;
            $totalCost = $costInput + $costOutput;

            // Unique users (typically 60-80% of requests are unique in a day)
            $uniqueUserRatio = rand(60, 80) / 100;
            $uniqueUsers = (int) ($totalRequests * $uniqueUserRatio);

            // Satisfaction improves over time: 4.1 → 4.7
            $baseSatisfaction = 4.1 + ($progressFactor * 0.6);
            $avgSatisfactionScore = min(5.0, max(3.5, $baseSatisfaction + (rand(-20, 20) / 100)));

            // Escalation rate decreases over time: 5% → 2%
            $escalationRate = 5 - ($progressFactor * 3);
            $escalationCount = (int) ($totalRequests * ($escalationRate / 100));

            // Peak hour (business hours, slight preference for mid-morning)
            $peakHour = fake()->randomElement([9, 10, 10, 11, 11, 11, 14, 14, 15, 16]);

            // Create the daily metric
            AgentMetric::create([
                'agent_id' => $agent->id,
                'date' => $date->toDateString(),
                'total_requests' => $totalRequests,
                'successful_requests' => $successfulRequests,
                'failed_requests' => $failedRequests,
                'error_rate' => round($failureRate, 2),
                'avg_response_time_ms' => $avgResponseTime,
                'p50_response_time_ms' => $p50,
                'p95_response_time_ms' => $p95,
                'p99_response_time_ms' => $p99,
                'total_tokens_input' => $totalTokensInput,
                'total_tokens_output' => $totalTokensOutput,
                'total_tokens' => $totalTokens,
                'total_cost' => round($totalCost, 2),
                'unique_users' => $uniqueUsers,
                'avg_satisfaction_score' => round($avgSatisfactionScore, 2),
                'escalation_count' => $escalationCount,
                'peak_hour' => $peakHour,
            ]);

            // Only create detailed interactions for the last 14 days (for performance)
            if ($daysOffset >= -7 && $daysOffset <= 7) {
                $this->createInteractionsForDay($agent, $date, $successfulRequests, $failedRequests, $avgResponseTime);
            }
        }
    }

    private function createInteractionsForDay(
        Agent $agent,
        Carbon $date,
        int $successfulRequests,
        int $failedRequests,
        int $avgResponseTime
    ): void {
        // Sample interactions (not all - that would be too many)
        // Create ~50 samples per day for the interactions table
        $sampleSize = min(50, $successfulRequests);
        $failureSampleSize = min(5, $failedRequests);

        // Business hours distribution (weighted towards 9-11am and 2-4pm)
        $businessHours = [
            8 => 5, 9 => 15, 10 => 20, 11 => 15,
            12 => 8, 13 => 8, 14 => 12, 15 => 10,
            16 => 5, 17 => 2,
        ];

        // Create successful interactions
        for ($i = 0; $i < $sampleSize; $i++) {
            $hour = $this->weightedRandomHour($businessHours);
            $createdAt = $date->copy()->setTime($hour, rand(0, 59), rand(0, 59));

            // Response time variance around the average
            $responseTime = (int) ($avgResponseTime * (rand(50, 150) / 100));
            $responseTime = max(200, min(5000, $responseTime));

            AgentInteraction::factory()
                ->for($agent)
                ->successful()
                ->create([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                    'response_time_ms' => $responseTime,
                ]);
        }

        // Create failed interactions
        for ($i = 0; $i < $failureSampleSize; $i++) {
            $hour = $this->weightedRandomHour($businessHours);
            $createdAt = $date->copy()->setTime($hour, rand(0, 59), rand(0, 59));

            $isTimeout = rand(1, 100) <= 25; // 25% are timeouts

            AgentInteraction::factory()
                ->for($agent)
                ->failed()
                ->create([
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                    'status' => $isTimeout ? 'timeout' : 'error',
                    'response_time_ms' => $isTimeout ? rand(10000, 15000) : rand(500, 3000),
                ]);
        }
    }

    private function weightedRandomHour(array $hourWeights): int
    {
        $totalWeight = array_sum($hourWeights);
        $random = rand(1, $totalWeight);

        $currentWeight = 0;
        foreach ($hourWeights as $hour => $weight) {
            $currentWeight += $weight;
            if ($random <= $currentWeight) {
                return $hour;
            }
        }

        return 10; // Default to 10am
    }
}
