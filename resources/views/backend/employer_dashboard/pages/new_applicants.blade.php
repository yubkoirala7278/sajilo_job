@extends('backend.employer_dashboard.layouts.master')

@section('content')
<div class="container mt-3">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">New Applicants</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="new-applicants-table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Applicant Name</th>
                            <th>Job Title</th>
                            <th>Applied At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#new-applicants-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.new.applicants") }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'applicant_name', name: 'applicant_name' },
                    { data: 'job_title', name: 'job_title' },
                    { data: 'applied_at', name: 'applied_at' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[3, 'desc']], // Sort by applied_at
                language: { processing: '<i class="fa fa-spinner fa-spin"></i> Loading...' },
                dom: '<"d-flex justify-content-between mb-3"lfr>t<"d-flex justify-content-between"ip>',
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
            });
        });
    </script>
@endpush

<style>
    .thead-dark { background-color: #343a40; color: white; }
    .table-hover tbody tr:hover { background-color: #f1f5f9; }
    .card { border-radius: 10px; overflow: hidden; }
    .card-header { border-bottom: none; }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #ffc107; color: white !important; }
</style>
@endsection