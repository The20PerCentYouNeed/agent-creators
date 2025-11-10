<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\AgentMetric;
use Filament\Widgets\ChartWidget;

class RequestsChart extends ChartWidget
{
    protected ?string $heading = 'Requests Over Time (Last 30 Days)';

    protected ?string $description = 'Total, successful, and failed request counts by day';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = AgentMetric::query()
            ->selectRaw('DATE(date) as date, SUM(total_requests) as total_requests, SUM(successful_requests) as successful, SUM(failed_requests) as failed')
            ->whereBetween('date', [now()->subDays(29), now()])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Requests',
                    'data' => $data->pluck('total_requests')->toArray(),
                    'borderColor' => 'rgb(59, 130, 246)',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                    'fill' => true,
                ],
                [
                    'label' => 'Successful',
                    'data' => $data->pluck('successful')->toArray(),
                    'borderColor' => 'rgb(34, 197, 94)',
                    'backgroundColor' => 'rgba(34, 197, 94, 0.1)',
                ],
                [
                    'label' => 'Failed',
                    'data' => $data->pluck('failed')->toArray(),
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
                ],
            ],
        ];
    }
}
