<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class EmployerManagementController extends Controller
{
    // Display the view
    public function index()
    {
        return view('admin.employer.all');
    }

    public function approved()
    {
        return view('admin.employer.approved');
    }

    public function rejected()
    {
        return view('admin.employer.rejected');
    }

    // Handle DataTables AJAX request
    public function getData(Request $request)
    {
        try {
            // Base query with 'employer' role and eager load 'employer' relationship
            $employers = User::role('employer')->with('employer');

            // Filter by status if provided
            $status = $request->input('status');
            if ($status && $status !== 'all') {
                $employers->where('status', $status); // Filter by 'active' or 'inactive'
            }
            // If 'all' or no status, fetch all employers (no additional filter)

            return DataTables::of($employers)
                ->addIndexColumn()
                ->addColumn('employer_name', function ($employer) {
                    return $employer->name ?? 'N/A';
                })
                ->addColumn('email', function ($employer) {
                    return $employer->email ?? 'N/A';
                })
                ->addColumn('contact_number', function ($employer) {
                    return $employer->employer->contact_number ?? 'N/A';
                })
                ->addColumn('company_logo', function ($employer) {
                    if ($employer->employer && $employer->employer->company_logo) {
                        return '<img src="' . asset('storage/' . $employer->employer->company_logo) . '" alt="Company Logo" class="logo-img" height="30" style="cursor: pointer;">';
                    }
                    return 'N/A';
                })
                ->addColumn('address', function ($employer) {
                    return $employer->employer->company_address ?? 'N/A';
                })
                ->addColumn('status', function ($employer) {
                    return '<span class="badge ' . ($employer->status == 'active' ? 'bg-success' : 'bg-danger') . '">' .
                        ucfirst($employer->status) . '</span>';
                })
                ->addColumn('action', function ($employer) {
                    $deleteBtn = '<button class="btn btn-danger btn-sm delete-btn" data-id="' . $employer->id . '" title="Delete Employer"><i class="fa-solid fa-trash"></i></button>';
                    $statusBtn = '<button class="btn btn-dark btn-sm change-status" data-id="' . $employer->id . '" title="Change Status"><i class="fa-solid fa-toggle-on"></i></button>';
                    $viewBtn = '<a href="' . route('admin.employer.view', $employer->slug) . '" class="btn btn-info btn-sm" title="View Employer"><i class="fa-solid fa-eye"></i></a>';
                    return $deleteBtn . ' ' . $statusBtn . ' ' . $viewBtn;
                })
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && !empty($request->input('search.value'))) {
                        $search = $request->input('search.value');
                        $query->where(function ($q) use ($search) {
                            $q->where('name', 'like', "%{$search}%")
                              ->orWhere('email', 'like', "%{$search}%")
                              ->orWhere('status', 'like', "%{$search}%")
                              ->orWhereHas('employer', function ($q) use ($search) {
                                  $q->where('contact_number', 'like', "%{$search}%")
                                    ->orWhere('company_address', 'like', "%{$search}%");
                              });
                        });
                    }
                })
                ->rawColumns(['company_logo', 'status', 'action'])
                ->make(true);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            // Find the user with 'employer' role by ID
            $user = User::role('employer')->find($request->id);

            if (!$user) {
                return response()->json(['success' => false, 'error' => 'Employer not found'], 404);
            }

            // Find the associated employer record
            $employer = $user->employer; // Assuming a 'employer' relationship on User model

            if ($employer && $employer->company_logo) {
                // Delete company logo from storage
                Storage::disk('public')->delete($employer->company_logo);
            }

            // Delete the employer record (if it exists)
            if ($employer) {
                $employer->delete();
            }

            // Delete the user record
            $user->delete();

            return response()->json(['success' => true, 'message' => 'Employer deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'error' => $th->getMessage()], 500);
        }
    }

    public function toggleStatus($id)
    {
        try {
            $employer = User::role('employer')->findOrFail($id); // Ensure it's an employer
            $employer->status = $employer->status == 'active' ? 'inactive' : 'active'; // Fixed typo: $employee to $employer
            $employer->save();
            return response()->json(['success' => 'Status changed successfully', 'new_status' => $employer->status]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function view($slug)
    {
        try {
            $employer = User::role('employer')->with('employer')->where('slug',$slug)->first();
            return view('admin.employer.view', compact('employer'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
