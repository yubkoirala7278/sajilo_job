@extends('backend.jobseeker_dashboard.layouts.master')

@section('header-content')
    <style>
        tr {
            white-space: nowrap;
            vertical-align: middle;
        }
    </style>
@endsection

@section('contain')
    <div class="container mt-3">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">My Shortlisted Jobs</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="shortlisted-jobs-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Logo</th>
                                <th>Category</th>
                                <th>Level</th>
                                <th>Type</th>
                                <th>Vacancies</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>Posted At</th>
                                <th>Deadline</th>
                                <th>Applied At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated by DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('#shortlisted-jobs-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('admin.employee.shortlisted.jobs') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'job_title',
                            name: 'job_title'
                        },
                        {
                            data: 'company_name',
                            name: 'company_name'
                        },
                        {
                            data: 'company_logo',
                            name: 'company_logo',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'category',
                            name: 'category'
                        },
                        {
                            data: 'job_level',
                            name: 'job_level'
                        },
                        {
                            data: 'employment_type',
                            name: 'employment_type'
                        },
                        {
                            data: 'vacancies',
                            name: 'vacancies'
                        },
                        {
                            data: 'location',
                            name: 'location'
                        },
                        {
                            data: 'salary',
                            name: 'salary'
                        },
                        {
                            data: 'posted_at',
                            name: 'posted_at'
                        },
                        {
                            data: 'deadline',
                            name: 'deadline'
                        },
                        {
                            data: 'applied_at',
                            name: 'applied_at'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    order: [
                        [12, 'desc']
                    ], // Sort by applied_at descending
                    language: {
                        processing: '<i class="fa fa-spinner fa-spin"></i> Loading...'
                    },
                    dom: '<"d-flex justify-content-between mb-3"lfr>t<"d-flex justify-content-between"ip>',
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"]
                    ],
                    pageLength: 10,
                });
            });
        </script>
    @endpush

    <style>
        .thead-dark {
            background-color: #343a40;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5f9;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            border-bottom: none;
        }

        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 5px;
            padding: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 5px;
            margin: 0 2px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #17a2b8;
            /* Matches bg-info */
            color: white !important;
        }

        .rounded-circle {
            object-fit: cover;
        }
    </style>
@endsection
