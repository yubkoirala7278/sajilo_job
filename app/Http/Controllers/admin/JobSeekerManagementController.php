<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobSeekerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.job_seeker_management.index');
    }

    public function approvedJobSeeker()
    {
        return view('admin.job_seeker_management.approved');
    }

    public function rejectedJobSeeker()
    {
        return view('admin.job_seeker_management.rejected');
    }


    // JobSeekerManagementController.php
    public function getData(Request $request)
    {
        try {
            // Base query with the 'employee' role and eager load the 'employee' relationship
            $employees = User::role('employee')->with('employee');

            // Filter by status if provided
            $status = $request->input('status'); // Assuming status is passed from frontend
            if ($status && $status !== 'all') {
                $employees->where('status', $status); // Filter by 'active' or 'inactive'
            }

            return DataTables::of($employees)
                ->addIndexColumn()
                ->addColumn('name', function ($employee) {
                    return $employee->name ?? 'N/A';
                })
                ->addColumn('email', function ($employee) {
                    return $employee->email ?? 'N/A';
                })
                ->addColumn('job_level', function ($employee) {
                    return $employee->employee->job_level ?? 'N/A';
                })
                ->addColumn('expected_salary', function ($employee) {
                    return ($employee->employee->expected_salary_currency ?? 'N/A') . ' ' .
                        ($employee->employee->expected_salary_operator ?? '') . ' ' .
                        ($employee->employee->expected_salary ?? 'N/A') . ' ' .
                        ($employee->employee->expected_salary_unit ?? '');
                })
                ->addColumn('current_salary', function ($employee) {
                    return ($employee->employee->current_salary_currency ?? 'N/A') . ' ' .
                        ($employee->employee->current_salary_operator ?? '') . ' ' .
                        ($employee->employee->current_salary ?? 'N/A') . ' ' .
                        ($employee->employee->current_salary_unit ?? '');
                })
                ->addColumn('gender', function ($employee) {
                    return $employee->employee->gender ?? 'N/A';
                })
                ->addColumn('dob', function ($employee) {
                    return optional($employee->employee)->date_of_birth
                        ? \Carbon\Carbon::parse($employee->employee->date_of_birth)->format('F d, Y')
                        : 'N/A';
                })
                ->addColumn('marital_status', function ($employee) {
                    return $employee->employee->marital_status ?? 'N/A';
                })
                ->addColumn('religion', function ($employee) {
                    return $employee->employee->religion->name ?? 'N/A';
                })
                ->addColumn('is_disabled', function ($employee) {
                    return optional($employee->employee)->is_disabled !== null
                        ? ($employee->employee->is_disabled ? 'Yes' : 'No')
                        : 'N/A';
                })
                ->addColumn('nationality', function ($employee) {
                    return $employee->employee->nationality ?? 'N/A';
                })
                ->addColumn('current_address', function ($employee) {
                    return $employee->employee->current_address ?? 'N/A';
                })
                ->addColumn('permanent_address', function ($employee) {
                    return $employee->employee->permanent_address ?? 'N/A';
                })
                ->addColumn('contact_number', function ($employee) {
                    return $employee->employee->contact_number ?? 'N/A';
                })
                ->addColumn('degree', function ($employee) {
                    return $employee->employee->degree->name ?? 'N/A';
                })
                ->addColumn('course', function ($employee) {
                    return $employee->employee->course->name ?? 'N/A';
                })
                ->addColumn('board_or_university', function ($employee) {
                    return $employee->employee->board_or_university ?? 'N/A';
                })
                ->addColumn('school_or_college_or_institute', function ($employee) {
                    return $employee->employee->school_or_college_or_institute ?? 'N/A';
                })
                ->addColumn('is_currently_studying', function ($employee) {
                    return optional($employee->employee)->is_currently_studying !== null
                        ? ($employee->employee->is_currently_studying ? 'Yes' : 'No')
                        : 'N/A';
                })
                ->addColumn('grade_type', function ($employee) {
                    return $employee->employee->grade_type ?? 'N/A';
                })
                ->addColumn('mark_secured', function ($employee) {
                    return $employee->employee->mark_secured ?? 'N/A';
                })
                ->addColumn('graduation_year', function ($employee) {
                    return $employee->employee->graduation_year ?? 'N/A';
                })
                ->addColumn('graduation_month', function ($employee) {
                    return $employee->employee->graduation_month ?? 'N/A';
                })
                ->addColumn('education_started_year', function ($employee) {
                    return $employee->employee->education_started_year ?? 'N/A';
                })
                ->addColumn('education_started_month', function ($employee) {
                    return $employee->employee->education_started_month ?? 'N/A';
                })
                ->addColumn('status', function ($employee) {
                    return '<span class="badge ' . ($employee->status == 'active' ? 'bg-success' : 'bg-danger') . '">' .
                        ucfirst($employee->status) . '</span>';
                })
                ->addColumn('action', function ($employee) {
                    $statusBtn = '<button class="btn btn-dark btn-sm change-status" data-id="' . $employee->id . '" title="Change Status"><i class="fa-solid fa-toggle-on"></i></button>';
                    $viewBtn = '<a href="' . route('job.seeker.view', $employee->id) . '" class="btn btn-info btn-sm" title="View Employee"><i class="fa-solid fa-eye"></i></a>';
                    $deleteBtn = '<button class="btn btn-danger btn-sm delete-btn" data-id="' . $employee->id . '" title="Delete Employee"><i class="fa-solid fa-trash"></i></button>';
                    return $statusBtn . ' ' . $viewBtn . ' ' . $deleteBtn;
                })
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && !empty($request->input('search.value'))) {
                        $search = $request->input('search.value');
                        $query->where(function ($q) use ($search) {
                            // Search in User table
                            $q->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%")
                                ->orWhere('status', 'like', "%{$search}%")
                                // Search in related employee table
                                ->orWhereHas('employee', function ($q) use ($search) {
                                    $q->where('job_level', 'like', "%{$search}%")
                                        ->orWhere('gender', 'like', "%{$search}%")
                                        ->orWhere('marital_status', 'like', "%{$search}%")
                                        ->orWhere('nationality', 'like', "%{$search}%")
                                        ->orWhere('current_address', 'like', "%{$search}%")
                                        ->orWhere('permanent_address', 'like', "%{$search}%")
                                        ->orWhere('contact_number', 'like', "%{$search}%")
                                        ->orWhere('board_or_university', 'like', "%{$search}%")
                                        ->orWhere('school_or_college_or_institute', 'like', "%{$search}%")
                                        ->orWhere('grade_type', 'like', "%{$search}%")
                                        ->orWhere('mark_secured', 'like', "%{$search}%")
                                        ->orWhere('graduation_year', 'like', "%{$search}%")
                                        ->orWhere('graduation_month', 'like', "%{$search}%")
                                        ->orWhere('education_started_year', 'like', "%{$search}%")
                                        ->orWhere('education_started_month', 'like', "%{$search}%");
                                })
                                // Search in related religion table
                                ->orWhereHas('employee.religion', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                })
                                // Search in related degree table
                                ->orWhereHas('employee.degree', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                })
                                // Search in related course table
                                ->orWhereHas('employee.course', function ($q) use ($search) {
                                    $q->where('name', 'like', "%{$search}%");
                                });
                        });
                    }
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $employee = User::findOrFail($id);
            $employee->delete();
            return response()->json(['success' => 'Employee deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function changeStatus($id)
    {
        try {
            $employee = User::findOrFail($id);
            $employee->status = $employee->status == 'active' ? 'inactive' : 'active';
            $employee->save();
            return response()->json(['success' => 'Status changed successfully', 'new_status' => $employee->status]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }


    public function view($id)
    {
        try {
            $employee = User::role('employee')->with('employee')->findOrFail($id);
            return view('admin.job_seeker_management.view', compact('employee'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function viewCV($id)
    {
        try {
            $employee = User::role('employee')->with('employee')->findOrFail($id);
            return view('admin.job_seeker_management.cv', compact('employee'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
