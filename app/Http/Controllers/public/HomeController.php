<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        try{
            return view('public.home.index');
        }catch(\Throwable $th){
            return back()->with('error',$th->getMessage());
        }
    }
}
