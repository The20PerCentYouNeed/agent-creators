<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgentResource\Pages;
use App\Models\Agent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationLabel = 'Agents';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->description('General agent details and categorization')
                    ->icon('heroicon-o-information-circle')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Agent Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Customer Support Bot'),

                        Forms\Components\Select::make('type')
                            ->label('Agent Type')
                            ->required()
                            ->options([
                                'customer_support' => 'Customer Support',
                                'research' => 'Research',
                                'automation' => 'Automation',
                                'sales' => 'Sales',
                                'data_analysis' => 'Data Analysis',
                            ])
                            ->native(false),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Describe what this agent does...'),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->options([
                                'active' => 'Active',
                                'paused' => 'Paused',
                                'archived' => 'Archived',
                            ])
                            ->default('active')
                            ->native(false),
                    ])->columns(2),

                Forms\Components\Section::make('AI Configuration')
                    ->description('Configure the AI model and behavior')
                    ->icon('heroicon-o-cpu-chip')
                    ->schema([
                        Forms\Components\Select::make('model')
                            ->label('AI Model')
                            ->required()
                            ->options([
                                'gpt-4o' => 'GPT-4o (Latest, Most Capable)',
                                'gpt-4o-mini' => 'GPT-4o Mini (Fast & Economical)',
                                'gpt-4-turbo' => 'GPT-4 Turbo (Previous Generation)',
                                'gpt-4' => 'GPT-4 (Stable)',
                                'gpt-3.5-turbo' => 'GPT-3.5 Turbo (Fastest)',
                                'claude-3-opus' => 'Claude 3 Opus',
                                'claude-3-sonnet' => 'Claude 3 Sonnet',
                                'claude-3-haiku' => 'Claude 3 Haiku',
                            ])
                            ->default('gpt-4o-mini')
                            ->native(false)
                            ->helperText('Select which AI model powers this agent'),

                        Forms\Components\TextInput::make('temperature')
                            ->label('Temperature')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(2)
                            ->step(0.1)
                            ->default(0.7)
                            ->suffix('°')
                            ->helperText('0 = Focused & Deterministic | 2 = Creative & Random'),

                        Forms\Components\TextInput::make('max_tokens')
                            ->label('Max Tokens')
                            ->numeric()
                            ->minValue(100)
                            ->maxValue(16000)
                            ->step(100)
                            ->default(2000)
                            ->helperText('Maximum length of agent responses'),

                        Forms\Components\Textarea::make('system_instructions')
                            ->label('System Instructions')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull()
                            ->placeholder("You are a helpful assistant that...\n\nExample:\n- Be friendly and professional\n- Answer questions clearly\n- If you don't know, say so")
                            ->helperText('Define how the agent should behave and respond'),
                    ])->columns(2),

                Forms\Components\Section::make('Knowledge Base')
                    ->description('Upload files to enhance agent knowledge')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\FileUpload::make('knowledge_base_files')
                            ->label('Knowledge Base Files')
                            ->disk('knowledge-base')
                            ->multiple()
                            ->acceptedFileTypes(['application/pdf', 'text/plain', 'text/csv', 'application/json', 'text/markdown'])
                            ->maxSize(10240)
                            ->preserveFilenames()
                            ->downloadable()
                            ->reorderable()
                            ->helperText('Upload PDFs, TXT, CSV, JSON, or Markdown files (Max 10MB per file). Files are stored securely and not publicly accessible.'),
                    ]),

                Forms\Components\Section::make('Advanced')
                    ->description('Technical configuration')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->schema([
                        Forms\Components\Select::make('platform')
                            ->label('Platform/Framework')
                            ->options([
                                'openai_api' => 'OpenAI API',
                                'anthropic_api' => 'Anthropic API',
                                'custom_code' => 'Custom Code',
                                'flowise' => 'Flowise',
                                'langchain' => 'LangChain',
                                'llamaindex' => 'LlamaIndex',
                            ])
                            ->native(false),

                        Forms\Components\TextInput::make('api_key')
                            ->label('API Key')
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->placeholder('Leave empty to auto-generate'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-o-cpu-chip'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('type')
                    ->searchable()
                    ->colors([
                        'primary' => 'customer_support',
                        'success' => 'sales',
                        'info' => 'research',
                        'warning' => 'automation',
                        'danger' => 'data_analysis',
                    ])
                    ->formatStateUsing(fn ($state) => str_replace('_', ' ', ucwords($state, '_'))),

                Tables\Columns\TextColumn::make('platform')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ? str_replace('_', ' ', ucwords($state, '_')) : 'N/A')
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'active',
                        'warning' => 'paused',
                        'danger' => 'archived',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('interactions_count')
                    ->counts('interactions')
                    ->label('Total Interactions')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'paused' => 'Paused',
                        'archived' => 'Archived',
                    ]),

                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'customer_support' => 'Customer Support',
                        'research' => 'Research',
                        'automation' => 'Automation',
                        'sales' => 'Sales',
                        'data_analysis' => 'Data Analysis',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgents::route('/'),
            'create' => Pages\CreateAgent::route('/create'),
            'view' => Pages\ViewAgent::route('/{record}'),
            'edit' => Pages\EditAgent::route('/{record}/edit'),
        ];
    }
}
