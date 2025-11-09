<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use Filament\Widgets\ChartWidget;

class IntentDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Top Intents';

    protected static ?string $description = 'Number of interactions per intent category';

    protected static bool $isDiscovered = false;

    public ?string $filter = '30';

    protected function getData(): array
    {
        $days = (int) $this->filter;

        $intents = AgentInteraction::query()
            ->whereBetween('created_at', [now()->subDays($days), now()])
            ->whereNotNull('intent')
            ->selectRaw('intent, COUNT(*) as count')
            ->groupBy('intent')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        return [
            'datasets' => [
                [
                    'data' => $intents->pluck('count')->toArray(),
                    'backgroundColor' => [
                        'rgb(59, 130, 246)',
                        'rgb(34, 197, 94)',
                        'rgb(234, 179, 8)',
                        'rgb(239, 68, 68)',
                        'rgb(168, 85, 247)',
                        'rgb(236, 72, 153)',
                        'rgb(147, 51, 234)',
                        'rgb(20, 184, 166)',
                        'rgb(251, 146, 60)',
                        'rgb(244, 63, 94)',
                    ],
                ],
            ],
            'labels' => $intents->pluck('intent')
                ->map(fn ($i) => ucwords(str_replace('_', ' ', $i)))
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'display' => false,
                ],
                'y' => [
                    'display' => false,
                ],
            ],
        ];
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
