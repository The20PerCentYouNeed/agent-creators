<?php

namespace App\Filament\Widgets;

use App\Models\AgentMetric;
use App\Services\DemoDateService;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CostAnalysisStats extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected static bool $isDiscovered = false;

    protected function getStats(): array
    {
        $defaultStart = DemoDateService::daysAgo(30)->format('Y-m-d');
        $defaultEnd = DemoDateService::today()->format('Y-m-d');

        $startDate = $this->pageFilters['startDate'] ?? $defaultStart;
        $endDate = $this->pageFilters['endDate'] ?? $defaultEnd;
        $agentId = $this->pageFilters['agentId'] ?? null;

        $query = AgentMetric::query()
            ->whereBetween('date', [$startDate, $endDate]);

        if ($agentId) {
            $query->where('agent_id', $agentId);
        }

        $totalCost = $query->sum('total_cost');
        $totalRequests = $query->sum('total_requests');
        $costPerRequest = $totalRequests > 0 ? $totalCost / $totalRequests : 0;
        $dailyCosts = $query->selectRaw('DATE(date) as date')->groupBy('date')->count();
        $dailyAverage = $dailyCosts > 0 ? $totalCost / $dailyCosts : 0;

        return [
            Stat::make('Total Cost', '$' . number_format($totalCost, 2))
                ->description(number_format($totalRequests) . ' requests')
                ->icon('heroicon-o-currency-dollar')
                ->color('primary'),

            Stat::make('Cost per Request', '$' . number_format($costPerRequest, 4))
                ->description('Average across all agents')
                ->icon('heroicon-o-calculator')
                ->color('success'),

            Stat::make('Daily Average', '$' . number_format($dailyAverage, 2))
                ->description('Per day average cost')
                ->icon('heroicon-o-chart-bar')
                ->color('warning'),
        ];
    }
}
