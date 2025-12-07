<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Models\AgentMetric;
use App\Services\DemoDateService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AgentStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $referenceDate = DemoDateService::today();
        $yesterdayDate = DemoDateService::yesterday();

        $today = AgentMetric::whereDate('date', $referenceDate)->get();
        $yesterday = AgentMetric::whereDate('date', $yesterdayDate)->get();

        $todayRequests = $today->sum('total_requests');
        $yesterdayRequests = $yesterday->sum('total_requests');
        $requestsChange = $yesterdayRequests > 0 ? round((($todayRequests - $yesterdayRequests) / $yesterdayRequests) * 100, 1) : 0;

        $totalRequests = $today->sum('total_requests');
        $successfulRequests = $today->sum('successful_requests');
        $successRate = $totalRequests > 0 ? round(($successfulRequests / $totalRequests) * 100, 1) : 0;

        $avgResponseTime = $today->avg('avg_response_time_ms');
        $avgResponseTime = $avgResponseTime ? round($avgResponseTime) : 0;

        $todayCost = $today->sum('total_cost');

        $activeAgents = Agent::active()->count();

        return [
            Stat::make('Total Requests (Today)', number_format($todayRequests))
                ->description($requestsChange >= 0 ? "+{$requestsChange}% from yesterday" : "{$requestsChange}% from yesterday")
                ->descriptionIcon($requestsChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($requestsChange >= 0 ? 'success' : 'danger')
                ->chart($this->getWeeklyRequestsChart()),

            Stat::make('Success Rate', "{$successRate}%")
                ->description('Today\'s performance')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color($successRate >= 95 ? 'success' : ($successRate >= 85 ? 'warning' : 'danger')),

            Stat::make('Avg Response Time', "{$avgResponseTime}ms")
                ->description('Today\'s average')
                ->descriptionIcon('heroicon-m-clock')
                ->color($avgResponseTime < 1000 ? 'success' : ($avgResponseTime < 2000 ? 'warning' : 'danger')),

            Stat::make('Total Cost (Today)', '$' . number_format($todayCost, 2))
                ->description("{$activeAgents} active agents")
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('info'),
        ];
    }

    private function getWeeklyRequestsChart(): array
    {
        $endDate = DemoDateService::today();
        $startDate = DemoDateService::daysAgo(6);

        $data = AgentMetric::query()
            ->selectRaw('DATE(date) as date, SUM(total_requests) as total')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total')
            ->toArray();

        return array_pad($data, 7, 0);
    }
}
