<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile',
        'job_level',
        'expected_salary_currency',
        'expected_salary_operator',
        'expected_salary',
        'expected_salary_unit',
        'current_salary_currency',
        'current_salary_operator',
        'current_salary',
        'current_salary_unit',
        'career_objective_summary',
        'gender',
        'date_of_birth',
        'marital_status',
        'religion_id',
        'is_disabled',
        'country',
        'resume',
        'current_address',
        'permanent_address',
        'contact_number',

        'degree_id',
        'course_id',
        'board_or_university',
        'school_or_college_or_institute',
        'is_currently_studying',
        'grade_type',
        'mark_secured',
        'graduation_year',
        'graduation_month',
        'education_started_year',
        'education_started_month',
        'willing_to_travel',
        'willing_to_relocate',
        'two_wheeler_license',
        'four_wheeler_license',
        'own_two_wheeler',
        'own_four_wheeler'
    ];

    protected $casts = [
        'date_of_birth' => 'date', // Ensures it's treated as a Carbon instance
    ];

    // Relationship with job categories
    public function jobCategories()
    {
        return $this->belongsToMany(JobCategory::class, 'employee_job_category');
    }

    // Relationship with preferred industries
    public function preferredIndustries()
    {
        return $this->belongsToMany(PreferredIndustry::class, 'employee_preferred_industry');
    }

    // Relationship with job titles
    public function preferredJobTitles()
    {
        return $this->belongsToMany(JobTitle::class, 'employee_job_title');
    }

    // Relationship with employee availability
    public function availabilities()
    {
        return $this->belongsToMany(EmployeeAvailability::class, 'employee_employee_availability');
    }

    // Relationship with employee specialization
    public function employeeSpecializations()
    {
        return $this->belongsToMany(EmployeeSpecialization::class, 'employee_employee_specialization', 'employee_id', 'employee_specialization_id');
    }

    // Relationship with employee skills
    public function skills()
    {
        return $this->belongsToMany(EmployeeSkill::class, 'employee_employee_skill');
    }

    // Relationship with job preferred locations
    public function jobPreferenceLocations()
    {
        return $this->belongsToMany(JobPreferenceLocation::class, 'employee_job_preference_location', 'employee_id', 'job_preference_location_id');
    }

    // Relationship with religion
    public function religion(){
        return $this->belongsTo(Religion::class);
    }

    // Relationship with degree
    public function degree(){
        return $this->belongsTo(Degree::class);
    }

    // Relationship with course
    public function course(){
        return $this->belongsTo(Course::class);
    }

    // Relationship with language
    public function language(){
        return $this->hasMany(EmployeeLanguage::class);
    }
}
