<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DegreeRequest;
use App\Models\Degree;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DegreeController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $degrees = Degree::query(); // Default ordering

            return DataTables::of($degrees)
                ->addIndexColumn()
                ->editColumn('status', function ($degree) {
                    return $degree->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($degree) {
                    return '
                        <a href="' . route('employee_degree.edit', $degree->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $degree->slug . '" data-status="' . $degree->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $degree->slug . '" title="delete degree"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.degree.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.degree.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(DegreeRequest $request)
    {
        try {
            // Create the degree record
            Degree::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('employee_degree.index')->with('success', 'Degree has been created successfully!');
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
            $degree = Degree::where('slug', $slug)->first();
            if (!$degree) {
                return back()->with('error', 'Degree not found!');
            }
            return view('admin.degree.edit', compact('degree'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(DegreeRequest $request, $slug)
    {
        try {
            // Find the degree by slug
            $degree = Degree::where('slug', $slug)->first();
            if (!$degree) {
                return back()->with('error', 'Degree not found!');
            }
            $degree->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('employee_degree.index')->with('success', 'Degree has been updated successfully!');
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
            $degree = Degree::where('slug', $slug)->first();

            if (!$degree) {
                return response()->json(['status' => 'error', 'message' => 'Degree not found']);
            }

            $degree->delete();

            return response()->json(['status' => 'success', 'message' => 'Degree deleted successfully']);
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
            $degree = Degree::where('slug', $slug)->firstOrFail();
            $degree->status = $request->status;
            $degree->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
