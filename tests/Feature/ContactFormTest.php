<?php

use function Pest\Laravel\post;

it('validates required fields', function () {
    $response = post(route('contact.create'), []);

    $response->assertSessionHasErrors([
        'full_name',
        'email',
        'company',
        'phone',
        'business_size',
        'industry',
    ]);
});

it('validates email format', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'invalid-email',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'small',
        'industry' => 'technology',
    ]);

    $response->assertSessionHasErrors(['email']);
});

it('validates business size is valid option', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'invalid',
        'industry' => 'technology',
    ]);

    $response->assertSessionHasErrors(['business_size']);
});

it('validates industry is valid option', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'small',
        'industry' => 'invalid',
    ]);

    $response->assertSessionHasErrors(['industry']);
});

it('accepts valid form data without project description', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'small',
        'industry' => 'technology',
    ]);

    $response->assertRedirect(route('contact.thankyou'));
    $response->assertSessionHas('success');
});

it('accepts valid form data with project description', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'medium',
        'industry' => 'healthcare',
        'project_description' => 'We need an AI agent for customer support',
    ]);

    $response->assertRedirect(route('contact.thankyou'));
    $response->assertSessionHas('success');
});

it('validates project description max length', function () {
    $response = post(route('contact.create'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'company' => 'Test Company',
        'phone' => '1234567890',
        'business_size' => 'large',
        'industry' => 'finance',
        'project_description' => str_repeat('a', 1001),
    ]);

    $response->assertSessionHasErrors(['project_description']);
});
