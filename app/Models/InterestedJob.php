<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedJob extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_id', 'interested_at'];

    protected $casts = [
        'interested_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
