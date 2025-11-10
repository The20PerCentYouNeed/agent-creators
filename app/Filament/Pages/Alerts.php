<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\AlertsStatsWidget;
use App\Filament\Widgets\RecentErrorsTable;
use App\Models\AgentInteraction;
use Filament\Pages\Page;

class Alerts extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-bell-alert';

    protected string $view = 'filament.pages.alerts';

    protected static ?string $navigationLabel = 'Alerts';

    protected static \UnitEnum|string|null $navigationGroup = 'Monitoring';

    protected static ?int $navigationSort = 5;

    protected static ?string $title = 'Performance Alerts';

    protected static ?string $description = 'Monitor errors and performance issues';

    public static function getNavigationBadge(): ?string
    {
        $errorCount = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->whereDate('created_at', today())
            ->count();

        return $errorCount > 0 ? (string) $errorCount : null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        $errorCount = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->whereDate('created_at', today())
            ->count();

        return $errorCount > 0 ? 'danger' : 'success';
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AlertsStatsWidget::class,
            RecentErrorsTable::class,
        ];
    }
}
