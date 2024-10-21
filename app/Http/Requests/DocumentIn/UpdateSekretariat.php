<?php

namespace App\Http\Requests\DocumentIn;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSekretariat extends FormRequest
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
            'document_no' => ['required', 'string', 'max:20'],
            'received_at' => ['required', 'date'],
            'from' => ['required', 'string', 'max:100'],
            'subject' => ['required', 'string', 'max:255'],
            'document_type_id' => ['required', 'integer', 'exists:document_types,id'],
            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'], # 10 MB
            'status' => ['required', 'string', 'max:30'],
            'document_index' => ['nullable', 'string', 'max:30'],
            'finished_at' => ['nullable', 'date'],
            'instruction_note' => ['nullable', 'string', 'max:255'],
            'forwarded_to' => ['nullable', 'string', 'max:100'],
        ];
    }
}
