@extends('backend.employer_dashboard.layouts.master')

@section('header-content')
    <style>
        td,
        th {
            white-space: nowrap;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <h1 class="fw-bold fs-3">Hello, {{ Auth::user()->name }}</h1>
        <p>Here is your daily activities and applications</p>
    </div>

    <!-- Stats Cards -->
    <!-- Stat Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4 ">
            <div class="card stat-card bg-primary text-white shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold fs-3 mb-0">{{ $stats['open_jobs'] }}</h5>
                        <p class="mb-0">Open Jobs</p>
                    </div>
                    <i class="fas fa-briefcase fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card stat-card bg-success text-white shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold fs-3 mb-0">{{ $stats['total_applications'] }}</h5>
                        <p class="mb-0">Total Applications</p>
                    </div>
                    <i class="fas fa-file-alt fa-2x"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="card stat-card bg-info text-white shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-bold fs-3 mb-0">{{ $stats['pending_reviews'] }}</h5>
                        <p class="mb-0">Pending Reviews</p>
                    </div>
                    <i class="fas fa-clock fa-2x"></i>
                </div>
            </div>
        </div>
       
    </div>

    <!-- Charts -->
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <!-- Application Trend Chart -->
            <div class="card p-4 mb-4 h-100 pb-0">
                <h5 class="fs-6 fw-bold mb-3">Application Trend (Last 30 Days)</h5>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Application Status Pie Chart -->
            <div class="card p-4 mb-4 h-100 pb-0">
                <h5 class="fs-6 fw-bold mb-3">Applicants by Status</h5>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Applicants Table -->
    <div class="card p-4">
        <h5 class="mb-4 fs-4 fw-bold">New Job Applications</h5>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="light-gray-bg" scope="col">Job Title</th>
                        <th class="light-gray-bg" scope="col">Posted At</th>
                        <th class="light-gray-bg" scope="col">Applicant Name</th>
                        <th class="light-gray-bg" scope="col">Email</th>
                        <th class="light-gray-bg" scope="col">Status</th>
                        <th class="light-gray-bg" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="vertical-align:middle">
                    @if ($applications->count() > 0)
                        @foreach ($applications as $application)
                            <tr style="vertical-align: center;white-space:nowrap">
                                <td>{{ $application->job->job_title }}</td>
                                <td>{{ $application->job->posted_at->format('M d, Y') }}</td>
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->user->email }}</td>
                                <td>
                                    <span
                                        class="badge {{ $application->status === 'selected' ? 'bg-success' : ($application->status === 'rejected' ? 'bg-danger' : ($application->status === 'reviewed' ? 'bg-info' : 'bg-warning')) }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('job.seeker.profile', $application->user->slug) }}"
                                        class="btn btn-success me-2">View Profile</a>
                                    <select class="form-select update-status w-auto" data-id="{{ $application->id }}">
                                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="reviewed"
                                            {{ $application->status === 'reviewed' ? 'selected' : '' }}>
                                            Reviewed</option>
                                        <option value="selected"
                                            {{ $application->status === 'selected' ? 'selected' : '' }}>
                                            Selected</option>
                                        <option value="rejected"
                                            {{ $application->status === 'rejected' ? 'selected' : '' }}>
                                            Rejected</option>
                                        <option value="shortlisted"
                                            {{ $application->status === 'shortlisted' ? 'selected' : '' }}>
                                            Shortlisted</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No applications have been submitted to your jobs yet.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recommended Employees Section -->
    <div class="card p-4 mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fs-4 fw-bold">Recommended Job Seekers</h5>
            <input type="text" class="form-control w-auto" id="employee-search" placeholder="Search Employee...">
        </div>

        <div class="table-responsive">
            <table class="table" id="employees-table">
                <thead class="light-gray-bg">
                    <tr>
                        <th class="light-gray-bg" scope="col">Name</th>
                        <th class="light-gray-bg" scope="col">Email</th>
                        <th class="light-gray-bg" scope="col">Contact Number</th>
                        <th class="light-gray-bg" scope="col">Categories</th>
                        <th class="light-gray-bg" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="employees-tbody" style="vertical-align: middle">
                    @if ($employees->count() > 0)
                        @foreach ($employees as $employee)
                            <tr style="white-space: nowrap">
                                <th scope="row">{{ $employee->user->name }}</th>
                                <td>{{ $employee->user->email }}</td>
                                <td>{{ $employee->contact_number ?? 'N/A' }}</td>
                                <td>
                                    @foreach ($employee->jobCategories as $category)
                                        <span class="badge bg-success me-1">{{ $category->category }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('job.seeker.profile', $employee->user->slug) }}"
                                        class="btn btn-sm btn-primary">View Profile</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="text-center">
                            <td colspan="5">No recommended job seekers found...</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3" id="load-more-container">
            @if ($employees->hasMorePages())
                <button id="load-more-btn" class="btn btn-primary" data-next-page="{{ $employees->nextPageUrl() }}">Load
                    More</button>
            @endif
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Application Trend Chart
        var applicationTrend = @json($applicationTrend);
        var dates = Object.keys(applicationTrend);
        var counts = Object.values(applicationTrend);

        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Applications',
                    data: counts,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4 // Smooth curve
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        },
                        ticks: {
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Applications'
                        },
                        beginAtZero: true
                    }
                }
            }
        });

        // Pie Chart (Application Status)
        var applicationStatus = @json($applicationStatus);
        var statuses = Object.keys(applicationStatus);
        var statusCounts = Object.values(applicationStatus);

        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: statuses.map(status => status.charAt(0).toUpperCase() + status.slice(1)),
                datasets: [{
                    data: statusCounts,
                    backgroundColor: [
                        '#ffc107', // Pending (yellow)
                        '#28a745', // Shortlisted (green)
                        '#dc3545', // Rejected (red)
                        '#007bff' // Selected (blue)
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.update-status').on('change', function() {
                var applicationId = $(this).data('id');
                var newStatus = $(this).val();

                $.ajax({
                    url: '{{ route('application.update.status', ':id') }}'.replace(':id',
                        applicationId),
                    type: 'PUT',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "status": newStatus
                    },
                    success: function(response) {
                        Swal.fire('Success!', 'Application status updated.', 'success');
                        location.reload(); // Refresh to update badge
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseJSON?.error ||
                            'Failed to update status', 'error');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let nextPageUrl = $('#load-more-btn').data('next-page');
            let typingTimer;
            const doneTypingInterval = 500; // Delay in ms before search triggers

            // Search on keyup with debounce
            $('#employee-search').on('keyup', function() {
                clearTimeout(typingTimer);
                let searchTerm = $(this).val().trim();

                typingTimer = setTimeout(function() {
                    searchEmployees(searchTerm);
                }, doneTypingInterval);
            });

            // Load More button
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
                        appendEmployees(response.employees);
                        nextPageUrl = response.next_page_url;
                        if (!nextPageUrl) {
                            $('#load-more-btn').remove();
                        } else {
                            $('#load-more-btn').data('next-page', nextPageUrl);
                        }
                        $('#load-more-btn').html('Load More').prop('disabled', false);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        $('#load-more-btn').html('Load More').prop('disabled', false);
                    }
                });
            });

            // Search function
            function searchEmployees(searchTerm) {
                $.ajax({
                    url: '{{ route('admin.home') }}',
                    type: 'GET',
                    data: {
                        search: searchTerm
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#employees-tbody').html(
                            '<tr><td colspan="5" class="text-center"><i class="fa fa-spinner fa-spin"></i> Searching...</td></tr>'
                        );
                        $('#load-more-container').empty();
                    },
                    success: function(response) {
                        $('#employees-tbody').empty();
                        if (response.employees.length > 0) {
                            appendEmployees(response.employees);
                            nextPageUrl = response.next_page_url;
                            if (nextPageUrl) {
                                $('#load-more-container').html(
                                    `<button id="load-more-btn" class="btn btn-primary" data-next-page="${nextPageUrl}">Load More</button>`
                                );
                            }
                        } else {
                            $('#employees-tbody').html(
                                '<tr class="text-center"><td colspan="5">No matching job seekers found...</td></tr>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr);
                        $('#employees-tbody').html(
                            '<tr class="text-center"><td colspan="5">Error loading employees...</td></tr>'
                        );
                    }
                });
            }

            // Append employees to table
            function appendEmployees(employees) {
                employees.forEach(function(employee) {
                    var categories = employee.job_categories.map(cat =>
                        `<span class="badge bg-success me-1">${cat.category}</span>`).join('');
                    var row = `
                    <tr style="white-space: nowrap">
                        <th scope="row">${employee.user.name}</th>
                        <td>${employee.user.email}</td>
                        <td>${employee.contact_number || 'N/A'}</td>
                        <td>${categories}</td>
                        <td>
                            <a href="".replace(':id', employee.id) 
                               class="btn btn-sm btn-primary">View Profile</a>
                        </td>
                    </tr>`;
                    $('#employees-tbody').append(row);
                });
            }
        });
    </script>
@endpush
