<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTraining extends Model
{
    use HasFactory;
    protected $fillable=['employee_id','training_name','institution_name','training_duration','training_duration_operator','training_completion_date'];
}
