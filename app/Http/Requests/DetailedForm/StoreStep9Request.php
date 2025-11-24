<?php

namespace App\Http\Requests\DetailedForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreStep9Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'expectations' => 'nullable|string|max:2000',
            'other_info' => 'nullable|string|max:2000',
            'additional_files' => 'nullable|array|max:5',
            'additional_files.*' => 'file|mimes:pdf,doc,docx,png,jpg,jpeg|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'expectations.max' => 'Expectations must not exceed 2000 characters.',
            'other_info.max' => 'Other information must not exceed 2000 characters.',
            'additional_files.max' => 'You can upload a maximum of 5 files.',
            'additional_files.*.file' => 'Each upload must be a valid file.',
            'additional_files.*.mimes' => 'Files must be PDF, DOC, DOCX, PNG, JPG, or JPEG format.',
            'additional_files.*.max' => 'Each file must not exceed 10MB.',
        ];
    }
}
