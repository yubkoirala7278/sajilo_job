<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeSkillRequest;
use App\Models\EmployeeSkill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $skills = EmployeeSkill::query(); // Default ordering

            return DataTables::of($skills)
                ->addIndexColumn()
                ->editColumn('status', function ($skill) {
                    return $skill->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($skill) {
                    return '
                        <a href="' . route('employee_skill.edit', $skill->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $skill->slug . '" data-status="' . $skill->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $skill->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.employee_skill.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.employee_skill.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeSkillRequest $request)
    {
        try {
            // Create the employee skill record
            EmployeeSkill::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('employee_skill.index')->with('success', 'Employee skill has been created successfully!');
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
            $skill = EmployeeSkill::where('slug', $slug)->first();
            if (!$skill) {
                return back()->with('error', 'Employee skill not found!');
            }
            return view('admin.employee_skill.edit', compact('skill'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeSkillRequest $request, $slug)
    {
        try {
            // Find the  skill by slug
            $skill = EmployeeSkill::where('slug', $slug)->first();
            if (!$skill) {
                return back()->with('error', 'Employee skill not found!');
            }
            $skill->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('employee_skill.index')->with('success', 'Employee skill has been updated successfully!');
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
            $skill = EmployeeSkill::where('slug', $slug)->first();

            if (!$skill) {
                return response()->json(['status' => 'error', 'message' => 'Employee skill not found']);
            }

            $skill->delete();

            return response()->json(['status' => 'success', 'message' => 'Employee skill deleted successfully']);
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
            $skill = EmployeeSkill::where('slug', $slug)->firstOrFail();
            $skill->status = $request->status;
            $skill->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
