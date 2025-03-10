<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['mobile_no', 'job_categories_id', 'user_id'];

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
    public function jobTitles()
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
}
