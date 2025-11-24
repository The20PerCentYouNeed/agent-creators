<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep7Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'software_type' => 'nullable|string|in:erp,crm,both,no,dont_know',
            'software_name' => 'nullable|string|max:255',
            'desired_functions' => 'nullable|array',
            'desired_functions.*' => 'string|in:lead_tracking,order_updates,status_tracking,follow_up_automation,customer_info_updates,other',
            'api_access' => 'nullable|string|in:no,yes,dont_know',
        ];
    }

    public function messages(): array
    {
        return [
            'software_type.in' => 'Please select a valid software type.',
            'software_name.max' => 'Software name must not exceed 255 characters.',
            'desired_functions.array' => 'Please select valid functions.',
            'desired_functions.*.in' => 'One or more selected functions are invalid.',
            'api_access.in' => 'Please select a valid API access option.',
        ];
    }
}
