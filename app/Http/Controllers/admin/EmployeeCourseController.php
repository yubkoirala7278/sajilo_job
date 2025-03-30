<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\Degree;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeCourseController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::with('degree');

            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('degree',function($course){
                    return $course->degree->name;
                })
                ->editColumn('status', function ($course) {
                    return $course->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($course) {
                    return '
                        <a href="' . route('employee_course.edit', $course->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $course->slug . '" data-status="' . $course->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $course->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.employee_course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $degrees=Degree::where('status','active')->orderBy('name','asc')->get();
            return view('backend.main_dashboard.general_settings.employee_course.create',compact('degrees'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        try {
            // Create the employee course record
            Course::create([
                'name' => $request->name,
                'status' => $request->status,
                'degree_id'=>$request->degree
            ]);
            return redirect()->route('employee_course.index')->with('success', 'Employee course has been created successfully!');
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
            $course = Course::where('slug', $slug)->first();
            if (!$course) {
                return back()->with('error', 'Employee course not found!');
            }
            $degrees=Degree::where('status','active')->orderBy('name','asc')->get();
            return view('backend.main_dashboard.general_settings.employee_course.edit', compact('course','degrees'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, $slug)
    {
        try {
            // Find the  course by slug
            $course = Course::where('slug', $slug)->first();
            if (!$course) {
                return back()->with('error', 'Employee course not found!');
            }
            $course->update([
                'name' => $request['name'],
                'status' => $request['status'],
                'degree_id'=>$request['degree']
            ]);
            return redirect()->route('employee_course.index')->with('success', 'Employee course has been updated successfully!');
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
            $course = Course::where('slug', $slug)->first();

            if (!$course) {
                return response()->json(['status' => 'error', 'message' => 'Employee course not found']);
            }

            $course->delete();

            return response()->json(['status' => 'success', 'message' => 'Employee course deleted successfully']);
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
            $course = Course::where('slug', $slug)->firstOrFail();
            $course->status = $request->status;
            $course->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
