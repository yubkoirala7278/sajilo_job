<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'job_title' => 'required|string|max:255',
            'category_id' => 'required|exists:job_categories,id',
            'job_level' => 'required|in:Entry Level,Mid Level,Senior Level',
            'employment_type' => 'required|in:Full Time,Part Time,Contract,Freelance,Internship',
            'no_of_vacancy' => 'required|integer|min:1',
            'job_country' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'offered_salary' => 'nullable|string|max:255',
            'is_negotiable' => 'nullable|boolean',
            'expiry_date' => 'nullable|date|after:today',
            'degree_id' => 'nullable|exists:degrees,id',
            'experience_required' => 'required|string|max:255',
            'job_description' => 'required|string',
            'other_specification' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:employee_skills,id',
        ];
    }

    public function messages()
    {
        return [
            'job_title.required' => 'The job title is required.',
            'category_id.exists' => 'The selected category is invalid.',
            'job_level.in' => 'The job level must be one of the following: Entry Level, Mid Level, Senior Level.',
            'employment_type.in' => 'The employment type must be one of the following: Full Time, Part Time, Contract, Freelance, Internship.',
            'posted_at.before_or_equal' => 'The posting date cannot be in the future.',
            'expiry_date.after_or_equal' => 'The expiry date must be after or equal to the posted date.',
            'experience_required.required' => 'Experience required is required.',
            'job_description.required' => 'The job description is required.',
        ];
    }
}
