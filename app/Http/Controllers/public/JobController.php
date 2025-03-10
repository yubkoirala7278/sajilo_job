<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(){
        try{
            return view('public.job.job_listing');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }

    public function jobDetails(){
        try{
            return view('public.job.job_details');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }

    public function jobSeekers(){
        try{
            return view('public.job.job_seekers');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }

    public function jobSeekerDetail(){
        try{
            return view('public.job.job_seeker_detail');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }
}
