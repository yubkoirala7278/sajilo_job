<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TechnicalSkillRequest;
use App\Models\TechnicalSkill;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TechnicalSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $skills = TechnicalSkill::query(); // Default ordering

            return DataTables::of($skills)
                ->addIndexColumn()
                ->editColumn('status', function ($skill) {
                    return $skill->status === 'active'
                        ? '<span class="badge text-bg-success">Active</span>'
                        : '<span class="badge text-bg-danger">Inactive</span>';
                })
                ->addColumn('action', function ($skill) {
                    return '
                        <a href="' . route('technical_skill.edit', $skill->slug) . '" 
                            class="btn btn-warning btn-sm text-white" title="Edit">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="btn btn-dark btn-sm toggle-status-btn" 
                            data-slug="' . $skill->slug . '" data-status="' . $skill->status . '" 
                            title="Change Status">
                            <i class="fa-solid fa-toggle-on"></i>
                        </button>
                        <button class="btn btn-danger btn-sm delete-btn" data-slug="' . $skill->slug . '" title="delete skill"><i class="fa-solid fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.general_settings.technical_skill.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('backend.main_dashboard.general_settings.technical_skill.create');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnicalSkillRequest $request)
    {
        try {
            // Create the skill record
            TechnicalSkill::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('technical_skill.index')->with('success', 'Technical skill has been created successfully!');
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
            $skill = TechnicalSkill::where('slug', $slug)->first();
            if (!$skill) {
                return back()->with('error', 'Technical skill not found!');
            }
            return view('backend.main_dashboard.general_settings.technical_skill.edit', compact('skill'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(TechnicalSkillRequest $request, $slug)
    {
        try {
            // Find the skill by slug
            $skill = TechnicalSkill::where('slug', $slug)->first();
            if (!$skill) {
                return back()->with('error', 'Technical skill not found!');
            }
            $skill->update([
                'name' => $request['name'],
                'status' => $request['status']
            ]);
            return redirect()->route('technical_skill.index')->with('success', 'Technical skill has been updated successfully!');
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
            $skill = TechnicalSkill::where('slug', $slug)->first();

            if (!$skill) {
                return response()->json(['status' => 'error', 'message' => 'Technical skill not found']);
            }

            $skill->delete();

            return response()->json(['status' => 'success', 'message' => 'Technical skill deleted successfully']);
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
            $skill = TechnicalSkill::where('slug', $slug)->firstOrFail();
            $skill->status = $request->status;
            $skill->save();

            return response()->json(['message' => 'Status updated successfully.']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()]);
        }
    }
}
