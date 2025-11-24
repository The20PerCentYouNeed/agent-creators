<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep4Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'functions' => 'nullable|array',
            'functions.*' => 'string|in:faq,product_info,order_updates,abandoned_cart,payment_issues,live_chat_support,event_promotion,newsletter_promotion,other',
            'additional_details' => 'nullable|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'functions.array' => 'Please select valid functions.',
            'functions.*.in' => 'One or more selected functions are invalid.',
            'additional_details.max' => 'Additional details must not exceed 2000 characters.',
        ];
    }
}
