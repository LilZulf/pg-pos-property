@include('layouts.partials.main')

<head>
    @include('layouts.partials.title-meta', ['title' => $title])
    @include('layouts.partials.head-css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    @include('layouts.partials.vendor-script')

    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
