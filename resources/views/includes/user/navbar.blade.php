<header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light user-settings" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{url('assets/images/users/avatar.png')}}" alt="user-image" class="rounded-circle">
                        <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="width: 250px">

                        <!-- item-->
                        <a href="{{url('dashboard')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span>Dashboard</span>
                        </a>

                        <!-- item-->
                        <a href="{{url('profile')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        @if(Auth::user()->account_type == 3)
                        <!-- item-->
                        <a href="{{url('drive/file/all/view/show')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-server"></i>
                            <span>Switch To <strong>EurekaHost Drive</strong></span>
                        </a>
                        @endif

                        @if(Auth::user()->type == 'admin')
                        <a href="{{url('admin/dashboard')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-shield-account"></i>
                            <span>Go To <strong>Admin Dashboard</strong></span>
                        </a>
                        @endif

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="{{url('logout')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{url('dashboard')}}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <!-- <img src="assets/images/logo.png" alt="" height="22"> -->
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <!-- <img src="assets/images/logo-sm.png" alt="" height="24"> -->
                    </span>
                </a>

                <a href="{{url('dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg" style="font-size: 2em; color: #fff;margin-top: 10px">
                        <img src="/img/logo.png" alt="" height="50">
                        <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                    </span>
                    <span class="logo-sm">
                        <img src="/img/logo.png" alt="" height="30" style="margin-top: 20px">
                        <!-- <span class="logo-lg-text-dark">U</span> -->
                        <!-- <img src="assets/images/logo-sm-light.png" alt="" height="24"> -->
                    </span>
                </a>
            </div>

        </div> <!-- end container-fluid-->
    </div>
    <!-- end Topbar -->

    <div class="topbar-menu" style="display: none;">
        <div class="container-fluid">
            <div id="navigation" class="active">
                <!-- Navigation Menu-->
                <ul class="navigation-menu in">

                    <li class="has-submenu">
                        <a href="{{url('dashboard')}}">
                            <i class="mdi mdi-view-dashboard"></i>Dashboard
                        </a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"> <i class="mdi mdi-flip-horizontal"></i>Settings <div class="arrow-down"></div></a>
                        <ul class="submenu">
                            <li><a href="layouts-topbar-light.html">Topbar Light</a></li>
                            <li><a href="layouts-center-menu.html">Center Menu</a></li>
                            <li><a href="layouts-normal-header.html">Unsticky Header</a></li>
                            <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="{{url('dashboard')}}">
                            <i class="mdi mdi-view-dashboard"></i>FAQ Support
                        </a>
                    </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>
    <!-- end navbar-custom -->

</header>