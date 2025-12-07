<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use App\Services\DemoDateService;
use Filament\Widgets\ChartWidget;

class SentimentDistributionChart extends ChartWidget
{
    protected ?string $heading = 'Sentiment Analysis';

    protected ?string $description = 'User satisfaction breakdown (Positive, Neutral, Negative)';

    protected static bool $isDiscovered = false;

    protected int|string|array $columnSpan = 1;

    public ?string $filter = '30';

    protected function getData(): array
    {
        $days = (int) $this->filter;
        $endDate = DemoDateService::now();
        $startDate = DemoDateService::daysAgo($days);

        $sentiments = AgentInteraction::query()
            ->whereBetween('created_at', [$startDate, $endDate])
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
                        'rgb(34, 197, 94)',
                        'rgb(156, 163, 175)',
                        'rgb(239, 68, 68)',
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
