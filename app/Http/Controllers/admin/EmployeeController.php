<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmployeeBasicInformation;
use App\Http\Requests\UpdateEmployeeJobPreferences;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Employee;
use App\Models\EmployeeAvailability;
use App\Models\EmployeeExperience;
use App\Models\EmployeeLanguage;
use App\Models\EmployeeSkill;
use App\Models\EmployeeSocialAccount;
use App\Models\EmployeeSpecialization;
use App\Models\EmployeeTraining;
use App\Models\JobCategory;
use App\Models\JobPreferenceLocation;
use App\Models\JobTitle;
use App\Models\OrganizationNature;
use App\Models\PreferredIndustry;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            // Retrieve the current employee's job categories
            $employee = Employee::where('user_id', Auth::user()->id)->first();

            // Retrieve all job categories
            $job_categories = JobCategory::where('status', 'active')->orderBy('category', 'asc')->get();

            // Get the employee's current job categories (this is a many-to-many relationship)
            $selected_job_categories = $employee ? $employee->jobCategories->pluck('id')->toArray() : [];

            // Retrieve all preferred industries
            $preferred_industries = PreferredIndustry::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current preferred industries (this is a many-to-many relationship)
            $selected_industries = $employee ? $employee->preferredIndustries->pluck('id')->toArray() : [];

            // Retrieve all active job titles
            $preferred_job_title = JobTitle::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current preferred job titles (many-to-many relationship)
            $selected_job_titles = $employee ? $employee->preferredJobTitles->pluck('id')->toArray() : [];

            // Retrieve all active availabilities
            $employee_availabilities = EmployeeAvailability::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current availabilities (many-to-many relationship)
            $selected_availabilities = $employee ? $employee->availabilities->pluck('id')->toArray() : [];

            // Retrieve all active specializations
            $employee_specialization = EmployeeSpecialization::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current specializations (many-to-many relationship)
            $selected_specializations = $employee ? $employee->employeeSpecializations->pluck('id')->toArray() : [];

            // Retrieve all active skills
            $employee_skills = EmployeeSkill::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current skills (many-to-many relationship)
            $selected_skills = $employee ? $employee->skills->pluck('id')->toArray() : [];

            // Retrieve all active job preference locations
            $job_preference_location = JobPreferenceLocation::where('status', 'active')->orderBy('name', 'asc')->get();

            // Get the employee's current job locations (many-to-many relationship)
            $selected_locations = $employee ? $employee->jobPreferenceLocations->pluck('id')->toArray() : [];

            // get all the religions
            $religions = Religion::where('status', 'active')->orderBy('name', 'asc')->get();

            // get all the degrees
            $degrees = Degree::where('status', 'active')->orderBy('name', 'asc')->get();

            // get all employee training
            $employee_trainings = EmployeeTraining::where('employee_id', optional($employee)->id)->get();

            // get all nature of organization
            $organization_natures = OrganizationNature::where('status', 'active')->orderBy('name', 'asc')->get();

            // get employee experience
            $employee_experiences = EmployeeExperience::with('OrganizationNature', 'JobCategory')->where('employee_id', optional($employee)->id)->get();

            // get employee language
            $employee_languages = EmployeeLanguage::where('employee_id', optional($employee)->id)->get();

            // get employee social account
            $employee_social_accounts = EmployeeSocialAccount::where('employee_id', optional($employee)->id)->get();


            return view('admin.employee_profile.index', compact(
                'employee',
                'job_categories',
                'selected_job_categories',
                'preferred_industries',
                'selected_industries',
                'preferred_job_title',
                'selected_job_titles',
                'employee_availabilities',
                'selected_availabilities',
                'employee_specialization',
                'selected_specializations',
                'employee_skills',
                'selected_skills',
                'job_preference_location',
                'selected_locations',
                'religions',
                'degrees',
                'employee_trainings',
                'organization_natures',
                'employee_experiences',
                'employee_languages',
                'employee_social_accounts'
            ));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    // update employee job preferences
    public function updateJobPreferences(UpdateEmployeeJobPreferences $request)
    {
        try {
            // Find or create an Employee record based on the authenticated user
            $employee = Employee::updateOrCreate(
                ['user_id' => Auth::user()->id], // Condition to check if the record exists
                [
                    'user_id' => Auth::user()->id,
                    'job_level' => $request->job_level,
                    'expected_salary_currency' => $request->expected_salary_currency,
                    'expected_salary_operator' => $request->expected_salary_operator,
                    'expected_salary' => $request->expected_salary,
                    'expected_salary_unit' => $request->expected_salary_unit,
                    'current_salary_currency' => $request->current_salary_currency,
                    'current_salary_operator' => $request->current_salary_operator,
                    'current_salary' => $request->current_salary,
                    'current_salary_unit' => $request->current_salary_unit,
                    'career_objective_summary' => $request->career_objective_summary
                ]
            );

            // Sync relationships (many-to-many)
            $employee->jobCategories()->sync($request->job_categories ?? []);
            $employee->preferredIndustries()->sync($request->industries ?? []);
            $employee->preferredJobTitles()->sync($request->preferred_job_title ?? []);
            $employee->availabilities()->sync($request->available_for ?? []);
            $employee->employeeSpecializations()->sync($request->specializations ?? []);
            $employee->skills()->sync($request->skills ?? []);
            $employee->jobPreferenceLocations()->sync($request->job_location ?? []);

            return back()->with('success', 'Employee profile updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // update employee basic information
    public function updateBasicInformation(UpdateEmployeeBasicInformation $request)
    {
        try {
            // Get the authenticated user
            $user = Auth::user();

            // Handle resume upload if provided
            $pathName = null;
            if ($request->hasFile('resume')) {
                // Find the employee record
                $employee = Employee::where('user_id', $user->id)->first();

                // Delete existing resume if it exists
                if ($employee && $employee->resume) {
                    Storage::disk('public')->delete($employee->resume);
                }

                // Store the new resume in the 'resumes' folder inside 'storage/app/public'
                $pathName = $request->file('resume')->store('resumes', 'public');
            }

            // Update user name
            $user->update([
                'name' => $request->name
            ]);

            // Update or create the Employee record
            Employee::updateOrCreate(
                ['user_id' => $user->id], // Condition to check if the record exists
                [
                    'user_id' => $user->id,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->dob,
                    'marital_status' => $request->marital_status,
                    'religion_id' => $request->religion,
                    'is_disabled' => $request->has('is_disabled'),
                    'nationality' => $request->nationality,
                    'resume' => $pathName, // Store the path of the uploaded file
                    'current_address' => $request->current_address,
                    'permanent_address' => $request->permanent_address,
                    'contact_number' => $request->contact_number,
                ]
            );

            return back()->with('success', 'Information updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // update employee education
    public function updateEducation(Request $request)
    {
        try {
            // Get the authenticated user
            $user = Auth::user();

            // Update or create the Employee record
            Employee::updateOrCreate(
                ['user_id' => $user->id], // Condition to check if the record exists
                [
                    'user_id' => $user->id,
                    'degree_id' => $request->degree,
                    'course_id' => $request->course,
                    'board_or_university' => $request->board_or_university,
                    'school_or_college_or_institute' => $request->school_or_college_or_institute,
                    'is_currently_studying' => $request->is_currently_studying == 'on' ? true : false,
                    'grade_type' => $request->is_currently_studying != 'on' ? $request->grade_type : null,
                    'mark_secured' => $request->is_currently_studying != 'on' ? $request->mark_secured : null,
                    'graduation_year' => $request->is_currently_studying != 'on' ? $request->graduation_year : null,
                    'graduation_month' => $request->is_currently_studying != 'on' ? $request->graduation_month : null,
                    'education_started_year' => $request->is_currently_studying == 'on' ? $request->education_started_year : null,
                    'education_started_month' => $request->is_currently_studying == 'on' ? $request->education_started_month : null
                ]
            );
            return back()->with('success', 'Information updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // update employee training
    public function updateTraining(Request $request)
    {
        try {
            $employee = Employee::firstOrCreate(['user_id' => Auth::user()->id]);

            // Process each training entry
            foreach ($request->training_name as $index => $trainingName) {
                if (empty($trainingName) || empty($request->institution_name[$index])) {
                    continue;
                }

                // If delete checkbox is checked, remove the record
                if (!empty($request->input("form-{$index}-DELETE"))) {
                    EmployeeTraining::where([
                        'employee_id' => $employee->id,
                        'training_name' => $trainingName
                    ])->delete();
                    continue;
                }

                // Update or Insert Training
                EmployeeTraining::updateOrCreate(
                    [
                        'employee_id' => $employee->id,
                        'training_name' => $trainingName,
                    ],
                    [
                        'institution_name' => $request->institution_name[$index],
                        'training_duration' => $request->training_duration[$index],
                        'training_duration_operator' => $request->training_duration_operator[$index],
                        'training_completion_date' => $request->training_completion_date[$index],
                    ]
                );
            }

            return back()->with('success', 'Training information updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // update employee experience
    public function updateExperience(Request $request)
    {
        try {
            $employee = Employee::firstOrCreate(
                ['user_id' => Auth::user()->id],
                ['user_id' => Auth::user()->id]
            );
            $employeeId = $employee->id;
    
            // Step 1: Delete all existing experiences for this employee
            EmployeeExperience::where('employee_id', $employeeId)->delete();
    
            // Step 2: Insert new experiences from the request
            foreach ($request->organization_name as $index => $organizationName) {
                // Skip if required fields are empty
                if (empty($organizationName) || 
                    empty($request->job_location[$index]) || 
                    empty($request->job_title[$index])) {
                    continue;
                }
    
                $data = [
                    'employee_id' => $employeeId,
                    'organization_name' => $organizationName,
                    'job_location' => $request->job_location[$index],
                    'job_title' => $request->job_title[$index],
                    'job_level' => $request->job_level[$index],
                    'started_date' => $request->started_date[$index],
                    'end_date' => $request->is_currently_working[$index] ? null : ($request->end_date[$index] ?? null),
                    'duties_and_responsibilities' => $request->duties_and_responsibilities[$index],
                    'is_currently_working' => isset($request->is_currently_working[$index]) ? true : false,
                    'organization_nature_id' => (int) $request->nature_of_organization[$index],
                    'job_category_id' => (int) $request->job_category[$index],
                ];
    
                // Create a new experience record
                EmployeeExperience::create($data);
            }
    
            return back()->with('success', 'Experience information updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    // update employee language
    public function updateLanguage(Request $request)
    {
        try {
            // Get the logged-in employee, create if not exists
            $employee = Employee::firstOrCreate(['user_id' => Auth::id()]);

            // Validate request
            $request->validate([
                'language' => 'required|array',
                'language.*' => 'required|string|max:255',
                'reading' => 'required|array',
                'reading.*' => 'required|string|in:very_poor,poor,average,good,very_good',
                'writing' => 'required|array',
                'writing.*' => 'required|string|in:very_poor,poor,average,good,very_good',
                'speaking' => 'required|array',
                'speaking.*' => 'required|string|in:very_poor,poor,average,good,very_good',
                'listening' => 'required|array',
                'listening.*' => 'required|string|in:very_poor,poor,average,good,very_good',
            ]);

            // Delete existing language records for the employee if they exist
            EmployeeLanguage::where('employee_id', $employee->id)->delete();

            // Prepare data for insertion
            $languages = [];
            foreach ($request->language as $key => $lang) {
                $languages[] = [
                    'employee_id' => $employee->id,
                    'language' => $lang,
                    'reading' => $request->reading[$key],
                    'writing' => $request->writing[$key],
                    'speaking' => $request->speaking[$key],
                    'listening' => $request->listening[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert new language records
            EmployeeLanguage::insert($languages);

            return back()->with('success', 'Languages updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    // update social accounts
    public function updateSocialAccount(Request $request)
    {
        try {
            // Get the logged-in employee, create if not exists
            $employee = Employee::firstOrCreate(['user_id' => Auth::id()]);

            // Validate request
            $request->validate([
                'account_name' => 'required|array',
                'account_name.*' => 'required|string|max:255',
                'account_url' => 'required|array',
                'account_url.*' => 'required|url|max:255', // Ensuring it's a valid URL
            ]);

            // Delete existing social accounts for the employee
            EmployeeSocialAccount::where('employee_id', $employee->id)->delete();

            // Prepare data for insertion
            $accounts = [];
            foreach ($request->account_name as $key => $name) {
                $accounts[] = [
                    'employee_id' => $employee->id,
                    'account_name' => $name,
                    'account_url' => $request->account_url[$key],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert new social accounts
            EmployeeSocialAccount::insert($accounts);

            return back()->with('success', 'Social accounts updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    // update other information
    public function updateOtherInformation(Request $request)
    {
        try {
            // Get the logged-in employee, create if not exists
            Employee::updateOrCreate(
                ['user_id' => Auth::user()->id], // Condition to check if the record exists
                [
                    'willing_to_travel' => $request->has('willing_to_travel') ? true : false,
                    'willing_to_relocate' => $request->has('willing_to_relocate') ? true : false,
                    'two_wheeler_license' => $request->has('two_wheeler_license') ? true : false,
                    'four_wheeler_license' => $request->has('four_wheeler_license') ? true : false,
                    'own_two_wheeler' => $request->has('own_two_wheeler') ? true : false,
                    'own_four_wheeler' => $request->has('own_four_wheeler') ? true : false,
                ]
            );
            return back()->with('success', 'Other information updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }





    // fetch course
    public function fetchCourse($degree_id)
    {
        $courses = Course::where('degree_id', $degree_id)->where('status', 'active')->orderBy('name', 'asc')->get();
        return response()->json($courses);
    }
}
