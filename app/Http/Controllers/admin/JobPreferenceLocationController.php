<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobPreferenceLocationRequest;
use App\Models\JobPreferenceLocation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobPreferenceLocationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locations = JobPreferenceLocation::query(); // Default ordering

            return DataTables::of($locations)
                ->addIndexColumn()
                ->editColumn('status', function ($location) {
                    return $location->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($location) {
                    return '
                        <a href="' . route('job_preference_location.edit', $location->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $location->slug . '" data-status="' . $location->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $location->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.job_preference_location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.job_preference_location.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPreferenceLocationRequest $request)
    {
        try {
            // Create the preferred location record
            JobPreferenceLocation::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('job_preference_location.index')->with('success', 'Preference location has been created successfully!');
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
            $location = JobPreferenceLocation::where('slug', $slug)->first();
            if (!$location) {
                return back()->with('error', 'Preference location not found!');
            }
            return view('admin.job_preference_location.edit', compact('location'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPreferenceLocationRequest $request, $slug)
    {
        try {
            // Find the preferred location by slug
            $location = JobPreferenceLocation::where('slug', $slug)->first();
            if (!$location) {
                return back()->with('error', 'Preference location not found!');
            }
            $location->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('job_preference_location.index')->with('success', 'Preference location has been updated successfully!');
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
            $location = JobPreferenceLocation::where('slug', $slug)->first();

            if (!$location) {
                return response()->json(['status' => 'error', 'message' => 'Preference location not found']);
            }

            $location->delete();

            return response()->json(['status' => 'success', 'message' => 'Preference location deleted successfully']);
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
            $location = JobPreferenceLocation::where('slug', $slug)->firstOrFail();
            $location->status = $request->status;
            $location->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
