<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobManagementController extends Controller
{
    public function new(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, 'new');
            }

            return view('backend.main_dashboard.job_management.new_job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function approved(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, 'approved');
            }

            return view('backend.main_dashboard.job_management.approved_job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function rejected(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, 'rejected');
            }

            return view('backend.main_dashboard.job_management.rejected_job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function all(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, 'all');
            }

            return view('backend.main_dashboard.job_management.all_job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    /**
     * Common function to build DataTable response
     */
    private function getJobsDataTable($request, $job_management)
    {
        $jobs = Job::with(['category', 'skills','user'])->where('status', 'active');

        // Job Management
        if ($job_management != 'all') {
            if ($job_management == 'new') {
                $jobs->whereNotNull('expiry_date')
                    ->where('expiry_date', '>', Carbon::today());
            } else  if ($job_management == 'approved') {
                $jobs->where('is_approved', 'approved');
            } else if ($job_management == 'rejected') {
                $jobs->where('is_approved', 'rejected');
            }
        }

        return DataTables::of($jobs)
            ->addIndexColumn()
            ->addColumn('category', function (Job $job) {
                return $job->category ? $job->category->category : '-';
            })
            ->addColumn('skills', function (Job $job) {
                return $job->skills->pluck('name')->implode(', ');
            })
            ->addColumn('company_name', function (Job $job) {
                return $job->user->name;
            })
            ->editColumn('posted_at', function (Job $job) {
                return $job->posted_at ? Carbon::parse($job->posted_at)->format('Y-m-d') : '-';
            })
            ->editColumn('expiry_date', function (Job $job) {
                return $job->expiry_date ? Carbon::parse($job->expiry_date)->format('Y-m-d') : '-';
            })
            ->addColumn('action', function (Job $job) {
                return '
                    <a href="' . route('show.job.detail', $job->slug) . '" 
                       class="btn btn-info btn-sm text-white" title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <button class="btn btn-dark text-white btn-sm change-approval-btn" 
                        data-slug="' . $job->slug . '" 
                        data-current="' . $job->is_approved . '" 
                        data-bs-toggle="modal" 
                        data-bs-target="#changeApprovalModal" 
                        title="Change Approval">
                  <i class="fa-solid fa-toggle-on"></i>
                </button>
                ';
            })
            ->editColumn('is_approved', function (Job $job) {
                $statusLabels = [
                    'approved' => ['class' => 'bg-success', 'label' => 'Approved'],
                    'pending' => ['class' => 'bg-warning', 'label' => 'Pending'],
                    'rejected' => ['class' => 'bg-danger', 'label' => 'Rejected'],
                ];
                $status = $statusLabels[$job->is_approved] ?? ['class' => 'bg-secondary', 'label' => ucfirst($job->is_approved)];
                return '<span class="badge ' . $status['class'] . '">' . $status['label'] . '</span>';
            })
            ->rawColumns(['action', 'is_approved'])
            ->make(true);
    }


    public function updateApproval(Request $request, $slug)
    {
        try {
            $job = Job::where('slug', $slug)->firstOrFail();
            $job->is_approved = $request->input('is_approved');
            $job->save();

            return response()->json(['message' => 'Approval status updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function showJobDetail($slug){
        $job=Job::where('slug',$slug)->first();
        return view('backend.main_dashboard.job_management.show_job',compact('job'));
    }
}
