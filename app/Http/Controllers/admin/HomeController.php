<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\InterestedJob;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            if ($user->hasRole('employee')) {
                $employeeCategories = $user->employee
                    ? $user->employee->jobCategories->pluck('id')->toArray()
                    : [];

                // Define the base jobs query
                $jobsQuery = Job::with(['user' => fn($query) => $query->with('employer'), 'category'])
                    ->where('status', 'active')
                    ->where('is_approved', 'approved')
                    ->latest();

                // Filter by employee’s categories if they exist
                if (!empty($employeeCategories)) {
                    $jobsQuery->whereIn('category_id', $employeeCategories);
                }

                // Add search filter if provided
                if ($search = $request->input('search')) {
                    $jobsQuery->where(function ($query) use ($search) {
                        $query->where('job_title', 'like', "%{$search}%")
                            ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
                            ->orWhereHas('category', fn($q) => $q->where('category', 'like', "%{$search}%"));
                    });
                }

                // Paginate and transform jobs
                $jobs = $jobsQuery->paginate(10)->through(function ($job) {
                    $job->hasApplied = JobApplication::where('user_id', Auth::id())
                        ->where('job_id', $job->id)
                        ->exists();
                    $job->isInterested = InterestedJob::where('user_id', Auth::id())
                        ->where('job_id', $job->id)
                        ->exists();
                    $job->company_logo_url = $job->user->employer && $job->user->employer->company_logo
                        ? asset('storage/' . $job->user->employer->company_logo)
                        : asset('backend/img/jobs/techskill.jpeg');
                    return $job;
                });

                // Handle AJAX request
                if ($request->ajax()) {
                    return response()->json([
                        'jobs' => $jobs->items(),
                        'next_page_url' => $jobs->nextPageUrl(),
                    ]);
                }

                // Get applied jobs and counts (unchanged)
                $applications = JobApplication::with('job')
                    ->where('user_id', $user->id)
                    ->latest('applied_at')
                    ->take(10)
                    ->get();

                $statusCounts = JobApplication::selectRaw(
                    "COUNT(*) as total_applied,
                     SUM(CASE WHEN status = 'shortlisted' THEN 1 ELSE 0 END) as total_shortlisted,
                     SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END) as total_rejected,
                     SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as total_pending"
                )
                    ->where('user_id', $user->id)
                    ->first();

                $totalApplied = $statusCounts->total_applied;
                $totalShortlisted = $statusCounts->total_shortlisted;
                $totalRejected = $statusCounts->total_rejected;
                $totalPending = $statusCounts->total_pending;

                return view('backend.jobseeker_dashboard.pages.profile.index', compact(
                    'jobs',
                    'applications',
                    'totalApplied',
                    'totalShortlisted',
                    'totalRejected',
                    'totalPending'
                ));
            } else if ($user->hasRole('employer')) {
                $employer = $user->employer;

                // Get employer’s job category IDs
                $employerCategoryIds = $employer->jobCategories->pluck('id')->toArray();

                // Base query for recommended employees
                $employeesQuery = Employee::with(['user', 'jobCategories'])
                    ->whereHas('jobCategories', function ($query) use ($employerCategoryIds) {
                        $query->whereIn('job_categories.id', $employerCategoryIds); // Match employer’s categories
                    })
                    ->join('users', 'employees.user_id', '=', 'users.id') // Join with users for name/email
                    ->select('employees.*', 'users.name', 'users.email');

                // Add search filter if provided
                if ($search = $request->input('search')) {
                    $employeesQuery->where(function ($query) use ($search) {
                        $query->where('users.name', 'like', "%{$search}%")
                            ->orWhere('users.email', 'like', "%{$search}%")
                            ->orWhere('employees.contact_number', 'like', "%{$search}%")
                            ->orWhereHas('jobCategories', fn($q) => $q->where('category', 'like', "%{$search}%"));
                    });
                }

                // Paginate employees
                $employees = $employeesQuery->paginate(10);

                // Handle AJAX request
                if ($request->ajax()) {
                    return response()->json([
                        'employees' => $employees->items(),
                        'next_page_url' => $employees->nextPageUrl(),
                    ]);
                }

                // Fetch applications for employer’s jobs (unchanged)
                $applications = JobApplication::with(['job', 'user'])
                    ->whereHas('job', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->latest('applied_at')
                    ->get();

                // Fetch application trend data (e.g., last 30 days)
                $applicationTrend = JobApplication::select(
                    DB::raw('DATE(applied_at) as date'),
                    DB::raw('COUNT(*) as count')
                )
                    ->whereHas('job', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->where('applied_at', '>=', now()->subDays(30)) // Last 30 days
                    ->groupBy('date')
                    ->orderBy('date', 'asc')
                    ->get()
                    ->pluck('count', 'date')
                    ->toArray();

                // Fetch application status distribution
                $applicationStatus = JobApplication::select(
                    DB::raw('status'),
                    DB::raw('COUNT(*) as count')
                )
                    ->whereHas('job', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->groupBy('status')
                    ->pluck('count', 'status')
                    ->toArray();

                // Ensure all statuses are present (default to 0 if no data)
                $statuses = ['pending', 'shortlisted', 'rejected', 'selected'];
                $applicationStatus = array_merge(
                    array_fill_keys($statuses, 0),
                    $applicationStatus
                );
                // Fetch employer stats
                $stats = [
                    'open_jobs' => Job::where('user_id', $user->id)
                        ->where('status', 'active')
                        ->where('is_approved', 'approved')
                        ->count(),
                    'total_applications' => JobApplication::whereHas('job', fn($q) => $q->where('user_id', $user->id))->count(),
                    'pending_reviews' => JobApplication::whereHas('job', fn($q) => $q->where('user_id', $user->id))
                        ->where('status', 'pending')
                        ->count(),
                ];

                return view('backend.employer_dashboard.pages.home', compact(
                    'employees',
                    'applications',
                    'applicationTrend',
                    'applicationStatus',
                    'stats'
                ));
            } else if (Auth::user()->hasRole('admin')) {
                return view('backend.main_dashboard.pages.home');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
