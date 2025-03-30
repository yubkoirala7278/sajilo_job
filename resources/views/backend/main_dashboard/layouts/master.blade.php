<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- sweet alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   {{-- data table css link --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    {{-- toastify css --}}
    @toastifyCss

    @yield('header-content')

</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" id="closeSidebar"><i class="fas fa-times"></i></button>
        <div class="">
            <div class="px-4 pt-2 pb-4">
                <h3 class="text-black fw-bold mb-4"><i class="fas fa-rocket me-2"></i> Logo</h3>
            </div>
            <ul class="nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">
                        <i class="fas fa-home me-2"></i> Dashboard
                    </a>
                </li>
            
                <!-- Employer Management Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs(['admin.employer.management', 'admin.approved.employer.management', 'admin.suspended.employer.management']) ? 'active' : '' }}"
                       href="#employerCollapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="employerCollapse">
                        <i class="fa-solid fa-users-gear me-2"></i> Employer Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['admin.employer.management', 'admin.approved.employer.management', 'admin.suspended.employer.management']) ? 'show' : '' }}" id="employerCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link {{ request()->routeIs('admin.employer.management') ? 'link-active' : '' }}" href="{{ route('admin.employer.management') }}">New Employer/Registrations</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.approved.employer.management') ? 'link-active' : '' }}" href="{{ route('admin.approved.employer.management') }}">Approved Employers</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.suspended.employer.management') ? 'link-active' : '' }}" href="{{ route('admin.suspended.employer.management') }}">Suspended Employers</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.black.listed.employer.management') ? 'link-active' : '' }}" href="{{ route('admin.black.listed.employer.management') }}">Blacklisted Employers</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- Applicants Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs(['job.seeker.management', 'approved.job.seeker', 'rejected.job.seeker']) ? 'active' : '' }}"
                       href="#jobseekerCollapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="jobseekerCollapse">
                        <i class="fas fa-users me-2"></i> JobSeeker Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['job.seeker.management', 'approved.job.seeker', 'rejected.job.seeker']) ? 'show' : '' }}" id="jobseekerCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link {{ request()->routeIs('job.seeker.management') ? 'link-active' : '' }}" href="{{ route('job.seeker.management') }}">New Jobseeker Registration</a></li>
                            <li><a class="nav-link {{ request()->routeIs('approved.job.seeker') ? 'link-active' : '' }}" href="{{ route('approved.job.seeker') }}">Approved Jobseeker</a></li>
                            <li><a class="nav-link {{ request()->routeIs('rejected.job.seeker') ? 'link-active' : '' }}" href="{{ route('rejected.job.seeker') }}">Rejected Jobseeker</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- Jobs Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs(['admin.new.job.management', 'admin.approved.job.management', 'admin.rejected.job.management','admin.all.job.management']) ? 'active' : '' }}" href="#jobCollapse" data-bs-toggle="collapse"
                       aria-expanded="false" aria-controls="jobCollapse">
                        <i class="fas fa-briefcase me-2"></i> Job Listing Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['admin.new.job.management', 'admin.approved.job.management', 'admin.rejected.job.management','admin.all.job.management']) ? 'show' : '' }}" id="jobCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link {{ request()->routeIs('admin.new.job.management') ? 'link-active' : '' }}" href="{{ route('admin.new.job.management') }}">New Job Listing</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.approved.job.management') ? 'link-active' : '' }}" href="{{ route('admin.approved.job.management') }}">Approved Job Listing</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.rejected.job.management') ? 'link-active' : '' }}" href="{{ route('admin.rejected.job.management') }}">Rejected Job Listing</a></li>
                            <li><a class="nav-link {{ request()->routeIs('admin.all.job.management') ? 'link-active' : '' }}" href="{{ route('admin.all.job.management') }}">All Job Listing</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- Subscriptions Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#paymentCollapse" data-bs-toggle="collapse"
                       aria-expanded="false" aria-controls="paymentCollapse">
                        <i class="fas fa-credit-card me-2"></i> Payment & Billing Management
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="paymentCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">Track Employer Subscription</a></li>
                            <li><a class="nav-link" href="#">Generate Invoice & Payment Receipts</a></li>
                            <li><a class="nav-link" href="#">Payment Details</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- System Settings Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#systemCollapse" data-bs-toggle="collapse"
                       aria-expanded="false" aria-controls="systemCollapse">
                        <i class="fa-solid fa-gear me-2"></i> System Settings & Security
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="systemCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">User Role Management</a></li>
                            <li><a class="nav-link" href="#">Email's Notification</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- General Settings Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center {{ request()->routeIs(['job_category.index', 'technical_skill.index', 'job_title.index', 'preferred_industry.index', 'employee_availability.index', 'employee_specialization.index', 'employee_skill.index', 'job_preference_location.index', 'religion.index', 'employee_degree.index', 'employee_course.index', 'organization_nature.index']) ? 'active' : '' }}"
                       href="#generalCollapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="generalCollapse">
                        <i class="fa-solid fa-gears me-2"></i> General Settings
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs(['job_category.index', 'technical_skill.index', 'job_title.index', 'preferred_industry.index', 'employee_availability.index', 'employee_specialization.index', 'employee_skill.index', 'job_preference_location.index', 'religion.index', 'employee_degree.index', 'employee_course.index', 'organization_nature.index']) ? 'show' : '' }}" id="generalCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a href="{{ route('job_category.index') }}" class="nav-link {{ request()->routeIs('job_category.index') ? 'link-active' : '' }}">Job Category</a></li>
                            <li><a href="{{ route('technical_skill.index') }}" class="nav-link {{ request()->routeIs('technical_skill.index') ? 'link-active' : '' }}">Technical Skill</a></li>
                            <li><a href="{{ route('job_title.index') }}" class="nav-link {{ request()->routeIs('job_title.index') ? 'link-active' : '' }}">Job Title</a></li>
                            <li><a href="{{ route('preferred_industry.index') }}" class="nav-link {{ request()->routeIs('preferred_industry.index') ? 'link-active' : '' }}">Job Preferred Industry</a></li>
                            <li><a href="{{ route('employee_availability.index') }}" class="nav-link {{ request()->routeIs('employee_availability.index') ? 'link-active' : '' }}">Employee Availability</a></li>
                            <li><a href="{{ route('employee_specialization.index') }}" class="nav-link {{ request()->routeIs('employee_specialization.index') ? 'link-active' : '' }}">Employee Specialization</a></li>
                            <li><a href="{{ route('employee_skill.index') }}" class="nav-link {{ request()->routeIs('employee_skill.index') ? 'link-active' : '' }}">Employee Skill</a></li>
                            <li><a href="{{ route('job_preference_location.index') }}" class="nav-link {{ request()->routeIs('job_preference_location.index') ? 'link-active' : '' }}">Job Preference Location</a></li>
                            <li><a href="{{ route('religion.index') }}" class="nav-link {{ request()->routeIs('religion.index') ? 'link-active' : '' }}">Religion</a></li>
                            <li><a href="{{ route('employee_degree.index') }}" class="nav-link {{ request()->routeIs('employee_degree.index') ? 'link-active' : '' }}">Employee Degree</a></li>
                            <li><a href="{{ route('employee_course.index') }}" class="nav-link {{ request()->routeIs('employee_course.index') ? 'link-active' : '' }}">Employee Course</a></li>
                            <li><a href="{{ route('organization_nature.index') }}" class="nav-link {{ request()->routeIs('organization_nature.index') ? 'link-active' : '' }}">Organization Nature</a></li>
                        </ul>
                    </div>
                </li>
            
                <!-- Website Accordion -->
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" href="#websiteCollapse" data-bs-toggle="collapse"
                       aria-expanded="false" aria-controls="websiteCollapse">
                        <i class="fa-solid fa-globe me-2"></i> Website
                        <i class="fas fa-chevron-down ms-auto toggle-arrow"></i>
                    </a>
                    <div class="collapse" id="websiteCollapse">
                        <ul class="nav flex-column ms-3">
                            <li><a class="nav-link" href="#">Home Page</a></li>
                            <li><a class="nav-link" href="#">Pages</a></li>
                            <li><a class="nav-link" href="#">Contact</a></li>
                            <li><a class="nav-link" href="#">Header</a></li>
                            <li><a class="nav-link" href="#">Footer</a></li>
                            <li><a class="nav-link" href="#">Other</a></li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
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

        {{-- modal --}}
        @yield('modal')

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    {{-- toastify js --}}
    @toastifyJs


        {{-- data table cdn --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        $('.collapse').on('show.bs.collapse', function() {
            $(this).prev().find('.toggle-arrow').addClass('rotate');
        }).on('hide.bs.collapse', function() {
            $(this).prev().find('.toggle-arrow').removeClass('rotate');
        });
    </script>

    @stack('script')
</body>

</html>
