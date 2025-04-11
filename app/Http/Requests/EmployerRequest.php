<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerRequest extends FormRequest
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
            'name'=>'required|max:255',
            'email'=>'required',
            'contact_number'=>'required',
            'company_website'=>'nullable',
            'company_address'=>'required',
            'company_description'=>'required',
            'company_logo'=>'nullable',
            'categories'=>'array|required'
        ];
    }
}
