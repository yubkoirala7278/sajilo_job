<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeAvailabilityRequest;
use App\Models\EmployeeAvailability;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $availabilities = EmployeeAvailability::query(); // Default ordering

            return DataTables::of($availabilities)
                ->addIndexColumn()
                ->editColumn('status', function ($availability) {
                    return $availability->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($availability) {
                    return '
                        <a href="' . route('employee_availability.edit', $availability->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $availability->slug . '" data-status="' . $availability->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $availability->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.employee_availability.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.employee_availability.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeAvailabilityRequest $request)
    {
        try {
            // Create the availability record
            EmployeeAvailability::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('employee_availability.index')->with('success', 'Employee availability has been created successfully!');
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
            $availability = EmployeeAvailability::where('slug', $slug)->first();
            if (!$availability) {
                return back()->with('error', 'Employee availability not found!');
            }
            return view('admin.employee_availability.edit', compact('availability'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeAvailabilityRequest $request, $slug)
    {
        try {
            // Find the employee availability by slug
            $availability = EmployeeAvailability::where('slug', $slug)->first();
            if (!$availability) {
                return back()->with('error', 'Employee availability not found!');
            }
            $availability->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('employee_availability.index')->with('success', 'Employee availability has been updated successfully!');
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
            $availability = EmployeeAvailability::where('slug', $slug)->first();

            if (!$availability) {
                return response()->json(['status' => 'error', 'message' => 'Employee availability not found']);
            }

            $availability->delete();

            return response()->json(['status' => 'success', 'message' => 'Employee availability deleted successfully']);
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
            $availability = EmployeeAvailability::where('slug', $slug)->firstOrFail();
            $availability->status = $request->status;
            $availability->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
