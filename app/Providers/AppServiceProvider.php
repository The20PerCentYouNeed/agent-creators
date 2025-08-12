<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // In testing or early bootstrap the categories table may not exist.
        if (!Schema::hasTable('categories')) {
            View::share('topLevelCategories', collect());
            return;
        }

        // Fetch once (optionally cached) and share to all views.
        $topLevelCategories = Cache::remember('top_level_categories', now()->addMinutes(30), function () {
            return Category::query()
                ->whereNull('parent_id')
                ->orderBy('name')
                ->get(['id', 'name', 'slug']);
        });

        View::share('topLevelCategories', $topLevelCategories);
    }
}
