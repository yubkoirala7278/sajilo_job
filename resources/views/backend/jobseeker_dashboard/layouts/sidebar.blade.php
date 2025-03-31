<!-- Sidebar -->
<div class="sidebar border-end">
    <div class="position-relative">
        <!-- Close button visible on mobile -->
        <button class="btn btn-link close-sidebar d-md-none position-absolute top-0 end-0 m-3" id="closeSidebar">
            <i class="fas fa-times"></i>
        </button>
        <div class="sidebar-profile_image">
            <img src="{{ asset('storage/'.Auth::user()->employee->profile) }}" alt="">
            <h2 class="fs-5 fw-bold mt-2">{{Auth::user()->name}}</h2>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="activelySearchingSwitch">
                <label class="form-check-label" style="font-size: 14px;" for="activelySearchingSwitch">Actively Searching for Job?</label>
            </div>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                    href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house me-1"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center collapsed
                    {{ request()->routeIs('admin.employee.profile', 'admin.employee.profile.update') ? 'active' : '' }}"
                    href="#profileSubmenu1" data-bs-toggle="collapse"
                    aria-expanded="{{ request()->routeIs('admin.employee.profile', 'admin.employee.profile.update') ? 'true' : 'false' }}"
                    aria-controls="profileSubmenu1">
                    <span><i class="fa-regular fa-circle-user me-1"></i> My Profile</span>
                    <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse {{ request()->routeIs('admin.employee.profile', 'admin.employee.profile.update') ? 'show' : '' }}"
                    id="profileSubmenu1">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.profile') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.profile') }}">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.profile.update') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.profile.update') }}">Edit/Update Profile</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center collapsed 
                    {{ request()->routeIs('admin.employee.job.applied', 'admin.employee.interested.jobs', 'admin.employee.rejected.jobs', 'admin.employee.manage.jobs') ? 'active' : '' }}"
                    href="#profileSubmenu2" data-bs-toggle="collapse"
                    aria-expanded="{{ request()->routeIs('admin.employee.job.applied', 'admin.employee.interested.jobs', 'admin.employee.rejected.jobs', 'admin.employee.manage.jobs') ? 'true' : 'false' }}"
                    aria-controls="profileSubmenu2">
                    <span><i class="fa-solid fa-users me-1"></i> Job Search & Application</span>
                    <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse {{ request()->routeIs('admin.employee.job.applied', 'admin.employee.interested.jobs', 'admin.employee.rejected.jobs', 'admin.employee.manage.jobs') ? 'show' : '' }}"
                    id="profileSubmenu2">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.job.applied') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.job.applied') }}">Jobs Applied</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.interested.jobs') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.interested.jobs') }}">Jobs Interested</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.rejected.jobs') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.rejected.jobs') }}">Rejected In</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.manage.jobs') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.manage.jobs') }}">Manage Job</a>
                        </li> --}}
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center collapsed 
                    {{ request()->routeIs('admin.employee.shortlisted.jobs') ? 'active' : '' }}"
                    href="#profileSubmenu3" data-bs-toggle="collapse"
                    aria-expanded="{{ request()->routeIs('admin.employee.shortlisted.jobs') ? 'true' : 'false' }}"
                    aria-controls="profileSubmenu3">
                    <span><i class="fa-solid fa-briefcase me-1"></i> Application & Interview</span>
                    <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse {{ request()->routeIs('admin.employee.shortlisted.jobs','admin.employee.selected.jobs') ? 'show' : '' }}"
                    id="profileSubmenu3">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.shortlisted.jobs') ? 'link-active' : '' }}"
                                href="{{ route('admin.employee.shortlisted.jobs') }}">Shortlisted In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.employee.selected.jobs') ? 'link-active' : '' }}" href="{{route('admin.employee.selected.jobs')}}">Selected In</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.insights') ? 'active' : '' }}" href="#">
                    <i class="fa-solid fa-chart-column me-1"></i> Insights
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}" href="#">
                    <i class="fa-solid fa-gear me-1"></i> Setting
                </a>
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
</div>

<script>
    $(document).ready(function() {
        // Fetch and set initial status
        function loadSearchStatus() {
            $.ajax({
                url: '{{ route("employee.get.searching") }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $('#activelySearchingSwitch').prop('checked', response.is_actively_searching);
                    } else {
                        console.log('Error fetching status:', response.message);
                        $('#activelySearchingSwitch').prop('checked', false); // Default to false on error
                    }
                },
                error: function(xhr) {
                    console.log('AJAX Error:', xhr);
                    $('#activelySearchingSwitch').prop('checked', false); // Default to false on error
                }
            });
        }

        // Load status on page load
        loadSearchStatus();

        // Handle switch toggle
        $('#activelySearchingSwitch').on('change', function() {
            var isChecked = $(this).is(':checked');

            $.ajax({
                url: '{{ route("employee.toggle.searching") }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "is_actively_searching": isChecked
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#activelySearchingSwitch').prop('disabled', true);
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Success!', response.message, 'success');
                        $('#activelySearchingSwitch').prop('checked', response.is_actively_searching);
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                        $('#activelySearchingSwitch').prop('checked', !isChecked); // Revert on error
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Failed to update status', 'error');
                    $('#activelySearchingSwitch').prop('checked', !isChecked); // Revert on error
                    console.log('AJAX Error:', xhr);
                },
                complete: function() {
                    $('#activelySearchingSwitch').prop('disabled', false);
                }
            });
        });
    });
</script>

<style>
    .form-check-input:disabled {
        cursor: not-allowed;
        opacity: 0.6;
    }
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: none;
    }
</style>
