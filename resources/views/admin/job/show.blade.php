@extends('admin.layout.master')

@section('header-content')
    <style>
        .card {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            background: white;
        }
        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 1.5rem;
        }
        .header-title {
            color: #1f2937;
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }
        .section-title {
            color: #374151;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #3b82f6;
            width: fit-content;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }
        .info-label {
            color: #6b7280;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }
        .info-value {
            color: #1f2937;
            font-size: 1rem;
            line-height: 1.5;
        }
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        .skill-tag {
            background: #eff6ff;
            color: #1e40af;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-badge {
            display: inline-flex;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-active {
            background: #dcfce7;
            color: #166534;
        }
        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }
        .btn {
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .btn-primary {
            background: #3b82f6;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background: #2563eb;
        }
        .btn-secondary {
            background: #6b7280;
            color: white;
            border: none;
        }
        .btn-secondary:hover {
            background: #4b5563;
        }
        .breadcrumb {
            background: #f9fafb;
            padding: 1rem;
            border-radius: 8px;
        }
    </style>
@endsection

@section('content')
    <main id="main" class="main py-4">
        <div class="container-fluid">
            <section class="section profile">
                <div class="row mb-4">
                    <div class="col-12">
                        <nav aria-label="breadcrumb" class="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.home') }}" class="text-decoration-none text-primary">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('job.index') }}" class="text-decoration-none text-dark">Jobs</a>
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Job Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="header-title">Job Details: {{ $job->job_title }}</h4>
                                    <a href="{{ route('job.index') }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-arrow-left me-2"></i>Back to Jobs
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="section-title">Basic Information</h5>
                                <div class="info-grid mb-5">
                                    <div class="info-item">
                                        <span class="info-label">Job Title</span>
                                        <span class="info-value">{{ $job->job_title }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Category</span>
                                        <span class="info-value">{{ $job->category->category ?? 'N/A' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Job Level</span>
                                        <span class="info-value">{{ $job->job_level }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Employment Type</span>
                                        <span class="info-value">{{ $job->employment_type }}</span>
                                    </div>
                                </div>

                                <h5 class="section-title">Requirements</h5>
                                <div class="info-grid mb-5">
                                    <div class="info-item">
                                        <span class="info-label">Required Skills</span>
                                        <div class="skills-container">
                                            @if ($job->skills->count() > 0)
                                                @foreach ($job->skills as $skill)
                                                    <span class="skill-tag">{{ $skill->name }}</span>
                                                @endforeach
                                            @else
                                                <span class="info-value">N/A</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Required Degree</span>
                                        <span class="info-value">{{ $job->degree->name ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Experience Required</span>
                                        <span class="info-value">{{ $job->experience_required }}</span>
                                    </div>
                                </div>

                                <h5 class="section-title">Details</h5>
                                <div class="info-grid mb-5">
                                    <div class="info-item">
                                        <span class="info-label">Location</span>
                                        <span class="info-value">{{ $job->job_location }}, {{ $job->job_country }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Vacancies</span>
                                        <span class="info-value">{{ $job->no_of_vacancy }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Salary</span>
                                        <span class="info-value">
                                            {{ $job->offered_salary ?? 'Not specified' }}
                                            @if ($job->is_negotiable)
                                                <span class="skill-tag ms-2">Negotiable</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Expiry Date</span>
                                        <span class="info-value">
                                            {{ $job->expiry_date ? $job->expiry_date->format('Y-m-d') : 'No expiry' }}
                                        </span>
                                    </div>
                                </div>

                                <h5 class="section-title">Description</h5>
                                <div class="info-value mb-5">{!! $job->job_description !!}</div>

                                @if ($job->other_specification)
                                    <h5 class="section-title">Other Specifications</h5>
                                    <div class="info-value mb-5">{!! $job->other_specification !!}</div>
                                @endif

                                <h5 class="section-title">Status</h5>
                                <div class="info-grid mb-5">
                                    <div class="info-item">
                                        <span class="info-label">Current Status</span>
                                        <span class="status-badge {{ $job->status === 'active' ? 'status-active' : 'status-inactive' }}">
                                            {{ ucfirst($job->status) }}
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Posted At</span>
                                        <span class="info-value">{{ $job->posted_at->format('Y-m-d H:i:s') }}</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Views</span>
                                        <span class="info-value">{{ $job->job_views_count }}</span>
                                    </div>
                                </div>

                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="{{ route('job.edit', $job->slug) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-pencil me-2"></i>Edit Job
                                    </a>
                                    <a href="{{ route('job.index') }}" class="btn btn-secondary">
                                        <i class="fa-solid fa-arrow-left me-2"></i>Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection