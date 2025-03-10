<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmployeeSkill extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name', 'status'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee_availability) {
            $employee_availability->slug = self::generateUniqueSlug();
        });
    }

    private static function generateUniqueSlug()
    {
        do {
            $slug = Str::random(8); // Generate an 8-character random string
        } while (self::where('slug', $slug)->exists()); // Ensure uniqueness

        return $slug;
    }

    // Relationship with employees
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_employee_skill');
    }
}
