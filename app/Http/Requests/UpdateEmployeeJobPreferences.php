<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeJobPreferences extends FormRequest
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
            'job_level' => 'nullable|string|in:top_level,senior_level,mid_level,entry_level',
            'expected_salary_currency' => 'nullable|string|in:NRs,$,Irs',
            'expected_salary_operator' => 'nullable|string|in:Above,Below,Equals',
            'expected_salary' => 'nullable|numeric|min:0',
            'expected_salary_unit' => 'nullable|string|in:Hourly,Daily,Weekly,Monthly,Yearly',
            'current_salary_currency' => 'nullable|string|in:NRs,$,Irs',
            'current_salary_operator' => 'nullable|string|in:Above,Below,Equals',
            'current_salary' => 'nullable|numeric|min:0',
            'current_salary_unit' => 'nullable|string|in:Hourly,Daily,Weekly,Monthly,Yearly',
            'career_objective_summary' => 'nullable|string|max:1000', // Adjust max length as needed
            'job_categories' => 'nullable|array',
            'job_categories.*' => 'exists:job_categories,id',
            'industries' => 'nullable|array',
            'industries.*' => 'exists:preferred_industries,id',
            'preferred_job_title' => 'nullable|array',
            'preferred_job_title.*' => 'exists:job_titles,id',
            'available_for' => 'nullable|array',
            'available_for.*' => 'exists:employee_availabilities,id',
            'specializations' => 'nullable|array',
            'specializations.*' => 'exists:employee_specializations,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:employee_skills,id',
            'job_location' => 'nullable|array',
            'job_location.*' => 'exists:job_preference_locations,id',
        ];
    }
}
