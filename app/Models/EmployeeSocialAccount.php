<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSocialAccount extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','account_name','account_url'];

    // Relationship with employee
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
