<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\AgentResource\Pages\ListAgents;
use App\Filament\Resources\AgentResource\Pages\CreateAgent;
use App\Filament\Resources\AgentResource\Pages\ViewAgent;
use App\Filament\Resources\AgentResource\Pages\EditAgent;
use App\Filament\Resources\AgentResource\Pages;
use App\Models\Agent;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class AgentResource extends Resource
{
    protected static ?string $model = Agent::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationLabel = 'Agents';

    protected static string | \UnitEnum | null $navigationGroup = 'Management';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Basic Information')
                    ->icon('heroicon-o-information-circle')
                    ->description('General agent details and categorization')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('name')
                            ->label('Agent Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., Customer Support Bot'),

                        Select::make('type')
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

                        Textarea::make('description')
                            ->label('Description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Describe what this agent does...'),

                        Select::make('status')
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

                Section::make('AI Configuration')
                    ->description('Configure the AI model and behavior')
                    ->icon('heroicon-o-cpu-chip')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('model')
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

                        TextInput::make('max_tokens')
                            ->label('Max Tokens')
                            ->numeric()
                            ->minValue(100)
                            ->maxValue(16000)
                            ->step(100)
                            ->default(2000)
                            ->helperText('Maximum length of agent responses'),

                        Slider::make('temperature')
                            ->label('Temperature')
                            ->range(minValue: 0, maxValue: 2)
                            ->step(0.1)
                            ->default(0.7)
                            ->tooltips()
                            ->helperText('0 = Focused & Deterministic | 2 = Creative & Random')
                            ->columnSpan(1),

                        Textarea::make('system_instructions')
                            ->label('System Instructions')
                            ->required()
                            ->rows(8)
                            ->columnSpanFull()
                            ->placeholder("You are a helpful assistant that...\n\nExample:\n- Be friendly and professional\n- Answer questions clearly\n- If you don't know, say so")
                            ->helperText('Define how the agent should behave and respond'),
                    ])->columns(2),

                Section::make('Knowledge Base')
                    ->description('Upload files to enhance agent knowledge')
                    ->icon('heroicon-o-document-text')
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('knowledge_base_files')
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

                Section::make('Advanced')
                    ->description('Technical configuration')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('platform')
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

                        TextInput::make('api_key')
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
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->url(fn ($record) => static::getUrl('edit', ['record' => $record])),

                TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('type')
                    ->searchable()
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'customer_support' => 'primary',
                        'sales' => 'success',
                        'research' => 'info',
                        'automation' => 'warning',
                        'data_analysis' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => str_replace('_', ' ', ucwords($state, '_'))),

                TextColumn::make('platform')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ? str_replace('_', ' ', ucwords($state, '_')) : 'N/A')
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn ($state) => match ($state) {
                        'active' => 'success',
                        'paused' => 'warning',
                        'archived' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('interactions_count')
                    ->counts('interactions')
                    ->label('Total Interactions')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'paused' => 'Paused',
                        'archived' => 'Archived',
                    ]),

                SelectFilter::make('type')
                    ->options([
                        'customer_support' => 'Customer Support',
                        'research' => 'Research',
                        'automation' => 'Automation',
                        'sales' => 'Sales',
                        'data_analysis' => 'Data Analysis',
                    ]),
            ])
            ->recordAction(null)
            ->recordUrl(fn ($record) => static::getUrl('edit', ['record' => $record]))
            ->toolbarActions([
                DeleteBulkAction::make(),
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
            'index' => ListAgents::route('/'),
            'create' => CreateAgent::route('/create'),
            'view' => ViewAgent::route('/{record}'),
            'edit' => EditAgent::route('/{record}/edit'),
        ];
    }
}
