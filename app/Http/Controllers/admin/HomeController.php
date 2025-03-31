<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InterestedJob;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (Auth::user()->hasRole('employee')) {
                // =======get all the related jobs==========
                if ($request->ajax()) {
                    $jobs = Job::with('user', 'category', 'user.employer')
                        ->latest()
                        ->where('status', 'active')
                        ->where('is_approved', 'approved')
                        ->paginate(10)
                        ->through(function ($job) use ($request) {
                            $job->hasApplied = auth()->check() && JobApplication::where('user_id', auth()->id())
                                ->where('job_id', $job->id)
                                ->exists();
                            $job->isInterested = auth()->check() && InterestedJob::where('user_id', auth()->id())
                                ->where('job_id', $job->id)
                                ->exists();
                            $job->company_logo_url = $job->user->employer && $job->user->employer->company_logo
                                ? asset('storage/' . $job->user->employer->company_logo)
                                : asset('backend/img/jobs/techskill.jpeg');
                            return $job;
                        });
                    return response()->json([
                        'jobs' => $jobs->items(), // Current page items
                        'next_page_url' => $jobs->nextPageUrl(), // URL for the next page
                    ]);
                }

                $jobs = Job::with('user', 'category', 'user.employer')
                    ->latest()
                    ->where('status', 'active')
                    ->where('is_approved', 'approved')
                    ->paginate(10)
                    ->through(function ($job) use ($request) {
                        $job->hasApplied = auth()->check() && JobApplication::where('user_id', auth()->id())
                            ->where('job_id', $job->id)
                            ->exists();
                        $job->isInterested = auth()->check() && InterestedJob::where('user_id', auth()->id())
                            ->where('job_id', $job->id)
                            ->exists();
                        $job->company_logo_url = $job->user->employer && $job->user->employer->company_logo
                            ? asset('storage/' . $job->user->employer->company_logo)
                            : asset('backend/img/jobs/techskill.jpeg');
                        return $job;
                    });

                // ======get all the applied jobs===========
                $user = auth()->user();
                $applications = JobApplication::with('job')
                    ->where('user_id', $user->id)
                    ->latest('applied_at')
                    ->take(10)
                    ->get();
                // Calculate counts
                $totalApplied = JobApplication::where('user_id', $user->id)->count();
                $totalShortlisted = JobApplication::where('user_id', $user->id)
                    ->where('status', 'shortlisted')
                    ->count();
                $totalRejected = JobApplication::where('user_id', $user->id)
                    ->where('status', 'rejected')
                    ->count();
                $totalPending = JobApplication::where('user_id', $user->id)
                    ->where('status', 'pending')
                    ->count();
                return view('backend.jobseeker_dashboard.pages.profile.index', compact('jobs', 'applications', 'totalApplied', 'totalRejected', 'totalShortlisted', 'totalPending'));
            } else if (Auth::user()->hasRole('employer')) {
                $user = auth()->user();
                $applications = JobApplication::with(['job', 'user'])
                    ->whereHas('job', function ($query) use ($user) {
                        $query->where('user_id', $user->id); // Only jobs posted by this employer
                    })
                    ->latest('applied_at')
                    ->get();
                return view('backend.employer_dashboard.pages.home', compact('applications'));
            } else if (Auth::user()->hasRole('admin')) {
                return view('backend.main_dashboard.pages.home');
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
