<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        try {
            return view('admin.employee.profile.index');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
