<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'platform' => 'nullable|string|in:wordpress,shopify,custom,wix,other',
            'has_live_chat' => 'nullable|string|in:yes,no,unknown',
        ];
    }

    public function messages(): array
    {
        return [
            'platform.in' => 'Please select a valid platform option.',
            'has_live_chat.in' => 'Please select a valid option.',
        ];
    }
}
