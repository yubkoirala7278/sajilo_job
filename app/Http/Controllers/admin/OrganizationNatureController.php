<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganizationNatureRequest;
use App\Models\OrganizationNature;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class OrganizationNatureController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $natures = OrganizationNature::query(); // Default ordering

            return DataTables::of($natures)
                ->addIndexColumn()
                ->editColumn('status', function ($nature) {
                    return $nature->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($nature) {
                    return '
                        <a href="' . route('organization_nature.edit', $nature->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $nature->slug . '" data-status="' . $nature->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $nature->slug . '" title="delete organization nature"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.organization_nature.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.main_dashboard.general_settings.organization_nature.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OrganizationNatureRequest $request)
    {
        try {
            // Create the nature record
            OrganizationNature::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('organization_nature.index')->with('success', 'Organization nature has been created successfully!');
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
            $nature = OrganizationNature::where('slug', $slug)->first();
            if (!$nature) {
                return back()->with('error', 'Organization nature not found!');
            }
            return view('backend.main_dashboard.general_settings.organization_nature.edit', compact('nature'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(OrganizationNatureRequest $request, $slug)
    {
        try {
            // Find the nature by slug
            $nature = OrganizationNature::where('slug', $slug)->first();
            if (!$nature) {
                return back()->with('error', 'Organization nature not found!');
            }
            $nature->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('organization_nature.index')->with('success', 'Organization nature has been updated successfully!');
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
            $nature = OrganizationNature::where('slug', $slug)->first();

            if (!$nature) {
                return response()->json(['status' => 'error', 'message' => 'Organization nature not found']);
            }

            $nature->delete();

            return response()->json(['status' => 'success', 'message' => 'Organization nature deleted successfully']);
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
            $nature = OrganizationNature::where('slug', $slug)->firstOrFail();
            $nature->status = $request->status;
            $nature->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
