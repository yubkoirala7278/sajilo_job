<?php

use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');


// employee
Route::get('/employee_profile', [EmployeeController::class, 'index'])->name('admin.employee.profile');
