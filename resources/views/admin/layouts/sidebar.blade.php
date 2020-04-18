<div class="left-side-menu">
    <div class="slimScrollDiv mm-active" style="position: relative; overflow: hidden; width: auto; height: 236.4px;">
        <div class="slimscroll-menu mm-show" style="overflow: hidden; width: auto; height: 236.4px;">

            <!--- Sidemenu -->
            <div id="sidebar-menu" class="mm-active">
                <style type="text/css">
                    .btn-upload{background-color: #e51c4a; border-color: #e51c4a}
                    .btn-upload:hover{color:#fff;background-color:#c51c4a;border-color:#c51c4a}
                    .sidebar-active{background-color: #f5f8fb; color: #2b3d51 !important; font-weight: bold; }
                </style>

                <ul class="metismenu mm-show" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li class="mm-active">
                        <a href="{{url('admin/dashboard')}}" class="{{Request::is('admin/dashboard') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="mm-active">
                        <a href="{{url('admin/customers')}}" class="{{Request::is('admin/customers') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-account-multiple-outline"></i>
                            <span> Customers </span>
                        </a>
                    </li>


                    <li class="mm-active">
                        <a href="{{url('admin/vouchers')}}" class="{{Request::is('admin/vouchers') ? 'sidebar-active' : ''}}">
                            <i class="mdi mdi-barcode-scan"></i>
                            <span> Vouchers</span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>

        <div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 5px; position: absolute; top: -295.962px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 71.6474px;"></div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
    </div>
    <!-- Sidebar -left -->
</div>