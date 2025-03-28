<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        try{
            if(Auth::user()->hasRole('employee')){
                return view('backend.jobseeker_dashboard.pages.profile.index');
            }else if(Auth::user()->hasRole('employer')){
                return view('backend.employer_dashboard.pages.home');
            }
            return view('admin.home.index');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }
}
