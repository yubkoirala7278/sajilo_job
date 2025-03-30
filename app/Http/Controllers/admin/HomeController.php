<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        try{
            if(Auth::user()->hasRole('employee')){
                if ($request->ajax()) {
                    $jobs = Job::with('user','category')->where('status','active')->where('is_approved','approved')->latest()->paginate(10); // Paginate 10 jobs per request
                    return response()->json([
                        'jobs' => $jobs->items(), // Current page items
                        'next_page_url' => $jobs->nextPageUrl(), // URL for the next page
                    ]);
                }
            
                $jobs = Job::with('user','category')->where('status','active')->where('is_approved','approved')->latest()->paginate(10); // Initial load: 10 jobs
                return view('backend.jobseeker_dashboard.pages.profile.index', compact('jobs'));
            }else if(Auth::user()->hasRole('employer')){
                return view('backend.employer_dashboard.pages.home');
            }else if(Auth::user()->hasRole('admin')){
                return view('backend.main_dashboard.pages.home');
            }
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }
}
