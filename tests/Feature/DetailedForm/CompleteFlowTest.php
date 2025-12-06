<?php

use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('can access step 1', function () {
    $response = get(route('detailed-form.step1.show'));

    $response->assertSuccessful();
    $response->assertSee('Προδιαγραφές για τον AI Assistant');
});

it('validates step 1 required fields', function () {
    $response = post(route('detailed-form.step1.store'), []);

    $response->assertSessionHasErrors([
        'full_name',
        'email',
        'company',
        'phone',
        'website_social',
        'industry',
    ]);
});

it('can complete step 1 and redirect to step 2', function () {
    $response = post(route('detailed-form.step1.store'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'website_social' => 'https://example.com',
        'industry' => 'Technology',
    ]);

    $response->assertRedirect(route('detailed-form.step2.show'));
    expect(session('detailed_form.step_1'))->toHaveKeys([
        'full_name',
        'email',
        'company',
        'phone',
        'website_social',
        'industry',
    ]);
});

it('can navigate through all steps', function () {
    // Step 1
    post(route('detailed-form.step1.store'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'website_social' => 'https://example.com',
        'industry' => 'Technology',
    ])->assertRedirect(route('detailed-form.step2.show'));

    // Step 2
    post(route('detailed-form.step2.store'), [
        'platform' => 'wordpress',
        'has_live_chat' => 'no',
    ])->assertRedirect(route('detailed-form.step3.show'));

    // Step 3
    post(route('detailed-form.step3.store'), [
        'channels' => ['email', 'messenger'],
        'integration_goal' => 'Test integration goal',
    ])->assertRedirect(route('detailed-form.step4.show'));

    // Step 4
    post(route('detailed-form.step4.store'), [
        'functions' => ['faq', 'product_info'],
        'additional_details' => 'Test details',
    ])->assertRedirect(route('detailed-form.step5.show'));

    // Step 5
    post(route('detailed-form.step5.store'), [
        'email_platform' => 'mailchimp',
        'email_types' => ['order_confirmation', 'shipping_tracking'],
    ])->assertRedirect(route('detailed-form.step6.show'));

    // Step 6
    post(route('detailed-form.step6.store'), [
        'ready_content' => 'yes',
        'operating_hours' => '24_7',
    ])->assertRedirect(route('detailed-form.step7.show'));

    // Step 7
    post(route('detailed-form.step7.store'), [
        'software_type' => 'crm',
        'software_name' => 'Salesforce',
        'desired_functions' => ['lead_tracking'],
        'api_access' => 'yes',
    ])->assertRedirect(route('detailed-form.step8.show'));

    // Step 8
    post(route('detailed-form.step8.store'), [
        'website_manager' => 'Tech Team',
        'technical_person' => 'yes',
        'social_manager' => 'Marketing Team',
    ])->assertRedirect(route('detailed-form.step9.show'));

    // Step 9
    post(route('detailed-form.step9.submit'), [
        'expectations' => 'High quality AI assistant',
        'other_info' => 'Looking forward to collaboration',
    ])->assertRedirect(route('detailed-form.thankyou'));

    // Verify session is cleared after submission
    expect(session('detailed_form'))->toBeNull();
});

it('preserves form data when navigating back', function () {
    // Fill step 1
    post(route('detailed-form.step1.store'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'website_social' => 'https://example.com',
        'industry' => 'Technology',
    ]);

    // Go to step 2 and check step 1 data is still in session
    $response = get(route('detailed-form.step2.show'));
    $response->assertSuccessful();
    expect(session('detailed_form.step_1.full_name'))->toBe('John Doe');
});

it('can access thank you page', function () {
    $response = get(route('detailed-form.thankyou'));

    $response->assertSuccessful();
    $response->assertSee('Ευχαριστούμε για τις Αναλυτικές σας Απαντήσεις!');
});
