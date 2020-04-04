@extends('layouts.app')
@section('title', 'EurekaHost | Register')

@section('content')
<div class="account-pages pt-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="account-card-box">
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            
                            <div class="text-center">
                                <div class="my-3">
                                    <a href="index.html">
                                        <!-- <h2>EurekaHost</h2> -->
                                        <span><img src="img/logo-dark.png" alt="" height="50"></span>
                                    </a>
                                </div>
                                <h5 class="text-muted text-uppercase py-3 font-16">Sign up</h5>
                            </div>

                            <div class="response"></div>

                            <form method="post" role="form" class="mt-2 register-form">
                                <div class="form-group mb-3">
                                    <input class="form-control" name="voucher" type="text" required="" placeholder="Type Voucher Code">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="name" type="text" required="" placeholder="Enter your username">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="password" type="password" required="" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup" checked>
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="button" onclick="register(this);"> <strong>Register</strong> </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p>Already have account? <a href="{{ url('login') }}" class="ml-1"><b>Sign In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection
