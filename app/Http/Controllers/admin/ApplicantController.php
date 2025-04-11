<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ApplicantController extends Controller
{
    // Base query for employer’s job applications
    private function getBaseQuery()
    {
        $employer = Auth::user()->employer;
        return JobApplication::with(['job', 'user'])
            ->join('jobs', 'job_applications.job_id', '=', 'jobs.id')
            ->where('jobs.user_id', $employer->user_id) // Filter by employer’s jobs
            ->select('job_applications.*');
    }

    public function newApplicants(Request $request)
    {
        try {
            if ($request->ajax()) {
                $applications = $this->getBaseQuery()
                    ->whereIn('job_applications.status', ['pending', 'reviewed']); // New applicants

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('applicant_name', fn($app) => $app->user->name ?? 'N/A')
                    ->addColumn('job_title', fn($app) => $app->job->job_title ?? 'N/A')
                    ->addColumn('applied_at', fn($app) => $app->applied_at ? $app->applied_at->format('M d, Y H:i') : 'N/A')
                    ->addColumn('status', fn($app) => '<span class="badge bg-warning">' . ucfirst($app->status) . '</span>')
                    ->addColumn('action', function ($app) {
                        return '
                            <a href="' . route('job.seeker.profile', $app->user->slug) . '" 
                                class="btn btn-success btn-sm text-white" title="Edit">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        ';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('backend.employer_dashboard.pages.new_applicants');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function selectedApplicants(Request $request)
    {
        try {
            if ($request->ajax()) {
                $applications = $this->getBaseQuery()
                    ->where('job_applications.status', 'selected'); // Selected applicants

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('applicant_name', fn($app) => $app->user->name ?? 'N/A')
                    ->addColumn('job_title', fn($app) => $app->job->job_title ?? 'N/A')
                    ->addColumn('applied_at', fn($app) => $app->applied_at ? $app->applied_at->format('M d, Y H:i') : 'N/A')
                    ->addColumn('status', fn($app) => '<span class="badge bg-success">Selected</span>')
                    ->addColumn('action', function ($app) {
                        return '
                            <a href="' . route('job.seeker.profile', $app->user->slug) . '" 
                                class="btn btn-success btn-sm text-white" title="Edit">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        ';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('backend.employer_dashboard.pages.selected_applicants');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function rejectedApplicants(Request $request)
    {
        try {
            if ($request->ajax()) {
                $applications = $this->getBaseQuery()
                    ->where('job_applications.status', 'rejected'); // Rejected applicants

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('applicant_name', fn($app) => $app->user->name ?? 'N/A')
                    ->addColumn('job_title', fn($app) => $app->job->job_title ?? 'N/A')
                    ->addColumn('applied_at', fn($app) => $app->applied_at ? $app->applied_at->format('M d, Y H:i') : 'N/A')
                    ->addColumn('status', fn($app) => '<span class="badge bg-danger">Rejected</span>')
                    ->addColumn('action', function ($app) {
                        return '
                            <a href="' . route('job.seeker.profile', $app->user->slug) . '" 
                                class="btn btn-success btn-sm text-white" title="Edit">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        ';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('backend.employer_dashboard.pages.rejected_applicants');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function allApplicants(Request $request)
    {
        try {
            if ($request->ajax()) {
                $applications = $this->getBaseQuery(); // All applicants

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('applicant_name', fn($app) => $app->user->name ?? 'N/A')
                    ->addColumn('job_title', fn($app) => $app->job->job_title ?? 'N/A')
                    ->addColumn('applied_at', fn($app) => $app->applied_at ? $app->applied_at->format('M d, Y H:i') : 'N/A')
                    ->addColumn('status', fn($app) => '<span class="badge ' . ($app->status === 'selected' ? 'bg-success' : ($app->status === 'rejected' ? 'bg-danger' : ($app->status === 'shortlisted' ? 'bg-info' : 'bg-warning'))) . '">' . ucfirst($app->status) . '</span>')
                    ->addColumn('action', function ($app) {
                        return '
                            <a href="' . route('job.seeker.profile', $app->user->slug) . '" 
                                class="btn btn-success btn-sm text-white" title="Edit">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        ';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('backend.employer_dashboard.pages.all_applicants');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function shortlistedApplicants(Request $request)
    {
        try {
            if ($request->ajax()) {
                $applications = $this->getBaseQuery()
                    ->where('job_applications.status', 'shortlisted'); // Selected applicants

                return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('applicant_name', fn($app) => $app->user->name ?? 'N/A')
                    ->addColumn('job_title', fn($app) => $app->job->job_title ?? 'N/A')
                    ->addColumn('applied_at', fn($app) => $app->applied_at ? $app->applied_at->format('M d, Y H:i') : 'N/A')
                    ->addColumn('status', fn($app) => '<span class="badge bg-success">Shortlisted</span>')
                    ->addColumn('action', function ($app) {
                        return '
                            <a href="' . route('job.seeker.profile', $app->user->slug) . '" 
                                class="btn btn-success btn-sm text-white" title="Edit">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        ';
                    })
                    ->rawColumns(['status', 'action'])
                    ->make(true);
            }
            return view('backend.employer_dashboard.pages.shortlisted_applicants');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
