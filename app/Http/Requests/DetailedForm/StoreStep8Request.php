<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep8Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'website_manager' => 'nullable|string|max:255',
            'technical_person_available' => 'nullable|string|in:yes,no',
            'social_media_manager' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'website_manager.max' => 'Website manager name must not exceed 255 characters.',
            'technical_person_available.in' => 'Please select a valid option.',
            'social_media_manager.max' => 'Social media manager name must not exceed 255 characters.',
        ];
    }
}
