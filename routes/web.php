<?php

use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/contact', 'contact-form')->name('contact');
Route::post('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::get('/case-studies', [CaseStudyController::class, 'index'])->name('case-studies.index');
Route::get('/case-studies/{CaseStudy:slug}', [CaseStudyController::class, 'show'])
    ->name('case-studies.show');

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
