<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Users / Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Customm css -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('sajilojoblogo37px.png') }}" alt="">
                {{-- <span class="d-none d-lg-block">Sajilo Job</span> --}}
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('admin/assets/img/profile-img.jpg') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            @if (auth()->user() && auth()->user()->hasRole('employee'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.employee.profile') }}">
                        <i class="fas fa-address-card"></i>
                        <span>Employee Profile</span>
                    </a>
                </li>
            @endif

            @if (auth()->user() && auth()->user()->hasRole('employer'))
                {{-- Employer Management --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin.employer.profile') }}">
                        <i class="fas fa-address-card"></i>
                        <span>Edit/Update Profile</span>
                    </a>
                </li>
                {{-- Job Listing Management --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#job-listing-management" data-bs-toggle="collapse"
                        href="#">
                        <i class="fas fa-building"></i><span>Job Listing Management</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="job-listing-management" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('job.create')}}">
                                <i class="bi bi-circle"></i><span>Add New Job</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('job.index')}}">
                                <i class="bi bi-circle"></i><span>Jobs Listed</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.expired.jobs')}}">
                                <i class="bi bi-circle"></i><span>Expired Jobs</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (auth()->user() && auth()->user()->hasRole('admin'))
                {{-- =======employeer management --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#employeer-management" data-bs-toggle="collapse"
                        href="#">
                        <i class="fas fa-building"></i><span>Employer Management</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="employeer-management" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('admin.employer.management') }}">
                                <i class="bi bi-circle"></i><span>New Employer/Registrations</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.approved.employer.management') }}">
                                <i class="bi bi-circle"></i><span>Approved Employers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.rejected.employer.management') }}">
                                <i class="bi bi-circle"></i><span>Rejected Employers</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ========Job Seeker Management========== --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#job-seeker-management" data-bs-toggle="collapse"
                        href="#">
                        <i class="fas fa-user-tie"></i><span>JobSeeker Management</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="job-seeker-management" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('job.seeker.management') }}">
                                <i class="bi bi-circle"></i><span>New Jobseeker Registration</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('approved.job.seeker') }}">
                                <i class="bi bi-circle"></i><span>Approved Jobseeker</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('rejected.job.seeker') }}">
                                <i class="bi bi-circle"></i><span>Rejected Jobseeker</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ========General Settings========== --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#setting" data-bs-toggle="collapse"
                        href="#">
                        <i class="fa-solid fa-wrench"></i><span>General Settings</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="setting" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('job_category.index') }}">
                                <i class="bi bi-circle"></i><span>Job Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('technical_skill.index') }}">
                                <i class="bi bi-circle"></i><span>Technical Skill</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('job_title.index') }}">
                                <i class="bi bi-circle"></i><span>Job Title</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('preferred_industry.index') }}">
                                <i class="bi bi-circle"></i><span>Job Preferred Industry</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee_availability.index') }}">
                                <i class="bi bi-circle"></i><span>Employee Availability</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee_specialization.index') }}">
                                <i class="bi bi-circle"></i><span>Employee Specialization</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee_skill.index') }}">
                                <i class="bi bi-circle"></i><span>Employee Skill</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('job_preference_location.index') }}">
                                <i class="bi bi-circle"></i><span>Job Preference Location</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('religion.index') }}">
                                <i class="bi bi-circle"></i><span>Religion</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee_degree.index') }}">
                                <i class="bi bi-circle"></i><span>Employee Degree</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee_course.index') }}">
                                <i class="bi bi-circle"></i><span>Employee Course</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('organization_nature.index') }}">
                                <i class="bi bi-circle"></i><span>Organization Nature</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- messenger --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('messenger') }}">
                    <i class="fa-solid fa-headset"></i>
                    <span>Chat</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Yubraj Koirala</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="#">Yubraj Koirala</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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



    <!-- custom js -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    @stack('script')
</body>

</html>
