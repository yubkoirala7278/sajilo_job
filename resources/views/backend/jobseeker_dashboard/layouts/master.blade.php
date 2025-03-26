<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- header content --}}
    @yield('header-content')
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
    <link rel="stylesheet" href="{{ asset('backend/css/jobseeker/style.css') }}" />
</head>

<body>

    @include('backend.jobseeker_dashboard.layouts.sidebar')

    <!-- Main Content with Header -->
    <div class="content">
        @include('backend.jobseeker_dashboard.layouts.header')

        @yield('contain')

        
    </div>

    {{-- script --}}
    @stack('script')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.querySelector(".sidebar");
            const sidebarToggle = document.getElementById("sidebarToggle");
            const closeSidebar = document.getElementById("closeSidebar");

            // Toggle sidebar on mobile when clicking the hamburger icon
            sidebarToggle.addEventListener("click", function(e) {
                e.preventDefault();
                sidebar.classList.toggle("sidebar-active");
            });

            // Close sidebar when clicking the close (cross) button
            closeSidebar.addEventListener("click", function(e) {
                e.preventDefault();
                sidebar.classList.remove("sidebar-active");
            });

            // Close sidebar when clicking outside (mobile)
            document.addEventListener("click", function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickToggle = sidebarToggle.contains(event.target);
                if (!isClickInsideSidebar && !isClickToggle && window.innerWidth <= 768) {
                    sidebar.classList.remove("sidebar-active");
                }
            });

            // Always remove sidebar-active on window resize so mobile starts closed
            window.addEventListener("resize", function() {
                sidebar.classList.remove("sidebar-active");
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all toggle links and collapse elements
            const toggleLinks = document.querySelectorAll('a[data-bs-toggle="collapse"]');

            toggleLinks.forEach(function(toggleLink) {
                // Get the target collapse element using the href attribute
                const collapseId = toggleLink.getAttribute('href');
                const collapseElement = document.querySelector(collapseId);

                // Ensure initial state is collapsed
                if (!collapseElement.classList.contains('show')) {
                    toggleLink.classList.add('collapsed');
                }

                // Add event listeners for this specific collapse element
                collapseElement.addEventListener('show.bs.collapse', function() {
                    toggleLink.classList.remove('collapsed');
                });

                collapseElement.addEventListener('hide.bs.collapse', function() {
                    toggleLink.classList.add('collapsed');
                });
            });
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
</body>

</html>
