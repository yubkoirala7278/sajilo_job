<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTitleRequest;
use App\Models\JobTitle;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $titles = JobTitle::query(); // Default ordering

            return DataTables::of($titles)
                ->addIndexColumn()
                ->editColumn('status', function ($title) {
                    return $title->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($title) {
                    return '
                        <a href="' . route('job_title.edit', $title->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $title->slug . '" data-status="' . $title->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $title->slug . '" title="delete job title"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.job_title.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.main_dashboard.general_settings.job_title.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(JobTitleRequest $request)
    {
        try {
            // Create the title record
            JobTitle::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('job_title.index')->with('success', 'Job title has been created successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        try {
            $title = JobTitle::where('slug', $slug)->first();
            if (!$title) {
                return back()->with('error', 'Job title not found!');
            }
            return view('backend.main_dashboard.general_settings.job_title.edit', compact('title'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobTitleRequest $request, $slug)
    {
        try {
            // Find the title by slug
            $title = JobTitle::where('slug', $slug)->first();
            if (!$title) {
                return back()->with('error', 'Job title not found!');
            }
            $title->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('job_title.index')->with('success', 'Job title has been updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        try {
            $title = JobTitle::where('slug', $slug)->first();

            if (!$title) {
                return response()->json(['status' => 'error', 'message' => 'Job title not found']);
            }

            $title->delete();

            return response()->json(['status' => 'success', 'message' => 'Job title deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }

    /**
     * toggle status
     */
    public function toggleStatus(Request $request, $slug)
    {
        try {
            $title = JobTitle::where('slug', $slug)->firstOrFail();
            $title->status = $request->status;
            $title->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
