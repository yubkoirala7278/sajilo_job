@extends('backend.main_dashboard.layouts.master')

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
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #2C3E50">Job Listings</h4>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table job-datatable table-hover w-100" id="jobs-table">
                            <thead class="bg-light">
                                <tr style="white-space:nowrap">
                                    <th>#</th>
                                    <th>Company</th>
                                    <th>Job Title</th>
                                    <th>Category</th>
                                    <th>Job Level</th>
                                    <th>Employment Type</th>
                                    <th>Vacancies</th>
                                    <th>Skills</th>
                                    <th>Posted At</th>
                                    <th>Expiry Date</th>
                                    <th>Approval Status</th>
                                    <th>Action</th>
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

@section('modal')
    <!-- Bootstrap 5 Modal for Changing Approval Status -->
    <div class="modal fade" id="changeApprovalModal" tabindex="-1" aria-labelledby="changeApprovalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeApprovalModalLabel">Change Approval Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changeApprovalForm">
                        @csrf
                        <input type="hidden" name="slug" id="approvalJobSlug">
                        <div class="mb-3">
                            <label for="approvalStatus" class="form-label">Approval Status</label>
                            <select class="form-select" id="approvalStatus" name="is_approved">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveApprovalBtn">Save changes</button>
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
                ajax: "{{ route('admin.all.job.management') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'company_name',
                        name: 'company_name'
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
                        data: 'is_approved',
                        name: 'is_approved'
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

            // Populate modal with current data when the button is clicked
            $(document).on('click', '.change-approval-btn', function() {
                var slug = $(this).data('slug');
                var currentStatus = $(this).data('current');

                // Set the slug and current status in the modal
                $('#approvalJobSlug').val(slug);
                $('#approvalStatus').val(currentStatus);
            });

            // Handle save button click in the modal
            $('#saveApprovalBtn').on('click', function() {
                var slug = $('#approvalJobSlug').val();
                var newStatus = $('#approvalStatus').val();

                $.ajax({
                    url: '{{ route('job.update.approval', ':slug') }}'.replace(':slug', slug),
                    type: 'PUT',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "is_approved": newStatus
                    },
                    success: function(response) {
                        Swal.fire('Success!', 'Approval status updated.', 'success');
                        $('#changeApprovalModal').modal('hide'); // Close the modal
                        table.ajax.reload(); // Refresh the DataTable
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseJSON?.error ||
                            'Failed to update approval status', 'error');
                    }
                });
            });
        });
    </script>
@endpush
