@extends('backend.main_dashboard.layouts.master')

@section('header-content')
    <style>
        .bg-gradient-primary {
            background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
        }

        .bg-gradient-dark {
            background: linear-gradient(90deg, #343a40 0%, #212529 100%);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table thead th {
            letter-spacing: 0.5px;
            border: 1px solid rgb(193, 193, 193);
            background-color: rgb(222, 222, 222);
        }
        #subscriptionsTable{
            padding-top: 20px !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg ">
                    <div
                        class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center py-3">
                        <h2 class="mb-0 fw-bold">Subscription Reviews</h2>
                        <span class="badge bg-light text-primary fw-normal">3 Total</span>
                    </div>
                    <div class="card-body p-4">
                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- DataTable -->
                        <div class="table-responsive">
                            <table id="subscriptionsTable"
                                class="table table-hover table-bordered align-middle table-striped" style="width: 100%;">
                                <thead class="bg-gradient-dark text-white text-uppercase" style="font-size: 0.9rem;">
                                    <tr>
                                        <th class="py-3 px-4">Employer</th>
                                        <th class="py-3 px-4">Plan</th>
                                        <th class="py-3 px-4">Amount</th>
                                        <th class="py-3 px-4">Receipt</th>
                                        <th class="py-3 px-4">Status</th>
                                        <th class="py-3 px-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptModalLabel">Receipt Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalReceiptImage" src="" alt="Receipt" class="img-fluid" style="max-height: 70vh;">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#subscriptionsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.subscription.management') }}',
                columns: [{
                        data: 'employer',
                        name: 'employer'
                    },
                    {
                        data: 'plan',
                        name: 'plan'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'receipt',
                        name: 'receipt',
                        orderable: false,
                        searchable: false
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
                pageLength: 10,
                responsive: true,
                language: {
                    search: "Filter:",
                    lengthMenu: "Show _MENU_ entries"
                }
            });

            // Handle Receipt Image Click for Modal
            $(document).on('click', '.receipt-img', function() {
                var receiptUrl = $(this).data('receipt');
                $('#modalReceiptImage').attr('src', receiptUrl);
            });
        });
    </script>
@endpush
