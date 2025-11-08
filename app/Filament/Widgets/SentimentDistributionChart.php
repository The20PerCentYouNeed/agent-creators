<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use Filament\Widgets\ChartWidget;

class SentimentDistributionChart extends ChartWidget
{
    protected static ?string $heading = 'Sentiment Analysis';

    protected static bool $isDiscovered = false;

    public ?string $filter = '30';

    protected function getData(): array
    {
        $days = (int) $this->filter;

        $sentiments = AgentInteraction::query()
            ->whereBetween('created_at', [now()->subDays($days), now()])
            ->whereNotNull('sentiment')
            ->selectRaw('sentiment, COUNT(*) as count')
            ->groupBy('sentiment')
            ->orderByRaw("FIELD(sentiment, 'positive', 'neutral', 'negative')")
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Interactions',
                    'data' => $sentiments->pluck('count')->toArray(),
                    'backgroundColor' => [
                        'rgb(34, 197, 94)', // positive
                        'rgb(156, 163, 175)', // neutral
                        'rgb(239, 68, 68)', // negative
                    ],
                ],
            ],
            'labels' => $sentiments->pluck('sentiment')->map(fn ($s) => ucfirst($s))->toArray(),
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
            '90' => 'Last 90 days',
        ];
    }
}
