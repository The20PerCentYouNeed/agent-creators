<?php

namespace App\Filament\Widgets;

use App\Models\AgentInteraction;
use Filament\Tables\Columns\TextColumn;
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
                    ->whereIn('status', ['error', 'timeout'])
                    ->with('agent')
                    ->latest()
                    ->limit(20)
            )
            ->columns([
                TextColumn::make('agent.name')
                    ->label('Agent')
                    ->searchable()
                    ->sortable(),

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
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('No errors or alerts 🎉')
            ->emptyStateDescription('Everything is running smoothly! No errors have been detected.')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
