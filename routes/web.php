<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    // If a category filter is present, temporarily show Coming Soon.
    if ($request->filled('category')) {
        return view('coming-soon');
    }

    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Temporary Coming Soon routes for linked pages that are not implemented yet.
// Ensures HTTP 200 responses instead of 404 for marketing/navigation links.
foreach ([
    // Marketing & info pages.
    'how-it-works',
    'use-cases',
    'trust-safety',
    'pricing',
    'guides/buyers',
    'faq',
    'become-a-creator',
    'creator-handbook',
    'community',
    'events',
    'api',
    'enterprise',
    'managed',
    'ai-matching',
    'security',
    'contact-sales',
    'about',
    'careers',
    'blog',
    'terms',
    'privacy',
    'contact',

    // Product flows.
    'projects/new',

    // Social auth placeholders used in views.
    'auth/apple/redirect',
    'auth/facebook/redirect',
    'auth/google/redirect',
] as $path) {
    Route::view($path, 'coming-soon')
        ->name('coming-soon.' . str_replace(['/', '-'], ['.', '.'], $path));
}

// Category slugs should also resolve to Coming Soon until category pages are implemented.
Route::view('/categories/{slug}', 'coming-soon')->name('categories.show');

Route::view('/category/{slug}', 'coming-soon')->name('category.show');
