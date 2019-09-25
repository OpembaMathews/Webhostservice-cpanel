<div id="sidebar" class="ui left vertical menu visible sidebar">
    <div class="logo-header header">
        <a class="item" href="{{ url('dashboard')}}">
            EurekaHost
        </a>
    </div>

    <div class="ui accordion">
        <a class="item {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard')}}">
            <i class="tachometer alternate icon"></i> Dashboard
        </a>
        <div class="title item">
            <div class="header"><i class="dropdown icon"></i> Settings</div>
        </div>
        <div class="content">
            <a class="setting-item item {{ Request::is('profile') ? 'active' : '' }}" href="{{ url('profile') }}"><i class="wrench icon"></i> Account</a>
            <a class="setting-item item {{ Request::is('billing') ? 'active' : '' }}" href="{{ url('billing') }}"><i class="money icon"></i> Billing</a>
        </div>
        <a href="#" class="item" target="_blank">
            <i class="question circle icon"></i> FAQ &amp; Support
        </a>

        <a class="item" href="{{ url('logout') }}">
            <i class="sign out icon"></i> Sign Out
        </a>
    </div>
</div>
