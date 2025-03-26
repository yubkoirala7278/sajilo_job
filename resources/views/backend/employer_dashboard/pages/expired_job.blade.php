@extends('backend.employer_dashboard.layouts.master')

@section('header-content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            width: 70px !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 200px !important;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        td {
            white-space: nowrap;
        }
    </style>
@endsection

@section('content')
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #2C3E50">Job Listings</h4>
                        <a href="{{ route('job.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="fa fa-plus me-2"></i>Add New Job
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table job-datatable table-hover w-100" id="jobs-table">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Job Title</th>
                                    <th>Category</th>
                                    <th>Level</th>
                                    <th>Type</th>
                                    <th>Vacancies</th>
                                    <th>Skills</th>
                                    <th>Posted</th>
                                    <th>Expires</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle"></tbody>
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
            var table = $('#jobs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.expired.jobs') }}",
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
                        data: 'no_of_vacancy',
                        name: 'no_of_vacancy'
                    },
                    {
                        data: 'skills',
                        name: 'skills',
                        orderable: false
                    },
                    {
                        data: 'posted_at',
                        name: 'posted_at'
                    },
                    {
                        data: 'expiry_date',
                        name: 'expiry_date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [7, 'desc']
                ],
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    processing: '<i class="fa fa-spinner fa-spin"></i> Loading...'
                }
            });

            // Delete functionality
            $(document).on('click', '.delete-btn', function() {
                var jobSlug = $(this).data('slug');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('job.destroy', ':slug') }}'.replace(':slug',
                                jobSlug),
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'The job has been deleted.',
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON?.error ||
                                    'Failed to delete job',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });

            // Toggle status functionality
            $(document).on('click', '.toggle-status-btn', function() {
                var jobSlug = $(this).data('slug');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'active' ? 'inactive' : 'active';

                Swal.fire({
                    title: 'Change Status',
                    text: `Are you sure you want to change status to ${newStatus}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.job.toggle-status', ':slug') }}'.replace(
                                ':slug', jobSlug),
                            type: 'PATCH',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "status": newStatus
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Success!',
                                    response.message ||
                                    'Job status has been updated.',
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON?.message ||
                                    'Failed to update status',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
