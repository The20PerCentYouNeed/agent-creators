<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep1Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'website_social' => 'required|url|max:500',
            'industry' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'company.required' => 'Please enter your company name.',
            'phone.required' => 'Please enter your phone number.',
            'website_social.required' => 'Please enter your website or social media URL.',
            'website_social.url' => 'Please enter a valid URL.',
            'industry.required' => 'Please enter your industry sector.',
        ];
    }
}
