<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contact_number',
        'company_logo',
        'company_description',
        'company_website',
        'company_address',
        'is_trial_active',
        'trial_ends_at',
        'subscription_ends_at',
        'subscription_status'
    ];

    protected $casts = [
        'trial_ends_at' => 'date',
        'subscription_ends_at' => 'date',
    ];

    // Relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with job categories
    public function jobCategories()
    {
        return $this->belongsToMany(JobCategory::class, 'employer_job_category', 'employer_id', 'job_category_id')
            ->withTimestamps();
    }

    // Relationship with subscriptions
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // check if subscription is active or not
    public function isSubscriptionActive()
    {
        if ($this->is_trial_active && now()->lessThanOrEqualTo($this->trial_ends_at)) {
            return true;
        }
        return $this->subscription_status === 'active' && now()->lessThanOrEqualTo($this->subscription_ends_at);
    }
}
