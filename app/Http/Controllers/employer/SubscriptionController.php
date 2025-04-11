<?php

namespace App\Http\Controllers\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $employer = Auth::user()->employer;
        $subscriptions = $employer->subscriptions()->latest()->get();
        return view('backend.employer_dashboard.pages.subscriptions', compact('employer', 'subscriptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_type' => 'required|in:1_month,3_months,6_months,1_year',
            'receipt' => 'required|file|mimes:jpg,png,pdf,webp|max:2048',
        ]);

        $employer = Auth::user()->employer;
        $planCosts = [
            '1_month' => 50.00,
            '3_months' => 135.00,
            '6_months' => 240.00,
            '1_year' => 420.00,
        ];

        $receiptPath = $request->file('receipt')->store('receipts', 'public');

        Subscription::create([
            'employer_id' => $employer->id,
            'plan_type' => $request->plan_type,
            'amount' => $planCosts[$request->plan_type],
            'receipt_path' => $receiptPath,
            'payment_status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Subscription request submitted. Awaiting admin approval.');
    }
}
