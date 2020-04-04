@extends('layouts.app')
@section('title', 'EurekaHost | Log In')

@section('content')
    <!-- <div class="ui fluid container">

    </div>
    <div class="ui container">
        <div class="ui vertically stackable grid">
            <div class="three column row">
                <div class="column"></div>
                <div class="column">

                    @if(Session::has('error'))
                    <div class="ui warning message">
                        <i class="close icon"></i>
                        <div class="header">
                            {{ Session::get('error') }}
                        </div>
                    </div>
                    @endif
                    @if(Session::has('status'))
                    <div class="ui positive message">
                        <i class="close icon"></i>
                        <div class="header">
                            {{ Session::get('status') }}
                        </div>
                    </div>
                    @endif

                    <br>
                    <form class="ui form" method="post" action="{{ url('login') }}" role="form">
                        {{ csrf_field() }}
                        <div class="field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email Address" required/>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required/>
                        </div>
                        <button type="submit" class="fluid ui primary large button">Login</button>
                        <p class="center-item"><a class="center-item" href="{{ route('password.request') }}">Forgot Your Password?</a></p>
                    </form>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </div> -->

    <div class="account-pages pt-5 my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="account-card-box">
                            <div class="card mb-0">
                                <div class="card-body p-4">
                                    
                                    <div class="text-center">
                                        <div class="my-3">
                                            <a href="/">
                                                <!-- <h2>EurekaHost</h2> -->
                                                <span><img src="img/logo-dark.png" alt="" height="50"></span>
                                            </a>
                                        </div>
                                        <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                                    </div>

                                    @if(Session::has('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('status') }}
                                    </div>
                                    @endif

                                    @if(Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ Session::get('error') }}</strong>
                                    </div>
                                    @endif
    
                                    <form method="post" action="{{ url('/login') }}" role="form" class="mt-2">
                                        {{ csrf_field() }}
                                        <div class="form-group mb-3">
                                            <input class="form-control" name="email" type="email" required="" placeholder="Enter your email">
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <input class="form-control" name="password" type="password" required="" placeholder="Enter your password">
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>
    
                                        <div class="form-group text-center">
                                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> <strong>Log In</strong> </button>
                                        </div>

                                        <a href="#" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
    
                                    </form>
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p>Don't have an account? <a href="{{ url('register') }}" class="ml-1"><b>Sign Up</b></a></p>
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

@section('footerscripts')
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
    </script>
@endsection