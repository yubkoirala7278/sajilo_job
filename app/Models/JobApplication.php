<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'job_id',
        'status',
        'applied_at',
    ];
    protected $casts = [
        'applied_at' => 'datetime',
    ];
    

    // Relationship: Applicant (employee)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Job being applied to
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
