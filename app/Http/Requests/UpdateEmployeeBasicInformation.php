<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeBasicInformation extends FormRequest
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
    public function rules()
    {
        return [
            'name'=>'nullable|max:255',
            'gender' => 'nullable|in:Male,Female,Other',
            'dob' => 'nullable|date',
            'marital_status' => 'nullable|in:Married,Unmarried',
            'religion' => 'nullable|exists:religions,id',
            'is_disabled' => 'nullable',
            'country' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validate resume
            'profile'=>'nullable|image|max:2048', // Validate resume
            'current_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'contact_number' => 'nullable|string',
        ];
    }
}
