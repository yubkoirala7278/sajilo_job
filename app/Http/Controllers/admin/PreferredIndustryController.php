<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreferredIndustryRequest;
use App\Models\PreferredIndustry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreferredIndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $industries = PreferredIndustry::query(); // Default ordering

            return DataTables::of($industries)
                ->addIndexColumn()
                ->editColumn('status', function ($industry) {
                    return $industry->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($industry) {
                    return '
                        <a href="' . route('preferred_industry.edit', $industry->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $industry->slug . '" data-status="' . $industry->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $industry->slug . '" title="delete preferred inductry"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('admin.preferred_industry.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.preferred_industry.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PreferredIndustryRequest $request)
    {
        try {
            // Create the preferred industry record
            PreferredIndustry::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('preferred_industry.index')->with('success', 'Preferred industry has been created successfully!');
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
            $industry = PreferredIndustry::where('slug', $slug)->first();
            if (!$industry) {
                return back()->with('error', 'Preferred industry not found!');
            }
            return view('admin.preferred_industry.edit', compact('industry'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PreferredIndustryRequest $request, $slug)
    {
        try {
            // Find the preferred industry by slug
            $industry = PreferredIndustry::where('slug', $slug)->first();
            if (!$industry) {
                return back()->with('error', 'Preferred industry not found!');
            }
            $industry->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('preferred_industry.index')->with('success', 'Preferred industry has been updated successfully!');
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
            $industry = PreferredIndustry::where('slug', $slug)->first();

            if (!$industry) {
                return response()->json(['status' => 'error', 'message' => 'Preferred industry not found']);
            }

            $industry->delete();

            return response()->json(['status' => 'success', 'message' => 'Preferred industry deleted successfully']);
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
            $industry = PreferredIndustry::where('slug', $slug)->firstOrFail();
            $industry->status = $request->status;
            $industry->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
