<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobCategory extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'category', 'status'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jobCategory) {
            $jobCategory->slug = self::generateUniqueSlug();
        });
    }

    private static function generateUniqueSlug()
    {
        do {
            $slug = Str::random(8); // Generate an 8-character random string
        } while (self::where('slug', $slug)->exists()); // Ensure uniqueness

        return $slug;
    }

    // Relationship with Employees
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_job_category');
    }

    // Relationship with employers
    public function jobCategories()
    {
        return $this->belongsToMany(JobCategory::class, 'employer_job_category', 'employer_id', 'job_category_id')
                    ->withTimestamps();
    }
}
