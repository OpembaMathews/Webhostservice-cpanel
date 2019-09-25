@extends('layouts.app')
@section('title', 'EurekaHost | Log In')

@section('content')
    <div class="ui fluid container">

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

                    <div class="ui positive message">
                        <i class="close icon"></i>
                        <div class="header">
                            NB: If you didn't receive an email with your login details after purchase, please click the 'Forgot Your Password' link below to reset
                        </div>
                    </div>

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
    </div>
@endsection

@section('footerscripts')
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
    </script>
@endsection