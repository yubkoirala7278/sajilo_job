@extends('backend.employer_dashboard.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0 mb-4 p-3">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Account & Subscription Management</h2>
                </div>

                <!-- Subscription Status -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Current Subscription</h4>
                        <div class="alert {{ $employer->subscription_status === 'active' ? 'alert-success' : 'alert-warning' }} d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Status: {{ ucfirst($employer->subscription_status) }}</h5>
                                @if ($employer->is_trial_active)
                                    <p class="mb-0">Trial Ends: {{ $employer->trial_ends_at->format('M d, Y') }}</p>
                                @elseif($employer->subscription_ends_at)
                                    <p class="mb-0">Subscription Ends: {{ $employer->subscription_ends_at->format('M d, Y') }}</p>
                                @else
                                    <p class="mb-0">No active subscription. Please subscribe below.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Details -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Payment Information</h4>
                        <div class="row d-flex align-items-center justify-content-between mt-0">
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Bank Name:</strong> Nepal Investment Bank Limited (NIBL)</p>
                                <p class="mb-2"><strong>Account Name:</strong> XYZ Company Pvt. Ltd.</p>
                                <p class="mb-2"><strong>Account Number:</strong> 0123-4567-8901-2345</p>
                                <p class="mb-2"><strong>Branch:</strong> Durbar Marg, Kathmandu</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <p class="mb-2"><strong>Scan to Pay</strong></p>
                                <img src="{{ asset('admin/assets/img/messages-1.jpg') }}" alt="QR Code for Payment" class="img-fluid" style="max-width: 150px; border: 1px solid #ddd; padding: 5px;">
                                <p class="mt-2 text-muted small">Use your mobile banking app to scan this QR code for quick payment.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subscription Form -->
                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Subscribe Now</h4>
                        <form action="{{ route('employer.subscriptions.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-4">
                                <label for="plan_type" class="form-label fw-bold">Choose Your Plan</label>
                                <select name="plan_type" id="plan_type" class="form-select" required>
                                    <option value="1_month" selected>$50 - 1 Month</option>
                                    <option value="3_months">$135 - 3 Months (Save 10%)</option>
                                    <option value="6_months">$240 - 6 Months (Save 20%)</option>
                                    <option value="1_year">$420 - 1 Year (Save 30%)</option>
                                </select>
                                <div class="invalid-feedback">Please select a plan.</div>
                                @if($errors->has('plan_type'))
                                <span class="text-danger">{{ $errors->first('plan_type') }}</span>
                            @endif
                            </div>
                            <div class="mb-4">
                                <label for="receipt" class="form-label fw-bold">Upload Payment Receipt</label>
                                <input type="file" name="receipt" id="receipt" class="form-control" accept="image/*,.pdf" required>
                                <div class="invalid-feedback">Please upload a receipt.</div>
                                @if($errors->has('receipt'))
                                <span class="text-danger">{{ $errors->first('receipt') }}</span>
                            @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Submit Payment</button>
                        </form>
                    </div>
                </div>

                <!-- Subscription History -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title text-primary">Subscription History</h4>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Receipt</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subscriptions as $sub)
                                        <tr>
                                            <td>{{ str_replace('_', ' ', ucwords($sub->plan_type)) }}</td>
                                            <td>${{ number_format($sub->amount, 2) }}</td>
                                            <td>
                                                <span class="badge {{ $sub->payment_status === 'approved' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ ucfirst($sub->payment_status) }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($sub->receipt_path)
                                                    <a href="{{ Storage::url($sub->receipt_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $sub->start_date?->format('M d, Y') ?? 'N/A' }}</td>
                                            <td>{{ $sub->end_date?->format('M d, Y') ?? 'N/A' }}</td>
                                            <td>{{ $sub->admin_notes ?? 'N/A' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">No subscription history available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection