<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Services\DemoDateService;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class AgentPerformanceOverview extends BaseWidget
{
    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $startDate = DemoDateService::daysAgo(7);
        $endDate = DemoDateService::now();

        return $table
            ->query(
                Agent::query()
                    ->withCount(['interactions as total_interactions' => function (Builder $query) use ($startDate, $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    },
                    ])
                    ->withCount(['interactions as successful_interactions' => function (Builder $query) use ($startDate, $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate])
                            ->where('status', 'success');
                    },
                    ])
                    ->withAvg(['interactions as avg_response_time' => function (Builder $query) use ($startDate, $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate])
                            ->where('status', 'success');
                    },
                    ], 'response_time_ms')
                    ->withSum(['interactions as total_cost' => function (Builder $query) use ($startDate, $endDate) {
                        $query->whereBetween('created_at', [$startDate, $endDate]);
                    },
                    ], 'cost')
                    ->active()
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Agent Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->colors([
                        'primary' => 'customer_support',
                        'success' => 'sales',
                        'info' => 'research',
                        'warning' => 'automation',
                        'danger' => 'data_analysis',
                    ])
                    ->formatStateUsing(fn ($state) => str_replace('_', ' ', ucwords($state, '_')))
                    ->sortable(),

                TextColumn::make('platform')
                    ->label('Platform')
                    ->formatStateUsing(fn ($state) => str_replace('_', ' ', ucwords($state, '_')))
                    ->toggleable(),

                TextColumn::make('total_interactions')
                    ->label('Requests (7d)')
                    ->formatStateUsing(fn ($state) => number_format($state ?? 0))
                    ->sortable(),

                TextColumn::make('success_rate')
                    ->label('Success Rate')
                    ->getStateUsing(function ($record) {
                        $total = $record->total_interactions ?? 0;
                        $successful = $record->successful_interactions ?? 0;

                        return $total > 0 ? round(($successful / $total) * 100, 1) . '%' : 'N/A';
                    })
                    ->sortable(query: function (Builder $query, string $direction): Builder {
                        return $query->orderByRaw('
                            CASE
                                WHEN total_interactions > 0
                                THEN (successful_interactions / total_interactions)
                                ELSE 0
                            END ' . $direction);
                    }),

                TextColumn::make('avg_response_time')
                    ->label('Avg Response')
                    ->formatStateUsing(fn ($state) => $state ? round($state) . 'ms' : 'N/A')
                    ->sortable(),

                TextColumn::make('total_cost')
                    ->label('Cost (7d)')
                    ->money('usd')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'warning' => 'paused',
                        'danger' => 'archived',
                    ])
                    ->sortable(),
            ])
            ->defaultSort('total_interactions', 'desc')
            ->striped(false)
            ->paginated(false);
    }
}
