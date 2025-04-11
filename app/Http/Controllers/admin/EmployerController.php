<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployerRequest;
use App\Models\Employer;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $employer = Employer::with('jobCategories')->where('user_id', $user->id)->firstOrFail();
            $categories = JobCategory::where('status', 'active')->orderBy('category', 'asc')->get();

            return view('backend.employer_dashboard.pages.edit_profile', compact('user', 'employer', 'categories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }


    public function update(EmployerRequest $request)
    {
        try {
            $user = Auth::user();

            // Update user details
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            // Find the employer record
            $employer = Employer::where('user_id', $user->id)->first();

            if (!$employer) {
                return back()->with('error', 'Employer not found.');
            }

            // Handle profile logo upload if provided
            if ($request->hasFile('company_logo')) {
                // Delete existing profile logo if it exists
                if ($employer->company_logo) {
                    Storage::disk('public')->delete($employer->company_logo);
                }

                // Store the new profile logo
                $logoPath = $request->file('company_logo')->store('company_logo', 'public');
            } else {
                $logoPath = $employer->company_logo; // Retain old logo if not updated
            }

            // Update employer details
            $employer->update([
                'contact_number' => $request->input('contact_number'),
                'company_website' => $request->input('company_website') ?? null,
                'company_address' => $request->input('company_address'),
                'company_description' => $request->input('company_description'),
                'company_logo' => $logoPath,
            ]);

            // Sync job categories
            $categories = $request->input('categories', []); // Default to empty array if none selected
            $employer->jobCategories()->sync($categories);

            return redirect()->route('admin.employer.profile.show')->with('success','Profile updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show()
    {
        try {
            $user = Auth::user();
            $employer = $user->employer()->with('jobCategories')->firstOrFail(); // Fetch employer with categories
            
            return view('backend.employer_dashboard.pages.show_profile', compact('user', 'employer'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
