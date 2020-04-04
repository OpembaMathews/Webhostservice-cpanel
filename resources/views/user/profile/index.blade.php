@extends('layouts.user')
@section('title', 'EurekaHost | Profile')

@section('content')
    <div class="wrapper" style="padding-top: 90px">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <!-- <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">General Elements</li>
                                </ol> -->
                            </div>
                            <h4 class="page-title">Profile</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-xl-6">
                                    <h4 class="header-title mb-4">Basic Information</h4>

                                    @if(Session::has('error'))
                                    <div class="alert alert-error">
                                        {{ Session::get('error') }}
                                    </div>
                                    @endif

                                    @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                    @endif

                                    <form method="post" method="post" action="{{ url('/profileupdate') }}" role="form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="name" class="form-control"  value="{{ $user->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" class="form-control" type="text"  value="{{ $user->email }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>

                                <div class="col-xl-6 mt-4 mt-xl-0">

                                    <h4 class="header-title mb-4">Security</h4>

                                    <form method="post" method="post" action="{{ url('/changepassword') }}" role="form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{$user->id}}" />
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <input type="password" name="current-password" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" id="p-password" name="password" class="form-control" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" id="confirm-password" class="form-control" required="">
                                            <small id="match-message"></small>
                                        </div>
                                        <button id="submit-btn" class="btn btn-primary">Update</button>
                                    </form>

                                </div>

                            </div><!-- end row -->


                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->
        </div>
@endsection
