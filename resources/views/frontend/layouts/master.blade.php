<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    @yield('customcss')
    @vite('resources/css/app.css')
</head>

<body>

    @include('frontend.layouts.header')

    <div class="main-wrapper">
        @yield('content')
    </div>

    @include('frontend.layouts.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>

    @stack('customjs')

</body>

</html>
