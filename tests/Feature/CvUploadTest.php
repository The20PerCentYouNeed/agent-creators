<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('can upload a CV successfully with valid data', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '+1234567890',
        'cv_file' => $file,
    ]);

    $response->assertRedirect(route('careers'));
    $response->assertSessionHas('success');

    $files = Storage::disk('local')->files('cvs');
    expect($files)->toHaveCount(1);
    expect($files[0])->toContain('John_Doe');
});

it('requires full name when uploading CV', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => '',
        'email' => 'john.doe@example.com',
        'cv_file' => $file,
    ]);

    $response->assertSessionHasErrors('full_name');
});

it('requires email when uploading CV', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => '',
        'cv_file' => $file,
    ]);

    $response->assertSessionHasErrors('email');
});

it('requires valid email format', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'invalid-email',
        'cv_file' => $file,
    ]);

    $response->assertSessionHasErrors('email');
});

it('requires CV file', function () {
    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'john.doe@example.com',
    ]);

    $response->assertSessionHasErrors('cv_file');
});

it('only accepts PDF, DOC, and DOCX files', function (string $extension, bool $shouldPass) {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.' . $extension, 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'cv_file' => $file,
    ]);

    if ($shouldPass) {
        $response->assertSessionHasNoErrors('cv_file');
    }
    else {
        $response->assertSessionHasErrors('cv_file');
    }
})->with([
    ['pdf', true],
    ['doc', true],
    ['docx', true],
    ['txt', false],
    ['jpg', false],
    ['png', false],
]);

it('rejects CV files larger than 10MB', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 11000);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'cv_file' => $file,
    ]);

    $response->assertSessionHasErrors('cv_file');
});

it('accepts CV without phone number', function () {
    Storage::fake('local');

    $file = UploadedFile::fake()->create('cv.pdf', 1024);

    $response = $this->post(route('careers.cv.store'), [
        'full_name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'cv_file' => $file,
    ]);

    $response->assertRedirect(route('careers'));
    $response->assertSessionHasNoErrors();
});
