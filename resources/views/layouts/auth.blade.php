@include('layouts.partials.main')

<head>
    @include('layouts.partials.title-meta', ['title' => $title])
    @include('layouts.partials.head-css')
</head>

<body>

    <div class="auth-page-wrapper">

        <!-- auth page content -->
        @yield('content')
        <!-- end auth page content -->

        <!-- footer -->
        @include('layouts.footer')
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    @include('layouts.partials.vendor-script')

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>
