<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployerRequest;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    public function index()
    {
        try {
            $user=Auth::user();
            return view('backend.employer_dashboard.pages.edit_profile',compact('user'));
            
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
                'company_website' => $request->input('company_website')??null,
                'company_address' => $request->input('company_address'),
                'company_description' => $request->input('company_description'),
                'company_logo' => $logoPath,
            ]);
    
            return back()->with('success', 'Employer profile updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
