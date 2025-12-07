<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use App\Services\DemoDateService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AlertsStatsWidget extends StatsOverviewWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static bool $isDiscovered = false;

    protected function getStats(): array
    {
        $today = DemoDateService::today();
        $yesterday = DemoDateService::yesterday();

        $todayErrors = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->whereDate('created_at', $today)
            ->count();

        $yesterdayErrors = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->whereDate('created_at', $yesterday)
            ->count();

        $trend = $yesterdayErrors > 0 ? (($todayErrors - $yesterdayErrors) / $yesterdayErrors) * 100 : 0;

        $last24HoursStart = DemoDateService::today()->subDay();
        $last24Hours = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->where('created_at', '>=', $last24HoursStart)
            ->count();

        $last7DaysStart = DemoDateService::daysAgo(7);
        $last7Days = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->where('created_at', '>=', $last7DaysStart)
            ->count();

        $totalToday = AgentInteraction::whereDate('created_at', $today)->count();
        $errorRate = $totalToday > 0 ? round(($todayErrors / $totalToday) * 100, 2) : 0;

        return [
            Stat::make('Errors Today', $todayErrors)
                ->description(
                    $trend >= 0 ? "{$trend}% increase" : "{$trend}% decrease"
                )
                ->descriptionIcon($trend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($todayErrors > 0 ? 'danger' : 'success')
                ->chart(array_fill(0, 7, rand($todayErrors - 5, $todayErrors + 5))),

            Stat::make('Last 24 Hours', $last24Hours)
                ->description('Rolling 24-hour window')
                ->descriptionIcon('heroicon-m-clock')
                ->color($last24Hours > 10 ? 'warning' : 'success'),

            Stat::make('Last 7 Days', $last7Days)
                ->description('Total errors this week')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color(
                    $last7Days > 50 ? 'danger' : (
                        $last7Days > 20 ? 'warning' : 'success'
                    )
                ),

            Stat::make('Error Rate', $errorRate . '%')
                ->description('Today\'s error percentage')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color(
                    $errorRate > 5 ? 'danger' : (
                        $errorRate > 2 ? 'warning' : 'success'
                    )
                ),
        ];
    }
}
