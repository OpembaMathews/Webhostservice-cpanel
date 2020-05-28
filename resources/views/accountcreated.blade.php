@extends('layouts.user')
@section('title', 'EurekaHost | Dashboard')

@section('content')
<div class="wrapper" style="padding-top: 90px">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">My Hosting Account</li>
                        </ol>
                    </div> -->
                    <h4 class="page-title">
                        <strong>My Hosting Account</strong>

                        <small class="float-right">
                            <strong style="color: #343a40">Expiry Date: </strong>
                            <strong style="color: #ff5d48">{{$expires}}</strong>
                        </small>

                        <small class="float-right mr-4">
                            <strong style="color: #343a40">Subscription: </strong>
                            <strong style="color: #64b0f2">{{$plan->host_period}} Years</strong>
                        </small>
                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        
        <div class="row">
            <div class="col-12">

                <div class="alert alert-success">
                    <strong>Success!</strong> Account Created Successifully!!!!!
                  </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/home">
                        <button type="button" class="btn btn-success btn-block">Go Home</button>
                    </a>
                </div>
                
            </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-rocket float-right text-muted"></i> -->
                    <img src="/img/cpanel.svg" class="float-right cpanel mt-4">
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/" target="_blank">
                            <span data-plugin="counterup">CPANEL</span>
                        </a>
                    </h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-chart float-right text-muted"></i> -->
                    <span class="file-manager float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/filemanager" target="_blank">
                            <span data-plugin="counterup">FILE MANAGER</span>
                        </a>
                    </h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-layers float-right text-muted"></i> -->
                    <span class="ftp-account float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/ftp" target="_blank">
                            <span data-plugin="counterup">FTP ACCOUNTS</span>
                        </a>
                    </h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-paypal float-right text-muted"></i> -->
                    <span class="phpmyadmin float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/phpmyadmin" target="_blank">
                            <span data-plugin="counterup">PHPMYADMIN</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-rocket float-right text-muted"></i> -->
                    <span class="mysql float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/mysql" target="_blank">
                            <span data-plugin="counterup">MYSQL</span>
                        </a>
                    </h3>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-chart float-right text-muted"></i> -->
                    <span class="domain float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/domains" target="_blank">
                            <span data-plugin="counterup">DOMAIN</span>
                        </a>
                    </h3>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card-box tilebox-two">
                    <!-- <i class="icon-layers float-right text-muted"></i> -->
                    <span class="subdomain float-right mt-3"></span>
                    <h6 class="text-uppercase">
                        <span class="text-success" style="background-color: #1bb99a!important">PRODUCT</span>
                    </h6>
                    <h3>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/subdomains" target="_blank">
                            <span data-plugin="counterup">SUBDOMAIN</span>
                        </a>
                    </h3>
                </div>
            </div>
        </div>

    </div> <!-- end container-fluid -->
</div>
@endsection
