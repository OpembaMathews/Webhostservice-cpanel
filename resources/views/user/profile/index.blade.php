@extends('layouts.user')
@section('title', 'EurekaHost | Profile')

@section('content')
    <div class="ui container">
        <div class="main-content">
            @if(Session::has('error'))
            <div class="ui warning message">
                <i class="close icon"></i>
                <div class="header">
                    {{ Session::get('error') }}
                </div>
            </div>
            @endif
            @if(Session::has('message'))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header">
                    {{ Session::get('message') }}
                </div>
            </div>
            @endif
            <div class="ui stackable grid segment">
                <!-- <div class="four wide column">
                    <div class="ui large image">
                        <img style="width:100%" id="profilePic" src="{{ $user->picture_url ? asset($user->picture_url) : asset('img/default_profile_pic.png')}}" alt="Profile Image" />
                    </div>
                    <input id="imageInput" type="file" style="display:none;"/>
                    <button id="cpic" class="ui fluid button">Change Picture</button>
                    <div id="uploadDiv" class="ui mini fluid buttons" style="display: none">
                        <button class="ui button" id="rotateLeft"><i class="undo icon"></i></button>
                        <button class="ui button" id="uploadFile">Upload</button>
                        <button class="ui button" id="uploadCancel">Cancel</button>
                        <button class="ui button" id="rotateRight"><i class="repeat icon"></i></button>
                    </div>
                </div> -->
                <div class="sixteen wide column">
                    <form method="post" method="post" action="{{ url('/profileupdate') }}" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>Profile</h3>
                        <hr>
                        <input type="hidden" name="user_id" value="{{$user->id}}" />
                        <div class="ui form">
                            <div class="inline fields">
                                <div class="sixteen wide field">
                                    <label>Name</label>
                                    <input name="name" type="text" placeholder="Full Name" value="{{ $user->name }}" required/>
                                </div>
                                <!-- <div class="eight wide field">
                                    <input name="lastname" type="text" placeholder="Last Name" value="{{ $user->name }}" required/>
                                </div> -->
                            </div>
                            <div class="inline fields">
                                <div class="sixteen wide field">
                                    <label>Email</label>
                                    <input name="email" type="text" placeholder="Email Address" value="{{ $user->email }}" required/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="ui primary button">Update</button>
                        <button type="reset" class="ui button">Discard</button>
                    </form>
                </div>
            </div>
            <div class="ui segment">
                <h3>Change Password</h3>
                <hr>
                <form method="post" method="post" action="{{ url('/changepassword') }}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                    <div class="ui form">
                        <div class="inline fields">
                            <div class="four wide field">
                                <input name="current-password" type="password" placeholder="Current Password" required/>
                            </div>
                            <div class="four wide field">
                                <input id="p-password" name="password" type="password" placeholder="New Password" required/>
                            </div>
                            <div class="four wide field">
                                <input id="confirm-password" type="password" placeholder="retype Password" required/>
                            </div>
                            <div class="four wide field">
                                <button id="submit-btn" class="ui fluid primary button">Change Password</button>
                            </div>
                        </div>
                        <small id="match-message"></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footerscripts')
    <script type="text/javascript" src='{{ url("js/exif.min.js") }}'></script>
    <script type="text/javascript" src='{{ url("js/croppie.min.js") }}'></script>
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });

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

        //Upload Picture
        $('#cpic').on('click', function(e){
            e.preventDefault();
            $('#imageInput').click();
        });
        var croppieInitialized = false;
        $('#imageInput').on('change', function(){
            $('#profilePic').hide();
            if(!croppieInitialized)
            {
                $uploadCrop = $('#profilePic').croppie({
                    enableExif: true,
                    enableOrientation: true,
                    viewport: {
                        width: 200,
                        height: 200,
                    },
                    boundary: {
                        width: 250,
                        height: 250
                    }
                });
                croppieInitialized = true;
            }

            var reader = new FileReader();
            reader.onload = function(e){
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                })
            }
            reader.readAsDataURL(this.files[0]);
            $('#cpic').hide();
            $('#uploadDiv').show();
        });

        $('#uploadFile').on('click', function(e){
            e.preventDefault();
            console.log("{{ url('pictureupdate') }}");
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                $.ajax({
                    url: "{{ url('pictureupdate') }}",
                    method: "POST",
                    data: {"image":resp, _token: '{{ csrf_token() }}'},
                    success: function (data){
                        $("#profilePic").attr('src', resp);
                        $("#profilePicture").attr('src', resp);
                        $uploadCrop.croppie('destroy');
                        croppieInitialized = false;
                        $('#uploadDiv').hide();
                        $('#profilePic').show();
                        $("#cpic").show();
                    }
                });
            });
        });

        $('#uploadCancel').on('click', function(e){
            e.preventDefault();
            croppieInitialized = false;
            $uploadCrop.croppie('destroy'); 
            $('#uploadDiv').hide();
            $('#profilePic').show();
            $("#cpic").show();
        });

        $('#rotateLeft').on('click', function(e){
            $uploadCrop.croppie('rotate', -90);
        });

        $('#rotateRight').on('click', function(e){
            $uploadCrop.croppie('rotate', 90);
        });
    </script>
@endsection
