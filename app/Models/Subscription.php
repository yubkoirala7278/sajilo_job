<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id', 'plan_type', 'amount', 'receipt_path', 
        'payment_status', 'start_date', 'end_date', 'admin_notes'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
