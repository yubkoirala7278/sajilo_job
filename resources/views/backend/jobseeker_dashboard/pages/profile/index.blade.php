@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
    <!-- Content -->
    <div class="p-4">
        <h1 class="fs-4 fw-bold">Hello, {{ Auth::user()->name }}</h1>
        <p>Here is your daily activities and job alerts</p>

        <div class="row mt-2 g-3">
            <div class="col-md-6 col-xl-3">
                <div class="sky-blue-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">{{ $totalApplied }}</h2>
                            <p class="m-0 mt-1">Total Job Applied</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-primary fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="profile-box sky-red-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">{{ $totalPending }}</h2>
                            <p class="m-0 mt-1">Total Pending Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-warning fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="sky-green-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">{{ $totalShortlisted }}</h2>
                            <p class="m-0 mt-1">Total Shortlisted Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-success fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class=" profile-box" style="background-color: #ffede6">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">{{ $totalRejected }}</h2>
                            <p class="m-0 mt-1">Total Rejected Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-danger fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- <div class="edit-profile-bar mt-4 p-4 rounded-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('backend/img/user-profile/1.jpeg') }}"
                    style="width: 40px;height:40px;clip-path:circle();" alt="">
                <div class="about">
                    <h2 class="fs-5 fw-bold m-0 text-white">Your profile editing is not completed.</h2>
                    <p class="m-0 mt-1  text-white">Complete your profile editing & build your custom Resume
                    </p>
                </div>
            </div>
            <div class="edit-btn">
                <a href="" class="btn btn-light">Edit Profile</a>
            </div>
        </div>
    </div> --}}

        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h5 class="fs-6 fw-bold">Matching Jobs</h5>
                    <a href="" class="text-decoration-none">View All</a>
                </div>

                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table" id="jobs-table">
                            <thead class="light-gray-bg">
                                <tr>
                                    <th class="light-gray-bg" scope="col">Job Title</th>
                                    <th class="light-gray-bg" scope="col">Company</th>
                                    <th class="light-gray-bg" scope="col">Category</th>
                                    <th class="light-gray-bg" scope="col">Level</th>
                                    <th class="light-gray-bg" scope="col">Type</th>
                                    <th class="light-gray-bg" scope="col">Vacancies</th>
                                    <th class="light-gray-bg" scope="col">Location</th>
                                    <th class="light-gray-bg" scope="col">Salary</th>
                                    <th class="light-gray-bg" scope="col">Posted</th>
                                    <th class="light-gray-bg" scope="col">Deadline</th>
                                    <th class="light-gray-bg" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="jobs-tbody">
                                @if ($jobs->count() > 0)
                                    @foreach ($jobs as $job)
                                        <tr style="white-space: nowrap">
                                            <th scope="row">{{ $job->job_title }}</th>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="d-grid place-content-center">
                                                        <img src="{{ $job->company_logo_url }}"
                                                            style="width: 60px; height: 50px;" class="rounded-4"
                                                            alt="Company Logo">
                                                    </div>
                                                    <div class="contain">
                                                        <h5 class="m-0 fs-6 fw-bold">{{ $job->user->name }}</h5>
                                                        <p class="m-0 small-font light-gray-color">
                                                            <i class="fa-solid fa-location-dot me-1"></i>
                                                            {{ $job->job_location }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $job->category ? $job->category->category : '-' }}</td>
                                            <td>{{ $job->job_level }}</td>
                                            <td>{{ $job->employment_type }}</td>
                                            <td>{{ $job->no_of_vacancy }}</td>
                                            <td>{{ $job->job_country }}, {{ $job->job_location }}</td>
                                            <td>{{ $job->is_negotiable ? 'Negotiable' : $job->offered_salary ?? 'Not Specified' }}
                                            </td>
                                            <td>{{ $job->posted_at->format('M d, Y') }}</td>
                                            <td>{{ $job->expiry_date ? $job->expiry_date->format('M d, Y') : 'N/A' }}</td>
                                            <td class="d-flex flex-column gap-1">
                                                @if (!$job->hasApplied)
                                                    @if (!$job->isInterested)
                                                        <button class="btn btn-sm btn-warning d-block interested-btn"
                                                            data-slug="{{ $job->slug }}">Interested</button>
                                                    @else
                                                        <span class="btn btn-sm btn-warning d-block disabled">Already
                                                            Interested</span>
                                                    @endif
                                                    <button class="btn btn-sm btn-primary d-block apply-now-btn"
                                                        data-slug="{{ $job->slug }}">Apply Now</button>
                                                @else
                                                    <span class="btn btn-sm btn-secondary d-block disabled">Already
                                                        Applied</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="11">No jobs to display...</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mt-3">
                        @if ($jobs->hasMorePages())
                            <button id="load-more-btn" class="btn btn-primary"
                                data-next-page="{{ $jobs->nextPageUrl() }}">Load More</button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex justify-content-between">
                    <h5 class="fs-6 fw-bold">Recently Applied</h5>
                    <a href="" class="text-decoration-none">View All</a>
                </div>

                <div class="mt-4">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="light-gray-bg">
                                <tr>
                                    <th class="light-gray-bg" scope="col">Company</th>
                                    <th class="light-gray-bg" scope="col">Job Title</th>
                                    <th class="light-gray-bg" scope="col">Posted At</th>
                                    <th class="light-gray-bg" scope="col">Applied At</th>
                                    <th class="light-gray-bg" scope="col">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($applications->count() > 0)
                                    @foreach ($applications as $application)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="d-grid place-content-center">
                                                        <img src="{{ asset('storage/' . $application->job->user->employer->company_logo) }}"
                                                            style="width: 60px; height: 50px;" class="rounded-4"
                                                            alt="">
                                                    </div>
                                                    <div class="contain">
                                                        <h5 class="m-0 fs-6 fw-bold">
                                                            {{ $application->job->user->name }}
                                                            <span
                                                                class="batch-blue">{{ $application->job->employment_type ===
                                                                'Full
                                                                                                                                                                                    Time'
                                                                    ? 'Remote'
                                                                    : $application->job->employment_type }}</span>
                                                        </h5>
                                                        <p class="m-0 small-font light-gray-color">
                                                            <i class="fa-solid fa-location-dot me-1"></i>
                                                            {{ $application->job->job_location }}
                                                            {{ $application->job->offered_salary ? 'Rs. ' . $application->job->offered_salary : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $application->job->job_title }}</td>
                                            <td>{{ $application->job->posted_at->format('M d, Y') }}</td>
                                            <td>{{ $application->applied_at->format('M d, Y') }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $application->status === 'selected' ? 'bg-success' : ($application->status === 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                                    {{ ucfirst($application->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">You haven’t applied to any jobs yet.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            var nextPageUrl = $('#load-more-btn').data('next-page');

            $('#load-more-btn').on('click', function() {
                if (!nextPageUrl) return;

                $.ajax({
                    url: nextPageUrl,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#load-more-btn').html(
                            '<i class="fa fa-spinner fa-spin"></i> Loading...').prop(
                            'disabled', true);
                    },
                    success: function(response) {
                        var jobs = response.jobs;
                        nextPageUrl = response.next_page_url;

                        if (jobs.length > 0) {
                            jobs.forEach(function(job) {
                                var row = `
                                <tr style="white-space: nowrap">
                                    <th scope="row">${job.job_title}</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="${job.company_logo_url}"
                                                     style="width: 60px; height: 50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">${job.user.name}</h5>
                                                <p class="m-0 small-font light-gray-color">
                                                    <i class="fa-solid fa-location-dot me-1"></i> ${job.job_location}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${job.category ? job.category.category : '-'}</td>
                                    <td>${job.job_level}</td>
                                    <td>${job.employment_type}</td>
                                    <td>${job.no_of_vacancy}</td>
                                    <td>${job.job_country}, ${job.job_location}</td>
                                    <td>${job.is_negotiable ? 'Negotiable' : (job.offered_salary || 'Not Specified')}</td>
                                    <td>${new Date(job.posted_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' })}</td>
                                    <td>${job.expiry_date ? new Date(job.expiry_date).toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' }) : 'N/A'}</td>
                                    <td class="d-flex flex-column gap-1">
                                        ${job.hasApplied ? 
                                            '<span class="btn btn-sm btn-secondary d-block disabled">Already Applied</span>' : 
                                            (job.isInterested ? 
                                                '<span class="btn btn-sm btn-warning d-block disabled">Already Interested</span>' : 
                                                '<button class="btn btn-sm btn-warning d-block interested-btn" data-slug="' + job.slug + '">Interested</button>') +
                                            '<button class="btn btn-sm btn-primary d-block apply-now-btn" data-slug="' + job.slug + '">Apply Now</button>'}
                                    </td>
                                </tr>`;
                                $('#jobs-tbody').append(row);
                            });

                            if (!nextPageUrl) {
                                $('#load-more-btn').remove();
                            } else {
                                $('#load-more-btn').data('next-page', nextPageUrl);
                            }
                        }
                        $('#load-more-btn').html('Load More').prop('disabled', false);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        $('#load-more-btn').html('Load More').prop('disabled', false);
                    }
                });
            });

            // Interested AJAX
            $(document).on('click', '.interested-btn', function(e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var button = $(this);

                Swal.fire({
                    title: 'Mark as Interested?',
                    text: 'Are you sure you want to mark this job as interested?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Mark!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('job.interested', ':slug') }}'.replace(':slug',
                                slug),
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                button.prop('disabled', true).html(
                                    '<i class="fa fa-spinner fa-spin"></i> Marking...'
                                );
                            },
                            success: function(response) {
                                Swal.fire('Success!', response.message, 'success');
                                button.replaceWith(
                                    '<span class="btn btn-sm btn-warning d-block disabled">Already Interested</span>'
                                    );
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.error ||
                                    'Failed to mark as interested', 'error');
                                button.prop('disabled', false).html('Interested');
                            }
                        });
                    }
                });
            });

            // Apply Now AJAX
            $(document).on('click', '.apply-now-btn', function(e) {
                e.preventDefault();
                var slug = $(this).data('slug');
                var button = $(this);

                Swal.fire({
                    title: 'Apply for this job?',
                    text: 'Are you sure you want to apply?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Apply!',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('job.apply', ':slug') }}'.replace(':slug',
                                slug),
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            beforeSend: function() {
                                button.prop('disabled', true).html(
                                    '<i class="fa fa-spinner fa-spin"></i> Applying...'
                                );
                            },
                            success: function(response) {
                                Swal.fire('Success!', response.message, 'success');
                                button.parent().html(
                                    '<span class="btn btn-sm btn-secondary d-block disabled">Already Applied</span>'
                                    );
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.error ||
                                    'Failed to apply', 'error');
                                button.prop('disabled', false).html('Apply Now');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
