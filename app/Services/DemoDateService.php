<?php

namespace App\Services;

use App\Models\AgentInteraction;
use App\Models\AgentMetric;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class DemoDateService
{
    /**
     * Get the reference date for demo data (latest date with metrics).
     * Uses cache to avoid repeated queries.
     */
    public static function getReferenceDate(): Carbon
    {
        return Cache::remember('demo_reference_date', 300, function () {
            $latestMetric = AgentMetric::query()
                ->orderByDesc('date')
                ->first();

            return $latestMetric ? Carbon::parse($latestMetric->date) : today();
        });
    }

    /**
     * Get "today" relative to demo data.
     */
    public static function today(): Carbon
    {
        return static::getReferenceDate();
    }

    /**
     * Get "yesterday" relative to demo data.
     */
    public static function yesterday(): Carbon
    {
        return static::getReferenceDate()->subDay();
    }

    /**
     * Get "now" relative to demo data (end of reference date).
     */
    public static function now(): Carbon
    {
        return static::getReferenceDate()->endOfDay();
    }

    /**
     * Get the start of a date range (X days before reference date).
     */
    public static function daysAgo(int $days): Carbon
    {
        return static::getReferenceDate()->subDays($days)->startOfDay();
    }

    /**
     * Get the latest interaction date for tables that use ->since().
     */
    public static function getLatestInteractionDate(): Carbon
    {
        return Cache::remember('demo_latest_interaction', 300, function () {
            $latest = AgentInteraction::query()
                ->orderByDesc('created_at')
                ->first();

            return $latest ? Carbon::parse($latest->created_at) : now();
        });
    }

    /**
     * Clear cached dates (call after re-seeding).
     */
    public static function clearCache(): void
    {
        Cache::forget('demo_reference_date');
        Cache::forget('demo_latest_interaction');
    }
}
