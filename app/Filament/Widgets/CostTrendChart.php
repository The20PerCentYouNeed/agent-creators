<?php

namespace App\Filament\Widgets;

use App\Models\AgentMetric;
use Filament\Widgets\ChartWidget;

class CostTrendChart extends ChartWidget
{
    protected static ?string $heading = 'Cost Over Time';

    protected static bool $isDiscovered = false;

    public ?string $filter = '30';

    protected function getData(): array
    {
        $days = (int) $this->filter;

        $data = AgentMetric::query()
            ->selectRaw('DATE(date) as date, SUM(total_cost) as cost')
            ->whereBetween('date', [now()->subDays($days - 1), now()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Daily Cost ($)',
                    'data' => $data->pluck('cost')->toArray(),
                    'borderColor' => 'rgb(234, 179, 8)',
                    'backgroundColor' => 'rgba(234, 179, 8, 0.1)',
                    'fill' => true,
                ],
            ],
            'labels' => $data->pluck('date')->map(fn ($date) => \Carbon\Carbon::parse($date)->format('M j'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        return [
            '7' => 'Last 7 days',
            '30' => 'Last 30 days',
            '90' => 'Last 90 days',
        ];
    }
}
