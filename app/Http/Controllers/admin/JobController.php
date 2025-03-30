<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Country;
use App\Models\Degree;
use App\Models\EmployeeSkill;
use App\Models\Job;
use App\Models\JobCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, false);
            }

            return view('backend.employer_dashboard.pages.job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Common function to build DataTable response
     */
    private function getJobsDataTable($request, $expiredOnly = false)
    {
        $jobs = Job::where('user_id', auth()->id())
            ->with(['category', 'skills'])
            ->select([
                'id',
                'slug',
                'job_title',
                'category_id',
                'job_level',
                'employment_type',
                'no_of_vacancy',
                'status',
                'posted_at',
                'expiry_date',
                'is_approved'
            ]);

        // Apply expired jobs filter if requested
        if ($expiredOnly) {
            $jobs->whereNotNull('expiry_date')
                 ->where('expiry_date', '<', Carbon::today());
        }

        return DataTables::of($jobs)
            ->addIndexColumn()
            ->addColumn('category', function (Job $job) {
                return $job->category ? $job->category->category : '-';
            })
            ->addColumn('skills', function (Job $job) {
                return $job->skills->pluck('name')->implode(', ');
            })
            ->editColumn('posted_at', function (Job $job) {
                return $job->posted_at ? Carbon::parse($job->posted_at)->format('Y-m-d') : '-';
            })
            ->editColumn('expiry_date', function (Job $job) {
                return $job->expiry_date ? Carbon::parse($job->expiry_date)->format('Y-m-d') : '-';
            })
            ->addColumn('action', function (Job $job) {
                return '
                    <a href="' . route('job.edit', $job->slug) . '" 
                       class="btn btn-warning btn-sm text-white" title="Edit">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a href="' . route('job.show', $job->slug) . '" 
                       class="btn btn-info btn-sm text-white" title="View">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $job->slug . '" 
                            data-status="' . $job->status . '" 
                            title="Toggle Status">
                        <i class="fa-solid fa-toggle-' . ($job->status === 'active' ? 'on' : 'off') . '"></i>
                    </button>
                    <button class="btn btn-danger btn-sm delete-btn" 
                            data-slug="' . $job->slug . '" 
                            title="Delete job">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                ';
            })
            ->editColumn('status', function (Job $job) {
                return '<span class="badge ' .
                       ($job->status === 'active' ? 'bg-success' : 'bg-danger') . '">' .
                       ucfirst($job->status) . '</span>';
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
            ->rawColumns(['action', 'status','is_approved'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = JobCategory::where('status', 'active')->orderBy('category', 'asc')->get();
            $degrees = Degree::where('status', 'active')->orderBy('name', 'asc')->get();
            $employee_skills = EmployeeSkill::where('status', 'active')->orderBy('name', 'asc')->get();
            $countries = Country::orderBy('name', 'asc')->get();
            return view('backend.employer_dashboard.pages.create_job', compact('categories', 'degrees', 'employee_skills', 'countries'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        DB::beginTransaction();

        try {
            // Get the authenticated user ID (assuming you're using authentication)
            $userId = auth()->id();

            // Create unique slug from job title
            $slug = Str::slug($request['job_title']);
            $originalSlug = $slug;
            $count = 1;
            // Ensure slug is unique
            while (Job::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }

            // Create the job record
            $job = Job::create([
                'user_id' => $userId,
                'slug' => $slug,
                'job_title' => $request['job_title'],
                'category_id' => $request['category_id'],
                'job_level' => $request['job_level'],
                'employment_type' => $request['employment_type'],
                'no_of_vacancy' => $request['no_of_vacancy'],
                'job_country' => $request['job_country'],
                'job_location' => $request['job_location'],
                'offered_salary' => $request['offered_salary'] ?? null,
                'is_negotiable' => $request->boolean('is_negotiable', false),
                'expiry_date' => $request['expiry_date'] ?? null,
                'degree_id' => $request['degree_id'] ?? null,
                'experience_required' => $request['experience_required'],
                'job_description' => $request['job_description'],
                'other_specification' => $request['other_specification'] ?? null,
                'status' => $request['status'],
                'posted_at' => now(), // Explicitly set, though it has a default
                'job_views_count' => 0, // Explicitly set, though it has a default
            ]);

            // Sync the skills if provided
            if ($request->has('skills')) {
                $job->skills()->sync($request->skills);
            }

            DB::commit();

            return redirect()->route('job.index')->with('success', 'New job created successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'Failed to create job: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        try{
            return view('backend.employer_dashboard.pages.show_job',compact('job'));
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // Authorization check
        if ($job->user_id !== auth()->id()) {
            return redirect()->route('job.index')->with('error', 'Unauthorized access');
        }

        // You can load additional data if needed (categories, skills, degrees)
        $categories = JobCategory::where('status', 'active')->orderBy('category', 'asc')->get();
        $degrees = Degree::where('status', 'active')->orderBy('name', 'asc')->get();
        $employee_skills = EmployeeSkill::where('status', 'active')->orderBy('name', 'asc')->get();
        $countries = Country::orderBy('name', 'asc')->get();

        return view('backend.employer_dashboard.pages.edit_job', compact('job', 'categories', 'employee_skills', 'degrees', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        DB::beginTransaction();

        try {
            // Authorization check
            if ($job->user_id !== auth()->id()) {
                return redirect()->route('admin.job.index')->with('error', 'Unauthorized access');
            }

            // Validate the request (assuming JobRequest handles validation)
            $validated = $request->validate((new JobRequest())->rules());

            // Regenerate slug if job title has changed
            $newSlug = Str::slug($request['job_title']);
            if ($newSlug !== $job->slug) {
                $originalSlug = $newSlug;
                $count = 1;
                while (Job::where('slug', $newSlug)->where('id', '!=', $job->id)->exists()) {
                    $newSlug = $originalSlug . '-' . $count++;
                }
            } else {
                $newSlug = $job->slug; // Keep existing slug if title hasn't changed
            }

            // Update the job record
            $job->update([
                'slug' => $newSlug,
                'job_title' => $request['job_title'],
                'category_id' => $request['category_id'],
                'job_level' => $request['job_level'],
                'employment_type' => $request['employment_type'],
                'no_of_vacancy' => $request['no_of_vacancy'],
                'job_country' => $request['job_country'],
                'job_location' => $request['job_location'],
                'offered_salary' => $request['offered_salary'] ?? null,
                'is_negotiable' => $request->boolean('is_negotiable', false),
                'expiry_date' => $request['expiry_date'] ?? null,
                'degree_id' => $request['degree_id'] ?? null,
                'experience_required' => $request['experience_required'],
                'job_description' => $request['job_description'],
                'other_specification' => $request['other_specification'] ?? null,
                'status' => $request['status'],
            ]);

            // Sync the skills if provided
            if ($request->has('skills')) {
                $job->skills()->sync($request->skills);
            } else {
                // Optionally clear skills if none provided
                $job->skills()->detach();
            }

            DB::commit();

            return redirect()->route('job.index')->with('success', 'Job updated successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'Failed to update job: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        try {
            if ($job->user_id !== auth()->id()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $job->delete();
            return response()->json(['success' => 'Job deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    /**
     * Toggle Status
     */
    public function toggleStatus(Request $request, Job $job)
    {
        try {
            if ($job->user_id !== auth()->id()) {
                return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 403);
            }

            $newStatus = $job->status === 'active' ? 'inactive' : 'active';
            $job->status = $newStatus;
            $job->save();

            return response()->json(['message' => 'Status updated successfully', 'new_status' => $newStatus]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

       /**
     * Expired Jobs
     */
    public function expiredJobs(Request $request){
        try {
            if ($request->ajax()) {
                return $this->getJobsDataTable($request, true);
            }

            return view('backend.employer_dashboard.pages.expired_job');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
