<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep6Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ready_content' => 'nullable|string|in:yes,no,partially,in_development',
            'operating_hours' => 'nullable|string|in:24_7,business_hours',
        ];
    }

    public function messages(): array
    {
        return [
            'ready_content.in' => 'Please select a valid content availability option.',
            'operating_hours.in' => 'Please select a valid operating hours option.',
        ];
    }
}
