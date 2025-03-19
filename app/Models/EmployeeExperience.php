<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'organization_name',
        'job_location',
        'job_title',
        'job_level',
        'started_date',
        'end_date',
        'duties_and_responsibilities',
        'is_currently_working',
        'organization_nature_id',
        'job_category_id'
    ];

    protected $casts = [
        'started_date' => 'date',
        'end_date' => 'date',
        'is_currently_working' => 'boolean',
    ];

    // Relationship with organization nature
    public function OrganizationNature(){
        return $this->belongsTo(OrganizationNature::class);
    }

    // Relationship with job category
    public function JobCategory(){
        return $this->belongsTo(JobCategory::class);
    }
}
