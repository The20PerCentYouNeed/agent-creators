<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep3Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'channels' => 'nullable|array',
            'channels.*' => 'string|in:email,messenger,instagram_dm,whatsapp,viber,phone,live_chat,combination',
            'integration_goal' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'channels.array' => 'Please select valid communication channels.',
            'channels.*.in' => 'One or more selected channels are invalid.',
            'integration_goal.max' => 'Integration goal description must not exceed 2000 characters.',
        ];
    }
}
