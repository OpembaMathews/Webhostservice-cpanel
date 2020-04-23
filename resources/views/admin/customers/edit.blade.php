@include('admin.layouts.header')
    @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter</li>
                                        </ol>
                                    </div> -->
                                    <h4 class="page-title">
                                        <i class="mdi mdi-account-multiple-outline" style="margin: 0 10px 0 3px;"></i>View Customer [ {{$user->name}} ]
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <!-- Table -->
                        <div class="row">
                            <!--  if drive-->
                            <div class="col-3">

                            </div>
                            <div class="col-6">
                                <div class="card-box">
                                    <form>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}"/>

                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input class="form-control" type="text" name="name" placeholder="First Name" value="{{ $user->name }}" disabled="" />
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" name="email" value="{{ $user->email }}" placeholder="Email Address" disabled/>
                                        </div>

                                        <h5 class="mt-5">Subscription:</h5>
                                        <h3 class="tilebox-one">
                                            @if($account_type_number == 1)
                                                <h4 class="text-primary text-uppercase mt-0">{{$account_type}}</h4>
                                                <div>
                                                    <strong class="text-danger mr-1">Validity:</strong> 
                                                    <strong style="font-size: 1.5em">{{$host[0]->host_period}} Years</strong>
                                                </div>

                                                <div>
                                                    <strong class="text-danger mr-1"> Expires:</strong> 
                                                    <strong class="text-muted">{{$expires}}</strong>
                                                </div>
                                            @elseif($account_type_number == 2)
                                                <h4 class="text-primary text-uppercase mt-0">{{$account_type}}</h4>
                                                <div>
                                                    <strong class="text-danger mr-1">Space:</strong> 
                                                    <strong style="font-size: 1.5em">{{$drive_capacity/1000000000}} GB</strong>
                                                </div>
                                            @else
                                                <h4 class="text-primary text-uppercase mt-0">{{$account_type}}</h4>
                                                <div>
                                                    <strong class="text-danger mr-1">Host:</strong> 
                                                    <strong class="mr-5" style="font-size: 1.5em">{{$host[0]->host_period}} Years</strong>
                                                    <strong class="text-danger mr-1">Hosting Expires:</strong> 
                                                    <strong class="text-muted">{{$expires}}</strong>
                                                </div>

                                                <div>
                                                    <strong class="text-danger mr-1">Drive:</strong> 
                                                    <strong style="font-size: 1.5em">{{$drive_capacity/1000000000}} GB</strong>
                                                </div>
                                            @endif
                                        </h3>
                                    </form>
                                </div>
                            </div>

                            <!--  if drive-->
                            <div class="col-3">

                            </div>
                        </div>
                        <!-- -->

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <button class="btn btn-danger btn-block" type="button" data-toggle="modal" data-target=".delete-user-modal" onclick="deleteCustomer(this);">
                                    <strong>Delete Customer</strong>
                                </button>
                            </div>
                            <div class="col-3"></div>
                        </div>
                        
                    </div> 
                    <!-- end container-fluid -->
                </div> 
                <!-- end content -->

                @include('admin.layouts.footer')
            </div>
        </div>

        <!-- confirm delete file -->
        <div class="modal fade delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <style type="text/css">
                .upload-box {
                    border: 2px dashed #e51c4a !important;
                    border-radius: 5px;
                    background: white;
                    min-height: 150px;
                    border: 2px solid rgba(0, 0, 0, 0.3);
                    background: white;
                    padding: 54px 54px;
                }
                .dz-button{ font-weight: bold !important; font-size: 1.5em !important }
            </style>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #2b3d51;">
                        <h5 class="modal-title" style="color: #ffffff !important">Want to delete this customer?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffffff !important">×</button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <div class="response"></div>
                        <form class="delete-user-form">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <h5>All the customer data( e.g files, subscriptions) will deleted and cannot be retrieved.</h5>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn waves-effect waves-light" style="background-color: #e51c4a;" onclick="confirmDeleteCustomer(this);">
                            <strong>Delete</strong>
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

        @include('admin.scripts.index')
        @include('admin.scripts.datatable-js')
        
    </body>
<html>