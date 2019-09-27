<div id="sidebar" class="ui left vertical menu visible sidebar">
    <div class="logo-header header">
        EurekaHost
        <!-- <a class="item" href="{{ url('dashboard')}}">
            <img alt="PixlyPro Logo" src="{{ url('img/PixlyPro_Logo.png') }}" />
        </a> -->
    </div>
    <a class="item {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ url('admin/dashboard')}}">
        <i class="tachometer alternate icon"></i> Dashboard
    </a>
    <a class="item {{ Request::is('admin/customers') ? 'active' : '' }}" href="{{ url('admin/customers') }}">
        <i class="chart pie icon"></i> Customers
    </a>
    <!-- <a class="item {{ Request::is('admin/registeruser') ? 'active' : '' }}" href="{{ url('admin/registeruser') }}"> -->
        <i class="chart pie icon"></i> Register User
    <!-- </a> -->
    <a class="item {{ Request::is('admin/vouchers') ? 'active' : '' }}" href="{{ url('admin/vouchers') }}">
        <i class="chart pie icon"></i> Vouchers
    </a>
    <a class="item {{ Request::is('admin/generateVoucher') ? 'active' : '' }}" href="{{ url('admin/generateVoucher') }}">
        <i class="chart pie icon"></i> Generate Vouchers
    </a>
    <!-- <a class="item {{ Request::is('admin/viewUrls') ? 'active' : '' }}" href="{{ url('admin/viewUrls') }}"> -->
        <i class="chart pie icon"></i> Assign Plan
    <!-- </a> -->

    <a class="item" href="{{ url('logout') }}">
        <i class="sign out icon"></i> Sign Out
    </a>
</div>
