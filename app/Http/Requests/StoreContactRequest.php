<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'business_size' => 'required|string|in:small,medium,large,enterprise',
            'industry' => 'required|string|in:technology,healthcare,finance,ecommerce,education,manufacturing,other',
            'project_description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get custom validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'company.required' => 'Please enter your company name.',
            'phone.required' => 'Please enter your phone number.',
            'business_size.required' => 'Please select your business size.',
            'business_size.in' => 'Please select a valid business size.',
            'industry.required' => 'Please select your industry.',
            'industry.in' => 'Please select a valid industry.',
            'project_description.max' => 'Project description must not exceed 1000 characters.',
        ];
    }

    /**
     * Get custom attribute names for validation errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'full_name' => 'full name',
            'business_size' => 'business size',
            'project_description' => 'project description',
        ];
    }
}
