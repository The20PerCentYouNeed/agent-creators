<?php

namespace App\Filament\Pages;

use App\Models\AgentInteraction;
use Filament\Pages\Page;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class Interactions extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string $view = 'filament.pages.interactions';

    protected static ?string $navigationLabel = 'Interactions';

    protected static ?int $navigationSort = 3;

    protected static ?string $title = 'All Interactions';

    public function table(Table $table): Table
    {
        return $table
            ->query(AgentInteraction::query()->with('agent')->latest())
            ->columns([
                TextColumn::make('agent.name')
                    ->label('Agent')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user_input')
                    ->label('User Input')
                    ->limit(60)
                    ->searchable()
                    ->wrap(),

                TextColumn::make('agent_response')
                    ->label('Response')
                    ->limit(60)
                    ->wrap()
                    ->toggleable(),

                BadgeColumn::make('status')
                    ->colors([
                        'success' => 'success',
                        'danger' => fn ($state) => in_array($state, ['error', 'timeout']),
                        'warning' => 'partial',
                    ]),

                TextColumn::make('intent')
                    ->badge()
                    ->toggleable(),

                BadgeColumn::make('sentiment')
                    ->colors([
                        'success' => 'positive',
                        'gray' => 'neutral',
                        'danger' => 'negative',
                    ])
                    ->toggleable(),

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
                    ->money('usd')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Time')
                    ->dateTime()
                    ->sortable()
                    ->since(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('agent_id')
                    ->relationship('agent', 'name')
                    ->label('Agent'),

                \Filament\Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'success' => 'Success',
                        'error' => 'Error',
                        'timeout' => 'Timeout',
                        'partial' => 'Partial',
                    ]),

                \Filament\Tables\Filters\SelectFilter::make('sentiment')
                    ->options([
                        'positive' => 'Positive',
                        'neutral' => 'Neutral',
                        'negative' => 'Negative',
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
