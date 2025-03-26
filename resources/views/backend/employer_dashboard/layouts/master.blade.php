<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- data table css link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    {{-- toastify css --}}
    @toastifyCss
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    @yield('header-content')


    <style>
        .chart-container-1 {
            width: 400px;
            margin: 50px auto;
        }

        .legend-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }
    </style>


</head>

<body>
    <!-- resources/views/partials/sidebar.blade.php -->
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" id="closeSidebar"><i class="fas fa-times"></i></button>
        <div class="">
            <div class="px-4 pt-2 pb-4">
                <h3 class="text-black fw-bold mb-4"><i class="fas fa-rocket me-2"></i> Logo</h3>
            </div>
            <ul class="nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.home') }}"><i class="fas fa-home me-2"></i>
                        Dashboard</a>
                </li>

                <!-- Employer Management Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#profileCollapse" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="profileCollapse">
                        <i class="fa-solid fa-users-gear me-2"></i> Profile Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="profileCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="{{ route('admin.employer.profile') }}">Edit/Update Profile</a>
                            </li>
                            <li><a class="nav-link" href="#">Profile URL</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Jobs Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#jobCollapse" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="jobCollapse">
                        <i class="fas fa-briefcase me-2"></i> Job Listing Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="jobCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="{{route('job.create')}}">Add New Job</a></li>
                            <li><a class="nav-link" href="{{route('job.index')}}">Job Listing</a></li>
                            <li><a class="nav-link" href="{{route('admin.expired.jobs')}}">Expired Listing</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Applicants Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#jobseekerCollapse" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="jobseekerCollapse">
                        <i class="fas fa-users me-2"></i> Applicants Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="jobseekerCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">New Applicants</a></li>
                            <li><a class="nav-link" href="#">Selected Applicants</a></li>
                            <li><a class="nav-link" href="#">Rejected Applicants</a></li>
                            <li><a class="nav-link" href="#">All Applicants</a></li>
                        </ul>
                    </div>
                </li>


                <!-- Subscriptions Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#paymentCollapse" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="paymentCollapse">
                        <i class="fas fa-credit-card me-2"></i> Communication & Interview Scheduling
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="paymentCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">Message to Shortlisted Applicants</a></li>
                            <li><a class="nav-link" href="#">Schudule/Manage Interview Appoinment</a></li>
                            <li><a class="nav-link" href="#">Video Interview Integrations</a></li>
                        </ul>
                    </div>
                </li>

                <!-- System Settings Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#systemCollapse" data-bs-toggle="collapse"
                        aria-expanded="false" aria-controls="systemCollapse">
                        <i class="fa-solid fa-gear me-2"></i> Subscription & Payment
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="systemCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">Subscription Status</a></li>
                            <li><a class="nav-link" href="#">Payment History & Invoices</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

    </nav>

    <!-- Main Content -->
    <div class="content" id="content">
        <!-- Top Navbar -->
        <div class="navbar-top mb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <button id="toggleSidebar" class="btn btn-primary d-block d-md-none"><i
                            class="fas fa-bars"></i></button>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <i class="fas fa-bell text-muted"></i>
                    <img src="{{ asset('backend/img/user-profile/1.jpeg') }}" class="rounded-circle"
                        style="width: 40px; height:40px;" alt="User Profile">
                </div>
            </div>
        </div>

        {{-- content --}}
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');

        // Set initial state based on screen size
        if (window.innerWidth > 2100) {
            sidebar.classList.add('open');
            content.classList.add('expanded');
        }

        // Toggle sidebar function
        function toggleSidebar() {
            sidebar.classList.toggle('open');
            content.classList.toggle('expanded');
        }

        // Toggle button event listener (works on all views)
        toggleSidebarBtn.addEventListener('click', toggleSidebar);

        // Close button event listener (mobile only)
        closeSidebarBtn.addEventListener('click', function() {
            sidebar.classList.remove('open');
            content.classList.remove('expanded');
        });
    </script>

    {{-- toastify --}}
    @if (session()->has('success') || session()->has('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (session()->has('success'))
                    toastify().success({!! json_encode(session('success')) !!});
                @endif
                @if (session()->has('error'))
                    toastify().error({!! json_encode(session('error')) !!});
                @endif
            });
        </script>
    @endif

    {{-- data table cdn --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- toastify js --}}
    @toastifyJs

    @stack('script')


    <script>
        $('.collapse').on('show.bs.collapse', function() {
            $(this).prev().find('.toggle-arrow').addClass('rotate');
        }).on('hide.bs.collapse', function() {
            $(this).prev().find('.toggle-arrow').removeClass('rotate');
        });
    </script>

</body>

</html>
