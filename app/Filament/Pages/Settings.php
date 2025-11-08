<?php

namespace App\Filament\Pages;

use App\Models\DashboardSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $navigationLabel = 'Settings';

    protected static ?int $navigationSort = 5;

    protected static ?string $title = 'Dashboard Settings';

    protected static ?string $description = 'Configure your dashboard preferences';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            // Alert Thresholds.
            'alert_error_rate' => DashboardSetting::get('alert_error_rate', 5),
            'alert_response_time' => DashboardSetting::get('alert_response_time', 3000),
            'alert_daily_cost' => DashboardSetting::get('alert_daily_cost', 100),
            'alert_success_rate' => DashboardSetting::get('alert_success_rate', 90),

            // Notification Settings.
            'notification_email' => DashboardSetting::get('notification_email', auth()->user()->email),
            'notification_frequency' => DashboardSetting::get('notification_frequency', 'instant'),
            'notify_critical_errors' => DashboardSetting::get('notify_critical_errors', true),
            'notify_performance_issues' => DashboardSetting::get('notify_performance_issues', true),
            'notify_budget_exceeded' => DashboardSetting::get('notify_budget_exceeded', true),
            'notify_agent_offline' => DashboardSetting::get('notify_agent_offline', false),

            // Cost Management.
            'monthly_budget' => DashboardSetting::get('monthly_budget', 500),
            'budget_warning_threshold' => DashboardSetting::get('budget_warning_threshold', 80),
            'enable_budget_alerts' => DashboardSetting::get('enable_budget_alerts', true),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Alert Thresholds')
                    ->description('Configure when to receive performance alerts')
                    ->icon('heroicon-o-bell-alert')
                    ->schema([
                        TextInput::make('alert_error_rate')
                            ->label('Error Rate Alert (%)')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(20)
                            ->step(1)
                            ->suffix('%')
                            ->helperText('Receive alert when error rate exceeds this percentage'),

                        TextInput::make('alert_response_time')
                            ->label('Response Time Alert (ms)')
                            ->numeric()
                            ->minValue(500)
                            ->maxValue(10000)
                            ->step(100)
                            ->suffix('ms')
                            ->helperText('Alert when average response time exceeds this value'),

                        TextInput::make('alert_daily_cost')
                            ->label('Daily Cost Alert')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(1000)
                            ->prefix('$')
                            ->helperText('Alert when daily cost exceeds this amount'),

                        TextInput::make('alert_success_rate')
                            ->label('Minimum Success Rate (%)')
                            ->numeric()
                            ->minValue(80)
                            ->maxValue(99)
                            ->step(1)
                            ->suffix('%')
                            ->helperText('Alert when success rate drops below this percentage'),
                    ])->columns(2),

                Section::make('Notification Settings')
                    ->description('Configure how and when you receive alerts')
                    ->icon('heroicon-o-envelope')
                    ->schema([
                        TextInput::make('notification_email')
                            ->label('Alert Email Address')
                            ->email()
                            ->required()
                            ->helperText('Email address to receive notifications'),

                        Select::make('notification_frequency')
                            ->label('Notification Frequency')
                            ->required()
                            ->options([
                                'instant' => 'Instant (Real-time)',
                                'hourly' => 'Hourly Digest',
                                'daily' => 'Daily Summary',
                            ])
                            ->helperText('How often to send alert notifications'),

                        Toggle::make('notify_critical_errors')
                            ->label('Critical Errors')
                            ->helperText('Agent failures and timeouts')
                            ->inline(false),

                        Toggle::make('notify_performance_issues')
                            ->label('Performance Issues')
                            ->helperText('Slow response times and degradation')
                            ->inline(false),

                        Toggle::make('notify_budget_exceeded')
                            ->label('Budget Exceeded')
                            ->helperText('Cost threshold breached')
                            ->inline(false),

                        Toggle::make('notify_agent_offline')
                            ->label('Agent Offline')
                            ->helperText('Agent stopped responding')
                            ->inline(false),
                    ])->columns(2),

                Section::make('Cost Management')
                    ->description('Set budget limits and cost controls')
                    ->icon('heroicon-o-currency-dollar')
                    ->schema([
                        TextInput::make('monthly_budget')
                            ->label('Monthly Budget')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(10000)
                            ->prefix('$')
                            ->required()
                            ->helperText('Maximum spending limit per month'),

                        TextInput::make('budget_warning_threshold')
                            ->label('Budget Warning Threshold (%)')
                            ->numeric()
                            ->minValue(50)
                            ->maxValue(100)
                            ->step(5)
                            ->suffix('%')
                            ->helperText('Warn when you reach this percentage of budget'),

                        Toggle::make('enable_budget_alerts')
                            ->label('Enable Budget Alerts')
                            ->helperText('Receive notifications about budget usage')
                            ->inline(false),
                    ])->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            DashboardSetting::set($key, $value);
        }

        Notification::make()
            ->title('Settings saved successfully')
            ->success()
            ->send();
    }
}
