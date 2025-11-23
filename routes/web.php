<?php

use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::view('/contact', 'contact-form')->name('contact');
Route::post('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::view('/privacy-policy', 'static-pages.privacy-policy')->name('privacy-policy');
Route::view('/terms', 'static-pages.terms')->name('terms');
Route::view('/cookie-policy', 'cookie-policy')->name('cookie-policy');
Route::view('/pricing', 'static-pages.pricing')->name('pricing');
Route::view('/documentation', 'static-pages.documentation')->name('documentation');
Route::view('/about', 'static-pages.about')->name('about');
Route::view('/careers', 'static-pages.careers')->name('careers');
Route::view('/security', 'static-pages.security')->name('security');
Route::view('/compliance', 'static-pages.compliance')->name('compliance');
Route::view('/case-studies/ai-ecommerce-assistant', 'case-studies.e-commerce-assistant')
    ->name('case-studies.ai-ecommerce-assistant');
Route::view(
    '/case-studies/procurement-optimization-agent',
    'case-studies.procurement-optimization-agent'
)->name('case-studies.procurement-optimization-agent');
Route::view('/case-studies/dental-clinic-assistant', 'case-studies.dental-clinic-assistant')
    ->name('case-studies.dental-clinic-assistant');

Route::post('/chat', [ChatBotController::class, 'store'])->name('chat.store');
