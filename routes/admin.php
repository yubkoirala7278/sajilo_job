<?php

use App\Http\Controllers\admin\ApplicantController;
use App\Http\Controllers\admin\DegreeController;
use App\Http\Controllers\admin\EmployeeAvailabilityController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\EmployeeCourseController;
use App\Http\Controllers\admin\EmployeeSettingController;
use App\Http\Controllers\admin\EmployeeSkillController;
use App\Http\Controllers\admin\EmployeeSpecializationController;
use App\Http\Controllers\admin\EmployerController;
use App\Http\Controllers\admin\EmployerJobManagement;
use App\Http\Controllers\admin\EmployerManagementController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\JobManagementController;
use App\Http\Controllers\admin\JobPreferenceLocationController;
use App\Http\Controllers\admin\JobSeekerManagementController;
use App\Http\Controllers\admin\JobTitleController;
use App\Http\Controllers\admin\OrganizationNatureController;
use App\Http\Controllers\admin\PreferredIndustryController;
use App\Http\Controllers\admin\ReligionController;
use App\Http\Controllers\admin\SubscriptionController as AdminSubscriptionController;
use App\Http\Controllers\admin\TechnicalSkillController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\employer\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

// =============employee============
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/employee_profile_update', [EmployeeController::class, 'index'])->name('admin.employee.profile.update');
    Route::get('/employee_profile',[EmployeeController::class, 'show'])->name('admin.employee.profile');
    Route::get('/employee_profile/job_applied',[EmployeeController::class, 'jobApplied'])->name('admin.employee.job.applied');
    Route::get('/employee_profile/interested_job',[EmployeeController::class, 'interestedJobs'])->name('admin.employee.interested.jobs');
    Route::get('/employee_profile/rejected_job',[EmployeeController::class, 'rejectedJobs'])->name('admin.employee.rejected.jobs');

    Route::get('/employee_profile/manage_job',[EmployeeController::class, 'manageJob'])->name('admin.employee.manage.jobs');
    Route::get('/employee_profile/shortlisted',[EmployeeController::class, 'shortListed'])->name('admin.employee.shortlisted.jobs');
    Route::get('/employee_profile/selected',[EmployeeController::class, 'selected'])->name('admin.employee.selected.jobs');
    Route::post('/job/{slug}/apply', [EmployeeController::class, 'apply'])->name('job.apply');
    Route::post('/job/{slug}/interested', [EmployeeController::class, 'markInterested'])->name('job.interested');
    Route::get('/employee_profile/search-status', [EmployeeController::class, 'getSearchStatus'])->name('employee.get.searching')->middleware('auth');
    Route::post('/employee_profile/toggle-searching', [EmployeeController::class, 'toggleSearching'])->name('employee.toggle.searching')->middleware('auth');


    Route::put('/update_employee_job_preferences', [EmployeeController::class, 'updateJobPreferences'])->name('update.employee.job.preferences');
    Route::put('/update_employee_basic_information', [EmployeeController::class, 'updateBasicInformation'])->name('update.employee.basic.information');
    Route::put('/update_employee_education', [EmployeeController::class, 'updateEducation'])->name('update.employee.education');
    Route::put('/update_employee_training', [EmployeeController::class, 'updateTraining'])->name('update.employee.training');
    Route::put('/update_employee_experience', [EmployeeController::class, 'updateExperience'])->name('update.employee.experience');
    Route::put('/update_employee_language', [EmployeeController::class, 'updateLanguage'])->name('update.employee.language');
    Route::put('/update_employee_accounts', [EmployeeController::class, 'updateSocialAccount'])->name('update.employee.account');
    Route::put('/update_employee_other_information', [EmployeeController::class, 'updateOtherInformation'])->name('update.employee.other.information');
    Route::get('/get-courses/{degree_id}', [EmployeeController::class, 'fetchCourse'])->name('fetch.course');

    Route::get('/employee_setting',[EmployeeSettingController::class,'employeeSetting'])->name('employee.setting');
    Route::put('/jobseeker_profile_update',[EmployeeSettingController::class,'updateProfile'])->name('jobseeker.profile.update');

});


// ==================admin===========
Route::middleware(['auth', 'role:admin'])->group(function () {
    // job seekers
    Route::group(['prefix' => 'job-seeker'], function () {
        Route::get('/management', [JobSeekerManagementController::class, 'index'])->name('job.seeker.management');
        Route::get('/approved_job_seeker', [JobSeekerManagementController::class, 'approvedJobSeeker'])->name('approved.job.seeker');
        Route::get('/rejected_job_seeker', [JobSeekerManagementController::class, 'rejectedJobSeeker'])->name('rejected.job.seeker');
        Route::get('/management/data', [JobSeekerManagementController::class, 'getData'])->name('job.seeker.data');
        Route::delete('/management/delete/{id}', [JobSeekerManagementController::class, 'destroy'])->name('job.seeker.delete');
        Route::put('/management/status/{id}', [JobSeekerManagementController::class, 'changeStatus'])->name('job.seeker.status');
        Route::get('/management/view/{slug}', [JobSeekerManagementController::class, 'view'])->name('job.seeker.view');
        Route::get('/management/cv/{id}', [JobSeekerManagementController::class, 'viewCV'])->name('job.seeker.cv');
    });

    // employer management
    Route::get('/employer_management', [EmployerManagementController::class, 'index'])->name('admin.employer.management');
    Route::get('/approved_employer_management', [EmployerManagementController::class, 'approved'])->name('admin.approved.employer.management');
    Route::get('/suspended_employer_management', [EmployerManagementController::class, 'suspended'])->name('admin.suspended.employer.management');
    Route::get('/black_listed_employer_management', [EmployerManagementController::class, 'blackListed'])->name('admin.black.listed.employer.management');
    Route::get('/employer_management/data', [EmployerManagementController::class, 'getData'])->name('admin.employer.data');
    Route::post('/employer_management/delete', [EmployerManagementController::class, 'destroy'])->name('admin.employer.delete');
    Route::post('/employer_management/toggle-status/{id}', [EmployerManagementController::class, 'toggleStatus'])->name('admin.employer.toggle');
    Route::get('/employer_management/view/{slug}', [EmployerManagementController::class, 'view'])->name('admin.employer.view');

    // jobs management
    Route::get('/new_job_management', [JobManagementController::class, 'new'])->name('admin.new.job.management');
    Route::get('/approved_job_management', [JobManagementController::class, 'approved'])->name('admin.approved.job.management');
    Route::get('/rejected_job_management', [JobManagementController::class, 'rejected'])->name('admin.rejected.job.management');
    Route::get('/all_job_management', [JobManagementController::class, 'all'])->name('admin.all.job.management');
    Route::put('/job/{slug}/approval', [JobManagementController::class, 'updateApproval'])->name('job.update.approval');
    Route::get('/job/{slug}/show', [JobManagementController::class, 'showJobDetail'])->name('show.job.detail');



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

    // subscription management
    Route::get('subscription_management', [AdminSubscriptionController::class, 'index'])->name('admin.subscription.management');
    Route::put('subscription_management/{subscription}', [AdminSubscriptionController::class, 'update'])->name('admin.subscriptions.update');

});



// =======employer========
Route::middleware(['auth', 'role:employer'])->group(function () {
    Route::get('/employer_profile', [EmployerController::class, 'index'])->name('admin.employer.profile');
    Route::put('/employer_profile', [EmployerController::class, 'update'])->name('admin.employer.profile.update');
    Route::get('/show_employer_profile', [EmployerController::class, 'show'])->name('admin.employer.profile.show');
    Route::put('/application/{id}/status', [JobController::class, 'updateApplicationStatus'])->name('application.update.status');
    Route::get('/job_seeker_profile/{slug}',[JobController::class,'jobSeekerProfile'])->name('job.seeker.profile');
    Route::resources([
        'job' => JobController::class,
    ]);
    Route::patch('/job/{job}/toggle-status', [JobController::class, 'toggleStatus'])->name('admin.job.toggle-status');
    Route::get('/expired_jobs',[JobController::class,'expiredJobs'])->name('admin.expired.jobs');

    Route::get('new_applicants',[ApplicantController::class,'newApplicants'])->name('admin.new.applicants');
    Route::get('selected_applicants',[ApplicantController::class,'selectedApplicants'])->name('admin.selected.applicants');
    Route::get('rejected_applicants',[ApplicantController::class,'rejectedApplicants'])->name('admin.rejected.applicants');
    Route::get('all_applicants',[ApplicantController::class,'allApplicants'])->name('admin.all.applicants');
    Route::get('shortlisted_applicants',[ApplicantController::class,'shortlistedApplicants'])->name('admin.shortlisted.applicants');

    // subscription
    Route::get('/employer_subscription',[SubscriptionController::class,'index'])->name('employer.subscription');
    Route::post('/employer_subscription',[SubscriptionController::class,'store'])->name('employer.subscriptions.store');

});



// ========chatting===========
Route::get('/chat/{id}', [ChatController::class, 'chat'])->name('chat');
Route::post('/send-message', [ChatController::class, 'store'])->name('chat.send');
Route::get('/messenger', [ChatController::class, 'messenger'])->name('messenger');
Route::get('/fetch-latest-notification', [ChatController::class, 'fetchLatestNotification']);
