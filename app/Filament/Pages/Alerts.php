<?php

namespace App\Filament\Pages;

use App\Models\AgentInteraction;
use Filament\Pages\Page;

class Alerts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    protected static string $view = 'filament.pages.alerts';

    protected static ?string $navigationLabel = 'Alerts';

    protected static ?int $navigationSort = 6;

    protected static ?string $title = 'Performance Alerts';

    protected static ?string $description = 'Monitor errors and performance issues';

    public function getBadge(): ?string
    {
        $errorCount = AgentInteraction::whereIn('status', ['error', 'timeout'])
            ->whereDate('created_at', today())
            ->count();

        return $errorCount > 0 ? (string) $errorCount : null;
    }
}
