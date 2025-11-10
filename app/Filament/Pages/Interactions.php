<?php

namespace App\Filament\Pages;

use Filament\Tables\Filters\SelectFilter;
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

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected string $view = 'filament.pages.interactions';

    protected static ?string $navigationLabel = 'Interactions';

    protected static string | \UnitEnum | null $navigationGroup = 'Management';

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
                    ->formatStateUsing(fn ($state) => $state . 'ms')
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
                    ->dateTime('M d, Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('agent_id')
                    ->relationship('agent', 'name')
                    ->label('Agent'),

                SelectFilter::make('status')
                    ->options([
                        'success' => 'Success',
                        'error' => 'Error',
                        'timeout' => 'Timeout',
                        'partial' => 'Partial',
                    ]),

                SelectFilter::make('sentiment')
                    ->options([
                        'positive' => 'Positive',
                        'neutral' => 'Neutral',
                        'negative' => 'Negative',
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
