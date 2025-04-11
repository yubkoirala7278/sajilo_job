<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'contact_number' => 'required|string|max:20',
            'company_website' => 'nullable|url|max:255',
            'company_address' => 'required|string|max:255',
            'company_logo' => 'nullable|image|max:2048', // Max 2MB
            'company_description' => 'required|string',
            'categories' => 'required|array', 
            'categories.*' => 'exists:job_categories,id', // Each ID must exist in job_categories
        ];
    }
}
