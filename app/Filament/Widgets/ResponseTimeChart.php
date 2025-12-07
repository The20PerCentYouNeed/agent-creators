<?php

namespace App\Filament\Widgets;

use App\Models\AgentMetric;
use App\Services\DemoDateService;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class ResponseTimeChart extends ChartWidget
{
    protected ?string $heading = 'Response Time Trends (Last 30 Days)';

    protected ?string $description = 'Agent response times in milliseconds (Average, Median, 95th and 99th percentiles)';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $endDate = DemoDateService::today();
        $startDate = DemoDateService::daysAgo(29);

        $data = AgentMetric::query()
            ->selectRaw('DATE(date) as date, AVG(avg_response_time_ms) as avg_time, AVG(p50_response_time_ms) as p50, AVG(p95_response_time_ms) as p95, AVG(p99_response_time_ms) as p99')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Average',
                    'data' => $data->pluck('avg_time')->map(fn ($val) => round($val))->toArray(),
                    'borderColor' => 'rgb(59, 130, 246)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                ],
                [
                    'label' => 'p50 (Median)',
                    'data' => $data->pluck('p50')->map(fn ($val) => round($val))->toArray(),
                    'borderColor' => 'rgb(34, 197, 94)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                ],
                [
                    'label' => 'p95',
                    'data' => $data->pluck('p95')->map(fn ($val) => round($val))->toArray(),
                    'borderColor' => 'rgb(234, 179, 8)',
                    'backgroundColor' => 'rgba(234, 179, 8, 0.1)',
                ],
                [
                    'label' => 'p99',
                    'data' => $data->pluck('p99')->map(fn ($val) => round($val))->toArray(),
                    'borderColor' => 'rgb(239, 68, 68)',
                    'backgroundColor' => 'rgba(239, 68, 68, 0.1)',
                ],
            ],
            'labels' => $data->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('M j'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Response Time (ms)',
                    ],
                ],
            ],
        ];
    }
}
