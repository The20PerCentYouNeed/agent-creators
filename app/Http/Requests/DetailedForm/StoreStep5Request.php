<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep5Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email_platform' => 'nullable|string|in:mailchimp,moosend,klaviyo,no,other',
            'email_types' => 'nullable|array',
            'email_types.*' => 'string|in:order_confirmation,shipping_tracking,follow_up,newsletters,other',
        ];
    }

    public function messages(): array
    {
        return [
            'email_platform.in' => 'Please select a valid email marketing platform.',
            'email_types.array' => 'Please select valid email types.',
            'email_types.*.in' => 'One or more selected email types are invalid.',
        ];
    }
}
