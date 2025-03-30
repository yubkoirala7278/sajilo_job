<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeSpecializationRequest;
use App\Models\EmployeeSpecialization;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeSpecializationController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $specializations = EmployeeSpecialization::query(); // Default ordering

            return DataTables::of($specializations)
                ->addIndexColumn()
                ->editColumn('status', function ($specialization) {
                    return $specialization->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($specialization) {
                    return '
                        <a href="' . route('employee_specialization.edit', $specialization->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $specialization->slug . '" data-status="' . $specialization->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $specialization->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.employee_specialization.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.main_dashboard.general_settings.employee_specialization.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeSpecializationRequest $request)
    {
        try {
            // Create the specialization record
            EmployeeSpecialization::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('employee_specialization.index')->with('success', 'Employee specialization has been created successfully!');
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
            $specialization = EmployeeSpecialization::where('slug', $slug)->first();
            if (!$specialization) {
                return back()->with('error', 'Employee specialization not found!');
            }
            return view('backend.main_dashboard.general_settings.employee_specialization.edit', compact('specialization'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeSpecializationRequest $request, $slug)
    {
        try {
            // Find the employee specialization by slug
            $specialization = EmployeeSpecialization::where('slug', $slug)->first();
            if (!$specialization) {
                return back()->with('error', 'Employee specialization not found!');
            }
            $specialization->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('employee_specialization.index')->with('success', 'Employee specialization has been updated successfully!');
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
            $specialization = EmployeeSpecialization::where('slug', $slug)->first();

            if (!$specialization) {
                return response()->json(['status' => 'error', 'message' => 'Employee specialization not found']);
            }

            $specialization->delete();

            return response()->json(['status' => 'success', 'message' => 'Employee specialization deleted successfully']);
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
            $specialization = EmployeeSpecialization::where('slug', $slug)->firstOrFail();
            $specialization->status = $request->status;
            $specialization->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
