<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use Filament\Widgets\ChartWidget;

class PeakHoursChart extends ChartWidget
{
    protected static ?string $heading = 'Peak Usage Hours';

    protected static ?string $description = 'Number of requests per hour of day (24-hour format)';

    protected static bool $isDiscovered = false;

    public ?string $filter = '7';

    protected function getData(): array
    {
        $days = (int) $this->filter;

        $hourlyData = AgentInteraction::query()
            ->whereBetween('created_at', [now()->subDays($days), now()])
            ->selectRaw('HOUR(created_at) as hour, COUNT(*) as count')
            ->groupBy('hour')
            ->orderBy('hour')
            ->get()
            ->pluck('count', 'hour')
            ->toArray();

        $hours = range(0, 23);
        $counts = array_map(fn ($h) => $hourlyData[$h] ?? 0, $hours);

        return [
            'datasets' => [
                [
                    'label' => 'Requests',
                    'data' => $counts,
                    'backgroundColor' => 'rgb(59, 130, 246)',
                ],
            ],
            'labels' => array_map(fn ($h) => $h . ':00', $hours),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getFilters(): ?array
    {
        return [
            '7' => 'Last 7 days',
            '30' => 'Last 30 days',
        ];
    }
}
