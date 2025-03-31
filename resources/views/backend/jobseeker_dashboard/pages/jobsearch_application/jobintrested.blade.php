@extends('backend.jobseeker_dashboard.layouts.master')

@section('header-content')
<style>
    tr{
        white-space: nowrap;
        vertical-align: middle;
    }
</style>
@endsection

@section('contain')
<div class="container mt-3">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">My Interested Jobs</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-striped" id="interested-jobs-table">
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
                            <th>Interested At</th>
                            <th>Action</th>
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
            $('#interested-jobs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("admin.employee.interested.jobs") }}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'job_title', name: 'job_title' },
                    { data: 'company_name', name: 'company_name' },
                    { data: 'company_logo', name: 'company_logo', orderable: false, searchable: false },
                    { data: 'category', name: 'category' },
                    { data: 'job_level', name: 'job_level' },
                    { data: 'employment_type', name: 'employment_type' },
                    { data: 'vacancies', name: 'vacancies' },
                    { data: 'location', name: 'location' },
                    { data: 'salary', name: 'salary' },
                    { data: 'posted_at', name: 'posted_at' },
                    { data: 'deadline', name: 'deadline' },
                    { data: 'interested_at', name: 'interested_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                order: [[12, 'desc']], // Default sort by interested_at (column 12) descending
                language: {
                    processing: '<i class="fa fa-spinner fa-spin"></i> Loading...'
                },
                dom: '<"d-flex justify-content-between mb-3"lfr>t<"d-flex justify-content-between"ip>',
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                pageLength: 10,
            });

            // Apply Now button handler
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
                            url: '{{ route("job.apply", ":slug") }}'.replace(':slug', slug),
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
                                button.replaceWith('<span class="badge bg-success">Already Applied</span>');
                                $('#interested-jobs-table').DataTable().ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.error || 'Failed to apply', 'error');
                                button.prop('disabled', false).html('Apply Now');
                            }
                        });
                    }
                });
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
        background: #28a745;
        color: white !important;
    }
    .rounded-circle {
        object-fit: cover;
    }
</style>
@endsection