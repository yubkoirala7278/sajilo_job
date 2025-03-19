<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','language','reading','writing','speaking','listening'];

    // Relationship with employee
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
