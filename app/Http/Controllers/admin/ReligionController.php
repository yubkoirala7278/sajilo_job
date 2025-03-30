<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReligionRequest;
use App\Models\Religion;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $religions = Religion::query(); // Default ordering

            return DataTables::of($religions)
                ->addIndexColumn()
                ->editColumn('status', function ($religion) {
                    return $religion->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($religion) {
                    return '
                        <a href="' . route('religion.edit', $religion->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $religion->slug . '" data-status="' . $religion->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $religion->slug . '" title="delete religion"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.religion.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.main_dashboard.general_settings.religion.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReligionRequest $request)
    {
        try {
            // Create the religion record
            Religion::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('religion.index')->with('success', 'Religion has been created successfully!');
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
            $religion = Religion::where('slug', $slug)->first();
            if (!$religion) {
                return back()->with('error', 'Religion not found!');
            }
            return view('backend.main_dashboard.general_settings.religion.edit', compact('religion'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ReligionRequest $request, $slug)
    {
        try {
            // Find the religion by slug
            $religion = Religion::where('slug', $slug)->first();
            if (!$religion) {
                return back()->with('error', 'Religion not found!');
            }
            $religion->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('religion.index')->with('success', 'Religion has been updated successfully!');
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
            $religion = Religion::where('slug', $slug)->first();

            if (!$religion) {
                return response()->json(['status' => 'error', 'message' => 'Religion not found']);
            }

            $religion->delete();

            return response()->json(['status' => 'success', 'message' => 'Religion deleted successfully']);
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
            $religion = Religion::where('slug', $slug)->firstOrFail();
            $religion->status = $request->status;
            $religion->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
