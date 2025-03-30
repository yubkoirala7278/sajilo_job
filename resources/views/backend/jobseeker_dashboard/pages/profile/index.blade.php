@extends('backend.jobseeker_dashboard.layouts.master')
@section('contain')
    <!-- Content -->
    <div class="p-4">
        <h1 class="fs-4 fw-bold">Hello, Ram Sharma</h1>
        <p>Here is your daily activities and job alerts</p>

        <div class="row mt-2 g-3">
            <div class="col-md-6 col-xl-4">
                <div class="sky-blue-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-primary fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="sky-red-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-danger fs-5 p-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="sky-green-box profile-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between ">
                            <h2 class="fs-5 fw-semibold m-0">529</h2>
                            <p class="m-0 mt-1">Applied Job</p>
                        </div>
                        <div class="logo">
                            <i class="fa-solid fa-briefcase bg-white text-success fs-5 p-3"></i>
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
                                                        <img src="{{ asset('storage/'.$job->user->employer->company_logo) }}"
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
                                                <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                                <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
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

                    <!-- Load More Button -->
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
                                    <th class="light-gray-bg" scope="col">Job</th>
                                    <th class="light-gray-bg" scope="col">Date Applied</th>
                                    <th class="light-gray-bg" scope="col">Status</th>
                                    <th class="light-gray-bg" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="d-grid place-content-center">
                                                <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
                                                    style="width: 60px;height:50px;" class="rounded-4" alt="">
                                            </div>
                                            <div class="contain">
                                                <h5 class="m-0 fs-6 fw-bold">Networking Engineer <span
                                                        class="batch-blue">Remote</span> </h5>
                                                <p class="m-0 small-font light-gray-color"><i
                                                        class="fa-solid fa-location-dot me-1"></i> Kathmandu Rs. 12,000</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        March 12, 2025
                                    </td>
                                    <th scope="row" class="text-success"><i class="fa-solid fa-check me-1"></i> Active
                                    </th>
                                    <td class="d-flex flex-column gap-1">
                                        <a href="#" class="btn btn-primary d-block">Apply Now</a>
                                    </td>
                                </tr>

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
                        $('#load-more-btn').html('<i class="fa fa-spinner fa-spin"></i> Loading...').prop('disabled', true);
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
                                                    <img src="{{ asset('backend/img/jobs/techskill.jpeg') }}"
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
                                            <a href="#" class="btn btn-sm btn-warning d-block">Interested</a>
                                            <a href="#" class="btn btn-sm btn-primary d-block">Apply Now</a>
                                        </td>
                                    </tr>`;
                                $('#jobs-tbody').append(row);
                            });

                            if (!nextPageUrl) {
                                $('#load-more-btn').remove(); // Remove button if no more pages
                            } else {
                                $('#load-more-btn').data('next-page', nextPageUrl); // Update next page URL
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
        });
    </script>
@endpush
