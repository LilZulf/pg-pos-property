@extends('layouts.auth')

@section('content')
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row justify-content-center g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a class="d-block">
                                                <img src="{{ asset('assets/images/pos-property-logo.png') }}" alt="" height="50">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <h5 class="text" style="color: #c84630">Forgot Password?</h5>
                                    <p class="text-muted">Reset password with velzon</p>

                                    <div class="mt-2 text-center">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#c84630" class="avatar-xl">
                                        </lord-icon>
                                    </div>

                                    <div class="alert border-0 alert-warning text-center mb-2 mx-2" role="alert">
                                        Enter your email and instructions will be sent to you!
                                    </div>
                                    <div class="p-2">
                                        <form>
                                            <div class="mb-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter email address">
                                            </div>

                                            <div class="text-center mt-4">
                                                <button class="btn text-white w-100" type="submit" style="background-color: #c84630">Send Reset Link</button>
                                            </div>
                                        </form><!-- end form -->
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
</div>
@endsection
