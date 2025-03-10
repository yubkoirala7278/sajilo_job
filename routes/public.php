<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\public\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/job-listing', [JobController::class, 'index'])->name('job.listing');
Route::get('/job-details', [JobController::class, 'jobDetails'])->name('job.details');
Route::get('/job-seekers', [JobController::class, 'jobSeekers'])->name('job.seekers');
Route::get('/job-seeker-detail', [JobController::class, 'jobSeekerDetail'])->name('job.seeker.detail');
Route::get('/employee_register',[AuthController::class,'employeeRegister'])->name('employee.register');
Route::post('/employee_register',[AuthController::class,'register'])->name('employee.store');
Route::get('/employee_details',[AuthController::class,'employeeDetails'])->name('employee.details');
Route::post('/employee_details',[AuthController::class,'storeEmployeeDetails'])->name('employee.details.store');
Route::get('jobseeker/overview',[AuthController::class,'jobSeekerOverview'])->name('job.seeker.overview');
Route::get('employee_profile/{profile_detail}/{profile_sub_detail?}',[AuthController::class,'employeeProfile'])->name('employee.profile');