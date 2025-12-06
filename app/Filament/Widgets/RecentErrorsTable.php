<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Models\AgentInteraction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentErrorsTable extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static bool $isDiscovered = false;

    protected static ?string $heading = 'Recent Errors & Alerts';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AgentInteraction::query()
                    ->whereIn('agent_interactions.status', ['error', 'timeout'])
                    ->with('agent')
            )
            ->paginated([10, 20, 50])
            ->defaultPaginationPageOption(20)
            ->columns([
                TextColumn::make('agent.name')
                    ->label('Agent')
                    ->searchable()
                    ->sortable(query: function ($query, string $direction): void {
                        $query->leftJoin('agents', 'agent_interactions.agent_id', '=', 'agents.id')
                            ->orderBy('agents.name', $direction)
                            ->select('agent_interactions.*');
                    }),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'error' => 'danger',
                        'timeout' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('error_message')
                    ->label('Error Details')
                    ->limit(60)
                    ->tooltip(fn (AgentInteraction $record): ?string => $record->error_message)
                    ->searchable()
                    ->wrap(),

                TextColumn::make('user_input')
                    ->label('User Query')
                    ->limit(40)
                    ->tooltip(fn (AgentInteraction $record): ?string => $record->user_input)
                    ->toggleable()
                    ->searchable(),

                TextColumn::make('response_time_ms')
                    ->label('Response Time')
                    ->suffix(' ms')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Occurred At')
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('agent_id')
                    ->label('Agent')
                    ->options(fn (): array => Agent::query()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload(),

                SelectFilter::make('status')
                    ->label('Error Type')
                    ->options([
                        'error' => 'Error',
                        'timeout' => 'Timeout',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('No errors or alerts 🎉')
            ->emptyStateDescription('Everything is running smoothly! No errors have been detected.')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
