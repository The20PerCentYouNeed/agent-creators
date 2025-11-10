<?php

namespace App\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use App\Models\AgentInteraction;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInteractions extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                AgentInteraction::query()
                    ->with('agent')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('agent.name')
                    ->label('Agent')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user_input')
                    ->label('User Input')
                    ->limit(50)
                    ->searchable()
                    ->wrap(),

                TextColumn::make('agent_response')
                    ->label('Response')
                    ->limit(50)
                    ->wrap()
                    ->toggleable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'success',
                        'danger' => fn ($state) => in_array($state, ['error', 'timeout']),
                        'warning' => 'partial',
                    ])
                    ->sortable(),

                TextColumn::make('response_time_ms')
                    ->label('Response Time')
                    ->formatStateUsing(fn ($state) => $state.'ms')
                    ->sortable(),

                TextColumn::make('tokens_total')
                    ->label('Tokens')
                    ->formatStateUsing(fn ($state) => number_format($state))
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('cost')
                    ->label('Cost')
                    ->money('usd')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
