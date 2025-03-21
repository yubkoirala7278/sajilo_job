<?php

use App\Http\Controllers\admin\DegreeController;
use App\Http\Controllers\admin\EmployeeAvailabilityController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\EmployeeCourseController;
use App\Http\Controllers\admin\EmployeeSkillController;
use App\Http\Controllers\admin\EmployeeSpecializationController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\JobPreferenceLocationController;
use App\Http\Controllers\admin\JobSeekerManagementController;
use App\Http\Controllers\admin\JobTitleController;
use App\Http\Controllers\admin\OrganizationNatureController;
use App\Http\Controllers\admin\PreferredIndustryController;
use App\Http\Controllers\admin\ReligionController;
use App\Http\Controllers\admin\TechnicalSkillController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');


// =============employee============
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee_profile', [EmployeeController::class, 'index'])->name('admin.employee.profile');
    Route::put('/update_employee_job_preferences', [EmployeeController::class, 'updateJobPreferences'])->name('update.employee.job.preferences');
    Route::put('/update_employee_basic_information', [EmployeeController::class, 'updateBasicInformation'])->name('update.employee.basic.information');
    Route::put('/update_employee_education', [EmployeeController::class, 'updateEducation'])->name('update.employee.education');
    Route::put('/update_employee_training', [EmployeeController::class, 'updateTraining'])->name('update.employee.training');
    Route::put('/update_employee_experience', [EmployeeController::class, 'updateExperience'])->name('update.employee.experience');
    Route::put('/update_employee_language', [EmployeeController::class, 'updateLanguage'])->name('update.employee.language');
    Route::put('/update_employee_accounts', [EmployeeController::class, 'updateSocialAccount'])->name('update.employee.account');
    Route::put('/update_employee_other_information', [EmployeeController::class, 'updateOtherInformation'])->name('update.employee.other.information');
    Route::get('/get-courses/{degree_id}', [EmployeeController::class, 'fetchCourse'])->name('fetch.course');
});


// ==================admin===========
Route::middleware(['auth', 'role:admin'])->group(function () {
    // job seekers
    Route::group(['prefix' => 'job-seeker'], function () {
        Route::get('/management', [JobSeekerManagementController::class, 'index'])->name('job.seeker.management');
        Route::get('/management/data', [JobSeekerManagementController::class, 'getData'])->name('job.seeker.data');
        Route::delete('/management/delete/{id}', [JobSeekerManagementController::class, 'destroy'])->name('job.seeker.delete');
        Route::put('/management/status/{id}', [JobSeekerManagementController::class, 'changeStatus'])->name('job.seeker.status');
        Route::get('/management/view/{id}', [JobSeekerManagementController::class, 'view'])->name('job.seeker.view');
        Route::get('/management/cv/{id}', [JobSeekerManagementController::class, 'viewCV'])->name('job.seeker.cv');
    });
    Route::resources([
        'job_category' => JobCategoryController::class,
        'technical_skill' => TechnicalSkillController::class,
        'job_title' => JobTitleController::class,
        'preferred_industry' => PreferredIndustryController::class,
        'employee_availability' => EmployeeAvailabilityController::class,
        'employee_specialization' => EmployeeSpecializationController::class,
        'employee_skill' => EmployeeSkillController::class,
        'job_preference_location' => JobPreferenceLocationController::class,
        'religion' => ReligionController::class,
        'employee_degree' => DegreeController::class,
        'employee_course' => EmployeeCourseController::class,
        'organization_nature' => OrganizationNatureController::class,
    ]);
    Route::patch('/job_category/toggle-status/{slug}', [JobCategoryController::class, 'toggleStatus'])->name('job_category.toggle-status');
    Route::patch('/technical_skill/toggle-status/{slug}', [TechnicalSkillController::class, 'toggleStatus'])->name('technical_skill.toggle-status');
    Route::patch('/job_title/toggle-status/{slug}', [JobTitleController::class, 'toggleStatus'])->name('job_title.toggle-status');
    Route::patch('/preferred_industry/toggle-status/{slug}', [PreferredIndustryController::class, 'toggleStatus'])->name('preferred_industry.toggle-status');
    Route::patch('/employee_availability/toggle-status/{slug}', [EmployeeAvailabilityController::class, 'toggleStatus'])->name('employee_availability.toggle-status');
    Route::patch('/employee_specialization/toggle-status/{slug}', [EmployeeSpecializationController::class, 'toggleStatus'])->name('employee_specialization.toggle-status');
    Route::patch('/employee_skill/toggle-status/{slug}', [EmployeeSkillController::class, 'toggleStatus'])->name('employee_skill.toggle-status');
    Route::patch('/job_preference_location/toggle-status/{slug}', [JobPreferenceLocationController::class, 'toggleStatus'])->name('job_preference_location.toggle-status');
    Route::patch('/religion/toggle-status/{slug}', [ReligionController::class, 'toggleStatus'])->name('religion.toggle-status');
    Route::patch('/employee_degree/toggle-status/{slug}', [DegreeController::class, 'toggleStatus'])->name('employee_degree.toggle-status');
    Route::patch('/employee_course/toggle-status/{slug}', [EmployeeCourseController::class, 'toggleStatus'])->name('employee_course.toggle-status');
    Route::patch('/organization_nature/toggle-status/{slug}', [OrganizationNatureController::class, 'toggleStatus'])->name('organization_nature.toggle-status');
});
