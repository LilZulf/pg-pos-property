@include('layouts.partials.main')


<head>
    @include('layouts.partials.title-meta', ['title' => $title])
    @include('layouts.partials.head-css')
    @stack('style')
</head>

<body>
    @include('sweetalert::alert')
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>

            @include('layouts.footer')
        </div>
    </div>

    @include('layouts.partials.vendor-script')

    @stack('script')

</body>

</html>
