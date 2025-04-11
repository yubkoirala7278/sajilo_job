<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subscriptions = Subscription::with('employer.user')->latest()->get();
            return DataTables::of($subscriptions)
                ->addColumn('employer', function ($sub) {
                    return $sub->employer->user->name;
                })
                ->addColumn('plan', function ($sub) {
                    return str_replace('_', ' ', ucwords($sub->plan_type));
                })
                ->addColumn('amount', function ($sub) {
                    return '$' . number_format($sub->amount, 2);
                })
                ->addColumn('receipt', function ($sub) {
                    if ($sub->receipt_path) {
                        return '<img src="' . Storage::url($sub->receipt_path) . '" class="receipt-img" style="width: 30px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#receiptModal" data-receipt="' . Storage::url($sub->receipt_path) . '">';
                    }
                    return 'N/A';
                })
                ->addColumn('status', function ($sub) {
                    return ucfirst($sub->payment_status);
                })
                ->addColumn('action', function ($sub) {
                    if ($sub->payment_status === 'pending') {
                        return '
                            <form action="' . route('admin.subscriptions.update', $sub->id) . '" method="POST" class="update-form">
                                ' . csrf_field() . '
                                ' . method_field('PUT') . '
                                <select name="payment_status" class="form-select form-select-sm d-inline w-auto mb-2">
                                    <option value="approved">Approve</option>
                                    <option value="rejected">Reject</option>
                                </select>
                                <textarea name="admin_notes" class="form-control form-control-sm mb-2" placeholder="Notes (optional)" rows="2"></textarea>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>';
                    }
                    return $sub->admin_notes ?? 'N/A';
                })
                ->rawColumns(['receipt', 'action'])
                ->make(true);
        }

        return view('backend.main_dashboard.pages.subscriptions');
    }

    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'payment_status' => 'required|in:approved,rejected',
            'admin_notes' => 'nullable|string|max:500',
        ]);

        if ($request->payment_status === 'approved') {
            $planDurations = [
                '1_month' => 1,
                '3_months' => 3,
                '6_months' => 6,
                '1_year' => 12,
            ];

            $startDate = now();
            $endDate = now()->addMonths($planDurations[$subscription->plan_type]);

            $subscription->update([
                'payment_status' => 'approved',
                'start_date' => $startDate,
                'end_date' => $endDate,
                'admin_notes' => $request->admin_notes,
            ]);

            $subscription->employer->update([
                'is_trial_active' => false,
                'subscription_ends_at' => $endDate,
                'subscription_status' => 'active',
            ]);
        } else {
            $subscription->update([
                'payment_status' => 'rejected',
                'admin_notes' => $request->admin_notes,
            ]);
        }

        return redirect()->back()->with('success', 'Subscription updated successfully.');
    }
}
