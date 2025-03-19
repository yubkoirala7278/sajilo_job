<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PreferredIndustryRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'max:255', Rule::unique('preferred_industries', 'name')->ignore($this->route('preferred_industry'), 'slug')],
            'status' => 'required|in:active,inactive',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'status.in' => 'The selected status is invalid. It must be either active or inactive.',
        ];
    }

}
