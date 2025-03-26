@extends('backend.employer_dashboard.layouts.master')

@section('header-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }
        .card-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 2rem;
        }
        .header-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
        }
        .section-title {
            color: #1f2937;
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            position: relative;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #4f46e5;
            border-radius: 2px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        .info-item {
            background: #f8fafc;
            padding: 1rem;
            border-radius: 8px;
            transition: transform 0.2s ease;
        }
        .info-item:hover {
            transform: translateY(-2px);
        }
        .info-label {
            color: #6b7280;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .info-value {
            color: #1f2937;
            font-size: 1rem;
            font-weight: 500;
            margin-top: 0.25rem;
        }
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }
        .skill-tag {
            background: #e0e7ff;
            color: #4f46e5;
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .skill-tag:hover {
            background: #c7d2fe;
        }
        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .description-box {
            background: #f8fafc;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-primary {
            background: #4f46e5;
        }
        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: #6b7280;
        }
        .btn-secondary:hover {
            background: #4b5563;
            transform: translateY(-2px);
        }
    </style>
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title">
                                <i class="fas fa-briefcase me-2"></i>
                                {{ $job->job_title }}
                            </h4>
                            <a href="{{ route('job.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left me-2"></i>Back to Jobs
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <h5 class="section-title">Basic Information</h5>
                        <div class="info-grid mb-5">
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-tag me-2"></i>Job Title</span>
                                <span class="info-value">{{ $job->job_title }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-folder me-2"></i>Category</span>
                                <span class="info-value">{{ $job->category->category ?? 'N/A' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-level-up-alt me-2"></i>Job Level</span>
                                <span class="info-value">{{ $job->job_level }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-clock me-2"></i>Type</span>
                                <span class="info-value">{{ $job->employment_type }}</span>
                            </div>
                        </div>

                        <h5 class="section-title">Requirements</h5>
                        <div class="info-grid mb-5">
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-tools me-2"></i>Skills</span>
                                <div class="skills-container">
                                    @if ($job->skills->count() > 0)
                                        @foreach ($job->skills as $skill)
                                            <span class="skill-tag">{{ $skill->name }}</span>
                                        @endforeach
                                    @else
                                        <span class="info-value">Not specified</span>
                                    @endif
                                </div>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-graduation-cap me-2"></i>Degree</span>
                                <span class="info-value">{{ $job->degree->name ?? 'Not specified' }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-hourglass-start me-2"></i>Experience</span>
                                <span class="info-value">{{ $job->experience_required }}</span>
                            </div>
                        </div>

                        <h5 class="section-title">Details</h5>
                        <div class="info-grid mb-5">
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Location</span>
                                <span class="info-value">{{ $job->job_location }}, {{ $job->job_country }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-users me-2"></i>Vacancies</span>
                                <span class="info-value">{{ $job->no_of_vacancy }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-money-bill-wave me-2"></i>Salary</span>
                                <span class="info-value">
                                    {{ $job->offered_salary ?? 'Not specified' }}
                                    @if ($job->is_negotiable)
                                        <span class="skill-tag ms-2">Negotiable</span>
                                    @endif
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-calendar-times me-2"></i>Expiry</span>
                                <span class="info-value">
                                    {{ $job->expiry_date ? $job->expiry_date->format('M d, Y') : 'No expiry' }}
                                </span>
                            </div>
                        </div>

                        <h5 class="section-title">Job Description</h5>
                        <div class="description-box">{!! $job->job_description !!}</div>

                        @if ($job->other_specification)
                            <h5 class="section-title">Additional Specifications</h5>
                            <div class="description-box">{!! $job->other_specification !!}</div>
                        @endif

                        <h5 class="section-title">Status</h5>
                        <div class="info-grid mb-5">
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-signal me-2"></i>Status</span>
                                <span class="status-badge {{ $job->status === 'active' ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-calendar-plus me-2"></i>Posted</span>
                                <span class="info-value">{{ $job->posted_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label"><i class="fas fa-eye me-2"></i>Views</span>
                                <span class="info-value">{{ $job->job_views_count }}</span>
                            </div>
                        </div>

                        <div class="d-flex gap-3 justify-content-end">
                            <a href="{{ route('job.edit', $job->slug) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>Edit Job
                            </a>
                            <a href="{{ route('job.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection