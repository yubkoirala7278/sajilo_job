@extends('backend.jobseeker_dashboard.layouts.master')
@section('header-content')
<style>
    tr{
        white-space: nowrap;
    }
</style>
@endsection
@section('contain')
<div class="mt-3 container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">My Applied Jobs</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="applied-jobs-table">
                    <thead class="thead-dark">
                        <tr style="white-space: nowrap">
                            <th>#</th>
                            <th>Job Title</th>
                            <th>Company</th>
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
            $('#applied-jobs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.employee.job.applied") }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false }, // Row number
                    { data: 'job_title', name: 'job_title' },
                    { data: 'company_name', name: 'company_name' },
                    { data: 'category', name: 'category' },
                    { data: 'job_level', name: 'job_level' },
                    { data: 'employment_type', name: 'employment_type' },
                    { data: 'vacancies', name: 'vacancies' },
                    { data: 'location', name: 'location' },
                    { data: 'salary', name: 'salary' },
                    { data: 'posted_at', name: 'posted_at' },
                    { data: 'deadline', name: 'deadline' },
                    { data: 'applied_at', name: 'applied_at' },
                    { data: 'status', name: 'status' },
                ],
                order: [[11, 'desc']], // Default sort by applied_at (column 11) descending
                language: {
                    processing: '<i class="fa fa-spinner fa-spin"></i> Loading...'
                },
                dom: '<"d-flex justify-content-between mb-3"lfr>t<"d-flex justify-content-between"ip>',
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
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
        background: #007bff;
        color: white !important;
    }
</style>
@endsection