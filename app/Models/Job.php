<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'slug',
        'job_title',
        'category_id',
        'job_level',
        'employment_type',
        'no_of_vacancy',
        'job_country',
        'job_location',
        'offered_salary',
        'is_negotiable',
        'posted_at',
        'expiry_date',
        'degree_id',
        'experience_required',
        'job_description',
        'other_specification',
        'status',
        'job_views_count',
        'is_approved'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Add date casting
    protected $casts = [
        'posted_at' => 'datetime',
        'expiry_date' => 'datetime',
        'is_negotiable' => 'boolean',
    ];

    // Relationship with skills
    public function skills()
    {
        return $this->belongsToMany(EmployeeSkill::class, 'job_skills', 'job_id', 'employee_skill_id');
    }

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }
}
