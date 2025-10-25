<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $locale = config('app.locale') ?? config('app.fallback_locale');

    return redirect("/{$locale}");
});

Route::prefix('{locale}')
    ->whereIn('locale', config('app.locales'))
    ->group(function () {
        Route::view('/', 'home')->name('home');

        Route::view('/contact', 'contact-form')->name('contact');
        Route::post('/contact', [ContactController::class, 'create'])->name('contact.create');
    });

// API Routes.
Route::prefix('api')->group(function () {
    Route::post('/leads', function (Illuminate\Http\Request $request) {
        // Basic validation.
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'business_size' => 'nullable|string|in:small,medium,large,enterprise',
            'industry' => 'nullable|string|in:technology,healthcare,finance,' .
                'ecommerce,education,manufacturing,other',
            'project_description' => 'nullable|string|max:1000',
        ]);

        // For now, just log the lead data.
        // In a real application, you would save this to a database.
        \Illuminate\Support\Facades\Log::info('New lead received:', $validated);

        // You could also send an email notification here.
        // Mail::to('leads@yourapp.com')->send(new NewLeadMail($validated));
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your interest! We\'ll contact you soon.',
        ]);
    });
});
