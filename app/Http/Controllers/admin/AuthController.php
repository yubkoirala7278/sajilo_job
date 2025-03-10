<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\JobCategory;
use App\Models\JobTitle;
use App\Models\TechnicalSkill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function employeeRegister()
    {
        try {
            $jobCategories = JobCategory::orderBy('category', 'asc')->get();
            return view('public.auth.register', compact('jobCategories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function register(EmployeeRequest $request)
    {
        DB::beginTransaction();
        try {
            // Create User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // Assign Role
            $user->assignRole('employee');

            // Create Employee
            Employee::create([
                'mobile_no' => $request->mobile_no,
                'job_categories_id' => $request->jobCategory
            ]);

            // Commit the transaction if everything is successful
            DB::commit();

            return redirect()->route('employee.details')->with('success', 'Account has been created successfully!');
        } catch (\Throwable $th) {
            // Rollback the transaction if any error occurs
            DB::rollBack();

            return back()->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function employeeDetails(){
        try{
            $technicalSkills = TechnicalSkill::orderBy('name', 'asc')->get();
            $jobTitles = JobTitle::orderBy('name', 'asc')->get();
            return view('public.auth.employee_details',compact('technicalSkills','jobTitles'));
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage());
        }
    }

    public function storeEmployeeDetails(Request $request){
        try{
            return redirect()->route('job.seeker.overview')->with('success','Employee details stored successfully!');
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage()); 
        }
    }

    public function jobSeekerOverview(){
        try{
            return view('public.auth.job_seeker_overview');
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage());
        }
    }

    public function employeeProfile(){
        try{
            return view('public.auth.employee_profile');
        }catch(\Throwable $th){
            return back()->with('error', $th->getMessage());
        }
    }
}
