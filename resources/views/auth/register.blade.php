@extends('layouts.app')
@section('title', 'EurekaHost | Register')

@section('content')
    <div class="ui fluid container">

    </div>
    <div class="ui container">
        <div class="ui vertically stackable grid">
            <div class="three column row">
                <div class="column"></div>
                <div class="column">
                    @if ($errors->any())
                        <div class="ui warning message">
                            <i class="close icon"></i>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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

                    <h2 class="center-item">Create an Account</h2>
                    <form class="ui form" method="post" action="{{ url('/register') }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="field">
                            <label>Voucher Code</label>
                            <input type="text" name="voucher" placeholder="Voucher Code" required/>
                        </div>
                        <div class="field">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Full Name" required/>
                        </div>
                        <!-- <div class="field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Last Name" required/>
                        </div> -->
                        <div class="field">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email Address" required/>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input id="p-password" type="password" name="password" placeholder="Password" required/>
                        </div>
                        <div class="field">
                            <label>Confirm Password</label>
                            <input id="confirm-password" type="password" placeholder="Confirm Password" required />
                        </div>
                        <small id="match-message"></small>
        
                        <button id="submit-btn" type="submit" class="fluid ui primary large button">Register</button>
                        <p class="center-item">Already Signed up? <a class="center-item" href="{{ url('login') }}">Log in</a> here</p>
                    </form>
                </div>
                <div class="column"></div>
            </div>
        </div>
    </div>
@endsection

@section('footerscripts')
    <script>
        $('#confirm-password').on('keyup', function(){
            var password = $("#p-password").val();
            var confirmPassword = $("#confirm-password").val();

            if(password === confirmPassword && (password != "" && confirmPassword != "")){
                $('#match-message').html('Password Match').css('color', 'green');
                $('#submit-btn').removeAttr("disabled");
            } else if(password != "" && confirmPassword != "") {
                $('#match-message').html('Password Mismatch').css('color', 'red');
                $('#submit-btn').attr("disabled", "disabled");
            }
            else{
                $('#match-message').html('');
                $('#submit-btn').attr("disabled", "disabled");
            }
        });

        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
    </script>
@endsection
