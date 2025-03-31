<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateEmployeeBasicInformation;
use App\Http\Requests\UpdateEmployeeJobPreferences;
use App\Models\Country;
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
use App\Models\InterestedJob;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobPreferenceLocation;
use App\Models\JobTitle;
use App\Models\OrganizationNature;
use App\Models\PreferredIndustry;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

            // get all the countries
            $countries = Country::orderBy('name', 'asc')->get();


            return view('backend.jobseeker_dashboard.pages.profile.edit', compact(
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
                'employee_social_accounts',
                'countries'
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
            $employee = Employee::where('user_id', $user->id)->first();

            // Handle resume upload if provided
            if ($request->hasFile('resume')) {
                if ($employee && $employee->resume) {
                    Storage::disk('public')->delete($employee->resume);
                }
                $resumePath = $request->file('resume')->store('resumes', 'public');
            } else {
                $resumePath = $employee->resume ?? null;
            }

            // Handle profile upload if provided
            if ($request->hasFile('profile')) {
                if ($employee && $employee->profile) {
                    Storage::disk('public')->delete($employee->profile);
                }
                $profilePath = $request->file('profile')->store('profiles', 'public');
            } else {
                $profilePath = $employee->profile ?? null;
            }

            // Update user name
            $user->update([
                'name' => $request->name
            ]);

            // Update or create the Employee record
            Employee::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'gender' => $request->gender,
                    'date_of_birth' => $request->dob,
                    'marital_status' => $request->marital_status,
                    'religion_id' => $request->religion,
                    'is_disabled' => $request->has('is_disabled'),
                    'country' => $request->country,
                    'resume' => $resumePath,
                    'profile' => $profilePath,
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
                if (
                    empty($organizationName) ||
                    empty($request->job_location[$index]) ||
                    empty($request->job_title[$index])
                ) {
                    continue;
                }

                $data = [
                    'employee_id' => $employeeId,
                    'organization_name' => $organizationName,
                    'job_location' => $request->job_location[$index],
                    'job_title' => $request->job_title[$index],
                    'job_level' => $request->job_level[$index],
                    'started_date' => $request->started_date[$index],
                    'end_date' => $request->is_currently_working ? null : ($request->end_date[$index] ?? null),
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
                'reading.*' => 'required|string',
                'writing' => 'required|array',
                'writing.*' => 'required|string',
                'speaking' => 'required|array',
                'speaking.*' => 'required|string',
                'listening' => 'required|array',
                'listening.*' => 'required|string',
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


    // show profile
    public function show()
    {
        try {
            $employee = Employee::where('user_id', Auth::id())
                ->with([
                    'jobCategories',
                    'preferredIndustries',
                    'preferredJobTitles',
                    'availabilities',
                    'employeeSpecializations',
                    'skills',
                    'jobPreferenceLocations',
                    'trainings',
                    'experiences',
                    'languages',
                    'socialAccounts'
                ])->firstOrFail();


            return view('backend.jobseeker_dashboard.pages.profile.profile', compact('employee'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // job applied
    public function jobApplied(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = auth()->user();
                $applications = JobApplication::with('job.user')
                    ->join('jobs', 'job_applications.job_id', '=', 'jobs.id') // Join jobs table
                    ->where('job_applications.user_id', $user->id)
                    ->select('job_applications.*'); // Select only job_applications columns to avoid ambiguity

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('job_title', function ($application) {
                        return $application->job->job_title ?? 'N/A';
                    })
                    ->addColumn('company_name', function ($application) {
                        return $application->job->user->name ?? 'N/A';
                    })
                    ->addColumn('category', function ($application) {
                        return $application->job->category ? $application->job->category->category : 'N/A';
                    })
                    ->addColumn('job_level', function ($application) {
                        return $application->job->job_level ?? 'N/A';
                    })
                    ->addColumn('employment_type', function ($application) {
                        return $application->job->employment_type ?? 'N/A';
                    })
                    ->addColumn('vacancies', function ($application) {
                        return $application->job->no_of_vacancy ?? 'N/A';
                    })
                    ->addColumn('location', function ($application) {
                        return $application->job->job_country . ', ' . $application->job->job_location;
                    })
                    ->addColumn('salary', function ($application) {
                        return $application->job->is_negotiable ? 'Negotiable' : ($application->job->offered_salary ?? 'Not Specified');
                    })
                    ->addColumn('posted_at', function ($application) {
                        return $application->job->posted_at ? $application->job->posted_at->format('M d, Y') : 'N/A';
                    })
                    ->addColumn('deadline', function ($application) {
                        return $application->job->expiry_date ? $application->job->expiry_date->format('M d, Y') : 'N/A';
                    })
                    ->addColumn('applied_at', function ($application) {
                        return $application->applied_at->format('M d, Y H:i');
                    })
                    ->addColumn('status', function ($application) {
                        $badgeClass = match ($application->status) {
                            'selected' => 'bg-success',
                            'rejected' => 'bg-danger',
                            'reviewed' => 'bg-info',
                            'shortlisted' => 'bg-primary',
                            default => 'bg-warning',
                        };
                        return '<span class="badge ' . $badgeClass . '">' . ucfirst($application->status) . '</span>';
                    })
                    ->addColumn('cover_letter', function ($application) {
                        return $application->cover_letter ? Str::limit($application->cover_letter, 50) : 'N/A';
                    })
                    ->rawColumns(['status'])
                    ->filterColumn('job_title', function ($query, $keyword) {
                        $query->where('jobs.job_title', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('company_name', function ($query, $keyword) {
                        $query->whereHas('job.user', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('job.category', function ($q) use ($keyword) {
                            $q->where('category', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('job_level', function ($query, $keyword) {
                        $query->where('jobs.job_level', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('employment_type', function ($query, $keyword) {
                        $query->where('jobs.employment_type', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('vacancies', function ($query, $keyword) {
                        $query->where('jobs.no_of_vacancy', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('location', function ($query, $keyword) {
                        $query->whereRaw("CONCAT(jobs.job_country, ', ', jobs.job_location) LIKE ?", ["%{$keyword}%"]);
                    })
                    ->filterColumn('salary', function ($query, $keyword) {
                        $query->where(function ($q) use ($keyword) {
                            $q->where('jobs.is_negotiable', 'like', "%{$keyword}%")
                                ->orWhere('jobs.offered_salary', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('posted_at', function ($query, $keyword) {
                        $query->where('jobs.posted_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('deadline', function ($query, $keyword) {
                        $query->where('jobs.expiry_date', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('applied_at', function ($query, $keyword) {
                        $query->where('job_applications.applied_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('status', function ($query, $keyword) {
                        $query->where('job_applications.status', 'like', "%{$keyword}%");
                    })
                    ->make(true);
            }

            return view('backend.jobseeker_dashboard.pages.jobsearch_application.jobapplied');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // interested jobs
    public function interestedJobs(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = auth()->user();
                $interestedJobs = InterestedJob::with('job.user.employer')
                    ->join('jobs', 'interested_jobs.job_id', '=', 'jobs.id') // Join jobs table
                    ->where('interested_jobs.user_id', $user->id)
                    ->select('interested_jobs.*'); // Avoid column ambiguity

                return DataTables::of($interestedJobs)
                    ->addIndexColumn()
                    ->addColumn('job_title', function ($interestedJob) {
                        return $interestedJob->job->job_title ?? 'N/A';
                    })
                    ->addColumn('company_name', function ($interestedJob) {
                        return $interestedJob->job->user->name ?? 'N/A';
                    })
                    ->addColumn('company_logo', function ($interestedJob) {
                        $logo = $interestedJob->job->user->employer && $interestedJob->job->user->employer->company_logo
                            ? asset('storage/' . $interestedJob->job->user->employer->company_logo)
                            : asset('backend/img/jobs/techskill.jpeg');
                        return '<img src="' . $logo . '" style="width: 50px; height: 50px;" class="rounded-circle" alt="Company Logo">';
                    })
                    ->addColumn('category', function ($interestedJob) {
                        return $interestedJob->job->category ? $interestedJob->job->category->category : 'N/A';
                    })
                    ->addColumn('job_level', function ($interestedJob) {
                        return $interestedJob->job->job_level ?? 'N/A';
                    })
                    ->addColumn('employment_type', function ($interestedJob) {
                        return $interestedJob->job->employment_type ?? 'N/A';
                    })
                    ->addColumn('vacancies', function ($interestedJob) {
                        return $interestedJob->job->no_of_vacancy ?? 'N/A';
                    })
                    ->addColumn('location', function ($interestedJob) {
                        return $interestedJob->job->job_country . ', ' . $interestedJob->job->job_location;
                    })
                    ->addColumn('salary', function ($interestedJob) {
                        return $interestedJob->job->is_negotiable ? 'Negotiable' : ($interestedJob->job->offered_salary ?? 'Not Specified');
                    })
                    ->addColumn('posted_at', function ($interestedJob) {
                        return $interestedJob->job->posted_at instanceof \Carbon\Carbon
                            ? $interestedJob->job->posted_at->format('M d, Y')
                            : ($interestedJob->job->posted_at ? Carbon::parse($interestedJob->job->posted_at)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('deadline', function ($interestedJob) {
                        return $interestedJob->job->expiry_date instanceof \Carbon\Carbon
                            ? $interestedJob->job->expiry_date->format('M d, Y')
                            : ($interestedJob->job->expiry_date ? Carbon::parse($interestedJob->job->expiry_date)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('interested_at', function ($interestedJob) {
                        return $interestedJob->interested_at instanceof \Carbon\Carbon
                            ? $interestedJob->interested_at->format('M d, Y H:i')
                            : ($interestedJob->interested_at ? Carbon::parse($interestedJob->interested_at)->format('M d, Y H:i') : 'N/A');
                    })
                    ->addColumn('action', function ($interestedJob) {
                        $isExpired = $interestedJob->job->expiry_date && ($interestedJob->job->expiry_date instanceof \Carbon\Carbon
                            ? $interestedJob->job->expiry_date->isPast()
                            : Carbon::parse($interestedJob->job->expiry_date)->isPast());
                        $hasApplied = $interestedJob->job->applications()->where('user_id', auth()->id())->exists();

                        if ($isExpired) {
                            return '<span class="badge bg-danger">Job Expired</span>';
                        } elseif ($hasApplied) {
                            return '<span class="badge bg-success">Already Applied</span>';
                        } else {
                            return '<button class="btn btn-sm btn-primary apply-now-btn" data-slug="' . $interestedJob->job->slug . '">Apply Now</button>';
                        }
                    })
                    ->rawColumns(['company_logo', 'action'])
                    ->filterColumn('job_title', function ($query, $keyword) {
                        $query->where('jobs.job_title', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('company_name', function ($query, $keyword) {
                        $query->whereHas('job.user', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('job.category', function ($q) use ($keyword) {
                            $q->where('category', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('job_level', function ($query, $keyword) {
                        $query->where('jobs.job_level', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('employment_type', function ($query, $keyword) {
                        $query->where('jobs.employment_type', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('vacancies', function ($query, $keyword) {
                        $query->where('jobs.no_of_vacancy', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('location', function ($query, $keyword) {
                        $query->whereRaw("CONCAT(jobs.job_country, ', ', jobs.job_location) LIKE ?", ["%{$keyword}%"]);
                    })
                    ->filterColumn('salary', function ($query, $keyword) {
                        $query->where(function ($q) use ($keyword) {
                            $q->where('jobs.is_negotiable', 'like', "%{$keyword}%")
                                ->orWhere('jobs.offered_salary', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('posted_at', function ($query, $keyword) {
                        $query->where('jobs.posted_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('deadline', function ($query, $keyword) {
                        $query->where('jobs.expiry_date', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('interested_at', function ($query, $keyword) {
                        $query->where('interested_jobs.interested_at', 'like', "%{$keyword}%");
                    })
                    ->make(true);
            }

            return view('backend.jobseeker_dashboard.pages.jobsearch_application.jobintrested');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // rejected jobs
    public function rejectedJobs(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = auth()->user();
                $rejectedJobs = JobApplication::with('job.user.employer')
                    ->join('jobs', 'job_applications.job_id', '=', 'jobs.id') // Join jobs table
                    ->where('job_applications.user_id', $user->id)
                    ->where('job_applications.status', 'rejected') // Filter for rejected status
                    ->select('job_applications.*'); // Avoid column ambiguity

                return DataTables::of($rejectedJobs)
                    ->addIndexColumn()
                    ->addColumn('job_title', function ($application) {
                        return $application->job->job_title ?? 'N/A';
                    })
                    ->addColumn('company_name', function ($application) {
                        return $application->job->user->name ?? 'N/A';
                    })
                    ->addColumn('company_logo', function ($application) {
                        $logo = $application->job->user->employer && $application->job->user->employer->company_logo
                            ? asset('storage/' . $application->job->user->employer->company_logo)
                            : asset('backend/img/jobs/techskill.jpeg');
                        return '<img src="' . $logo . '" style="width: 50px; height: 50px;" class="rounded-circle" alt="Company Logo">';
                    })
                    ->addColumn('category', function ($application) {
                        return $application->job->category ? $application->job->category->category : 'N/A';
                    })
                    ->addColumn('job_level', function ($application) {
                        return $application->job->job_level ?? 'N/A';
                    })
                    ->addColumn('employment_type', function ($application) {
                        return $application->job->employment_type ?? 'N/A';
                    })
                    ->addColumn('vacancies', function ($application) {
                        return $application->job->no_of_vacancy ?? 'N/A';
                    })
                    ->addColumn('location', function ($application) {
                        return $application->job->job_country . ', ' . $application->job->job_location;
                    })
                    ->addColumn('salary', function ($application) {
                        return $application->job->is_negotiable ? 'Negotiable' : ($application->job->offered_salary ?? 'Not Specified');
                    })
                    ->addColumn('posted_at', function ($application) {
                        return $application->job->posted_at instanceof \Carbon\Carbon
                            ? $application->job->posted_at->format('M d, Y')
                            : ($application->job->posted_at ? Carbon::parse($application->job->posted_at)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('deadline', function ($application) {
                        return $application->job->expiry_date instanceof \Carbon\Carbon
                            ? $application->job->expiry_date->format('M d, Y')
                            : ($application->job->expiry_date ? Carbon::parse($application->job->expiry_date)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('applied_at', function ($application) {
                        return $application->applied_at instanceof \Carbon\Carbon
                            ? $application->applied_at->format('M d, Y H:i')
                            : ($application->applied_at ? Carbon::parse($application->applied_at)->format('M d, Y H:i') : 'N/A');
                    })
                    ->addColumn('status', function ($application) {
                        return '<span class="badge bg-danger">Rejected</span>';
                    })
                    ->addColumn('cover_letter', function ($application) {
                        return $application->cover_letter ? Str::limit($application->cover_letter, 50) : 'N/A';
                    })
                    ->rawColumns(['company_logo', 'status'])
                    ->filterColumn('job_title', function ($query, $keyword) {
                        $query->where('jobs.job_title', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('company_name', function ($query, $keyword) {
                        $query->whereHas('job.user', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('job.category', function ($q) use ($keyword) {
                            $q->where('category', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('job_level', function ($query, $keyword) {
                        $query->where('jobs.job_level', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('employment_type', function ($query, $keyword) {
                        $query->where('jobs.employment_type', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('vacancies', function ($query, $keyword) {
                        $query->where('jobs.no_of_vacancy', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('location', function ($query, $keyword) {
                        $query->whereRaw("CONCAT(jobs.job_country, ', ', jobs.job_location) LIKE ?", ["%{$keyword}%"]);
                    })
                    ->filterColumn('salary', function ($query, $keyword) {
                        $query->where(function ($q) use ($keyword) {
                            $q->where('jobs.is_negotiable', 'like', "%{$keyword}%")
                                ->orWhere('jobs.offered_salary', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('posted_at', function ($query, $keyword) {
                        $query->where('jobs.posted_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('deadline', function ($query, $keyword) {
                        $query->where('jobs.expiry_date', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('applied_at', function ($query, $keyword) {
                        $query->where('job_applications.applied_at', 'like', "%{$keyword}%");
                    })
                    ->make(true);
            }

            return view('backend.jobseeker_dashboard.pages.jobsearch_application.rejected');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // manage jobs
    public function manageJob()
    {
        try {
            return view('backend.jobseeker_dashboard.pages.jobsearch_application.managejob');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // shortlisted
    public function shortListed(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = auth()->user();
                $shortlistedJobs = JobApplication::with('job.user.employer')
                    ->join('jobs', 'job_applications.job_id', '=', 'jobs.id') // Join jobs table
                    ->where('job_applications.user_id', $user->id)
                    ->where('job_applications.status', 'shortlisted') // Filter for shortlisted status
                    ->select('job_applications.*'); // Avoid column ambiguity

                return DataTables::of($shortlistedJobs)
                    ->addIndexColumn()
                    ->addColumn('job_title', function ($application) {
                        return $application->job->job_title ?? 'N/A';
                    })
                    ->addColumn('company_name', function ($application) {
                        return $application->job->user->name ?? 'N/A';
                    })
                    ->addColumn('company_logo', function ($application) {
                        $logo = $application->job->user->employer && $application->job->user->employer->company_logo
                            ? asset('storage/' . $application->job->user->employer->company_logo)
                            : asset('backend/img/jobs/techskill.jpeg');
                        return '<img src="' . $logo . '" style="width: 50px; height: 50px;" class="rounded-circle" alt="Company Logo">';
                    })
                    ->addColumn('category', function ($application) {
                        return $application->job->category ? $application->job->category->category : 'N/A';
                    })
                    ->addColumn('job_level', function ($application) {
                        return $application->job->job_level ?? 'N/A';
                    })
                    ->addColumn('employment_type', function ($application) {
                        return $application->job->employment_type ?? 'N/A';
                    })
                    ->addColumn('vacancies', function ($application) {
                        return $application->job->no_of_vacancy ?? 'N/A';
                    })
                    ->addColumn('location', function ($application) {
                        return $application->job->job_country . ', ' . $application->job->job_location;
                    })
                    ->addColumn('salary', function ($application) {
                        return $application->job->is_negotiable ? 'Negotiable' : ($application->job->offered_salary ?? 'Not Specified');
                    })
                    ->addColumn('posted_at', function ($application) {
                        return $application->job->posted_at instanceof \Carbon\Carbon
                            ? $application->job->posted_at->format('M d, Y')
                            : ($application->job->posted_at ? Carbon::parse($application->job->posted_at)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('deadline', function ($application) {
                        return $application->job->expiry_date instanceof \Carbon\Carbon
                            ? $application->job->expiry_date->format('M d, Y')
                            : ($application->job->expiry_date ? Carbon::parse($application->job->expiry_date)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('applied_at', function ($application) {
                        return $application->applied_at instanceof \Carbon\Carbon
                            ? $application->applied_at->format('M d, Y H:i')
                            : ($application->applied_at ? Carbon::parse($application->applied_at)->format('M d, Y H:i') : 'N/A');
                    })
                    ->addColumn('status', function ($application) {
                        return '<span class="badge bg-info">Shortlisted</span>';
                    })
                    ->rawColumns(['company_logo', 'status', 'resume'])
                    ->filterColumn('job_title', function ($query, $keyword) {
                        $query->where('jobs.job_title', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('company_name', function ($query, $keyword) {
                        $query->whereHas('job.user', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('job.category', function ($q) use ($keyword) {
                            $q->where('category', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('job_level', function ($query, $keyword) {
                        $query->where('jobs.job_level', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('employment_type', function ($query, $keyword) {
                        $query->where('jobs.employment_type', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('vacancies', function ($query, $keyword) {
                        $query->where('jobs.no_of_vacancy', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('location', function ($query, $keyword) {
                        $query->whereRaw("CONCAT(jobs.job_country, ', ', jobs.job_location) LIKE ?", ["%{$keyword}%"]);
                    })
                    ->filterColumn('salary', function ($query, $keyword) {
                        $query->where(function ($q) use ($keyword) {
                            $q->where('jobs.is_negotiable', 'like', "%{$keyword}%")
                                ->orWhere('jobs.offered_salary', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('posted_at', function ($query, $keyword) {
                        $query->where('jobs.posted_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('deadline', function ($query, $keyword) {
                        $query->where('jobs.expiry_date', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('applied_at', function ($query, $keyword) {
                        $query->where('job_applications.applied_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('cover_letter', function ($query, $keyword) {
                        $query->where('job_applications.cover_letter', 'like', "%{$keyword}%");
                    })
                    ->make(true);
            }

            return view('backend.jobseeker_dashboard.pages.application_interview.shortlisted');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // apply job
    public function apply(Request $request, $slug)
    {
        try {
            $job = Job::where('slug', $slug)->firstOrFail();

            // Check if the user is authenticated and has the 'employee' role
            if (!auth()->check() || !auth()->user()->hasRole('employee')) {
                return response()->json(['error' => 'You must be an employee to apply.'], 403);
            }

            // Check if the user has already applied
            $existingApplication = JobApplication::where('user_id', auth()->id())
                ->where('job_id', $job->id)
                ->exists();

            if ($existingApplication) {
                return response()->json(['error' => 'You have already applied to this job.'], 400);
            }

            // Create the application
            JobApplication::create([
                'user_id' => auth()->id(),
                'job_id' => $job->id,
                'status' => 'pending',
            ]);

            return response()->json(['message' => 'Application submitted successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // mark job as interested
    public function markInterested(Request $request, $slug)
    {
        try {
            $job = Job::where('slug', $slug)->firstOrFail();

            if (!auth()->check() || !auth()->user()->hasRole('employee')) {
                return response()->json(['error' => 'You must be an employee to mark interest.'], 403);
            }

            $existingInterest = InterestedJob::where('user_id', auth()->id())
                ->where('job_id', $job->id)
                ->exists();

            if ($existingInterest) {
                return response()->json(['error' => 'You have already marked this job as interested.'], 400);
            }

            InterestedJob::create([
                'user_id' => auth()->id(),
                'job_id' => $job->id,
            ]);

            return response()->json(['message' => 'Job marked as interested successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // selected
    public function selected(Request $request)
    {
        try {
            if ($request->ajax()) {
                $user = auth()->user();
                $shortlistedJobs = JobApplication::with('job.user.employer')
                    ->join('jobs', 'job_applications.job_id', '=', 'jobs.id') // Join jobs table
                    ->where('job_applications.user_id', $user->id)
                    ->where('job_applications.status', 'selected') // Filter for selected status
                    ->select('job_applications.*'); // Avoid column ambiguity

                return DataTables::of($shortlistedJobs)
                    ->addIndexColumn()
                    ->addColumn('job_title', function ($application) {
                        return $application->job->job_title ?? 'N/A';
                    })
                    ->addColumn('company_name', function ($application) {
                        return $application->job->user->name ?? 'N/A';
                    })
                    ->addColumn('company_logo', function ($application) {
                        $logo = $application->job->user->employer && $application->job->user->employer->company_logo
                            ? asset('storage/' . $application->job->user->employer->company_logo)
                            : asset('backend/img/jobs/techskill.jpeg');
                        return '<img src="' . $logo . '" style="width: 50px; height: 50px;" class="rounded-circle" alt="Company Logo">';
                    })
                    ->addColumn('category', function ($application) {
                        return $application->job->category ? $application->job->category->category : 'N/A';
                    })
                    ->addColumn('job_level', function ($application) {
                        return $application->job->job_level ?? 'N/A';
                    })
                    ->addColumn('employment_type', function ($application) {
                        return $application->job->employment_type ?? 'N/A';
                    })
                    ->addColumn('vacancies', function ($application) {
                        return $application->job->no_of_vacancy ?? 'N/A';
                    })
                    ->addColumn('location', function ($application) {
                        return $application->job->job_country . ', ' . $application->job->job_location;
                    })
                    ->addColumn('salary', function ($application) {
                        return $application->job->is_negotiable ? 'Negotiable' : ($application->job->offered_salary ?? 'Not Specified');
                    })
                    ->addColumn('posted_at', function ($application) {
                        return $application->job->posted_at instanceof \Carbon\Carbon
                            ? $application->job->posted_at->format('M d, Y')
                            : ($application->job->posted_at ? Carbon::parse($application->job->posted_at)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('deadline', function ($application) {
                        return $application->job->expiry_date instanceof \Carbon\Carbon
                            ? $application->job->expiry_date->format('M d, Y')
                            : ($application->job->expiry_date ? Carbon::parse($application->job->expiry_date)->format('M d, Y') : 'N/A');
                    })
                    ->addColumn('applied_at', function ($application) {
                        return $application->applied_at instanceof \Carbon\Carbon
                            ? $application->applied_at->format('M d, Y H:i')
                            : ($application->applied_at ? Carbon::parse($application->applied_at)->format('M d, Y H:i') : 'N/A');
                    })
                    ->addColumn('status', function ($application) {
                        return '<span class="badge bg-success">Selected</span>';
                    })
                    ->rawColumns(['company_logo', 'status', 'resume'])
                    ->filterColumn('job_title', function ($query, $keyword) {
                        $query->where('jobs.job_title', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('company_name', function ($query, $keyword) {
                        $query->whereHas('job.user', function ($q) use ($keyword) {
                            $q->where('name', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('category', function ($query, $keyword) {
                        $query->whereHas('job.category', function ($q) use ($keyword) {
                            $q->where('category', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('job_level', function ($query, $keyword) {
                        $query->where('jobs.job_level', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('employment_type', function ($query, $keyword) {
                        $query->where('jobs.employment_type', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('vacancies', function ($query, $keyword) {
                        $query->where('jobs.no_of_vacancy', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('location', function ($query, $keyword) {
                        $query->whereRaw("CONCAT(jobs.job_country, ', ', jobs.job_location) LIKE ?", ["%{$keyword}%"]);
                    })
                    ->filterColumn('salary', function ($query, $keyword) {
                        $query->where(function ($q) use ($keyword) {
                            $q->where('jobs.is_negotiable', 'like', "%{$keyword}%")
                                ->orWhere('jobs.offered_salary', 'like', "%{$keyword}%");
                        });
                    })
                    ->filterColumn('posted_at', function ($query, $keyword) {
                        $query->where('jobs.posted_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('deadline', function ($query, $keyword) {
                        $query->where('jobs.expiry_date', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('applied_at', function ($query, $keyword) {
                        $query->where('job_applications.applied_at', 'like', "%{$keyword}%");
                    })
                    ->filterColumn('cover_letter', function ($query, $keyword) {
                        $query->where('job_applications.cover_letter', 'like', "%{$keyword}%");
                    })
                    ->make(true);
            }

            return view('backend.jobseeker_dashboard.pages.application_interview.selected');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    // get search status
    public function getSearchStatus(Request $request)
    {
        try {
            $user = auth()->user();
            return response()->json([
                'success' => true,
                'is_actively_searching' => (bool) $user->is_actively_searching, // Ensure boolean
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    // toggle job searching
    public function toggleSearching(Request $request)
    {
        try {
            $user = auth()->user();
            $isActivelySearching = $request->input('is_actively_searching', false);
            $user->is_actively_searching = filter_var($isActivelySearching, FILTER_VALIDATE_BOOLEAN);
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'Search status updated successfully!',
                'is_actively_searching' => $user->is_actively_searching,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
