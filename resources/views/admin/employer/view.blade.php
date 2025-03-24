@extends('admin.layout.master')

@section('content')
    <main id="main" class="main">
        <section class="section profile">
            <div class="row">
                <div class="col-12 card p-3">
                    <h1>Employer Details</h1>
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ $employer->name ?? 'N/A' }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Email:</strong> {{ $employer->email ?? 'N/A' }}</p>
                                    <p><strong>Contact Number:</strong> {{ $employer->employer->contact_number ?? 'N/A' }}
                                    </p>
                                    <p><strong>Industry:</strong> {{ $employer->employer->industry ?? 'N/A' }}</p>
                                    <p><strong>Company Website:</strong> {{ $employer->employer->company_website ?? 'N/A' }}
                                    </p>
                                    <p><strong>Company Address:</strong> {{ $employer->employer->company_address ?? 'N/A' }}
                                    </p>
                                    <p><strong>Status:</strong>
                                        <span
                                            class="badge {{ $employer->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($employer->status) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Company Description:</strong>
                                        {{ $employer->employer->company_description ?? 'N/A' }}</p>
                                    <p><strong>Company Logo:</strong></p>
                                    @if ($employer->employer && $employer->employer->company_logo)
                                        <img src="{{ asset('storage/' . $employer->employer->company_logo) }}"
                                            alt="Company Logo" class="img-fluid" style="max-height: 200px;">
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.employer.management') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
