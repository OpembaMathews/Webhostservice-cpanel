@extends('layouts.user')
@section('title', 'EurekaHost | Dashboard')

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
            @if(Session::has('status'))
            <div class="ui positive message">
                <i class="close icon"></i>
                <div class="header">
                    {{ Session::get('status') }}
                </div>
            </div>
            @endif

            
            <div class="ui segments">
                <div class="ui segment">
                    <h3>MY HOSTING ACCOUNT</h3>
                </div>

                <div class="ui horizontal segments">
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel" target="_blank">
                            <img href="#" class="cpanel ui middle aligned image" src="/img/cpanel.svg">
                            <span class="cpanelWrapper">CPANEL</span>
                        </a>
                    </div>
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/filemanager" target="_blank" class="file-manager"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/filemanager" target="_blank" class="itemTextWrapper">FILE MANAGER</a>
                    </div>
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/ftp" target="_blank" class="ftp-account"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/ftp" target="_blank" class="itemTextWrapper">FTP ACCOUNTS</a>
                    </div>
                </div>

                <div class="ui fliud horizontal segments">
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/phpmyadmin" target="_blank" class="phpmyadmin"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/phpmyadmin" target="_blank" class="itemTextWrapper">PHPMYADMIN</a>
                    </div>
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/mysql" target="_blank" class="mysql"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/mysql" target="_blank" class="itemTextWrapper">MYSQL</a>
                    </div>
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/domains" target="_blank" class="domain"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/domains" target="_blank" class="itemTextWrapper">DOMAINS</a>
                    </div>
                </div>
                <div class="ui horizontal segments">
                    <div class="ui segment">
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/subdomains" target="_blank" class="subdomain"></a>
                        <a href="https://gsf.websitewelcome.com:2087/xfercpanel/subdomains" target="_blank" class="itemTextWrapper">SUB DOMAINS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerscripts')
    <script type="text/javascript" src="{{ asset('js/notify.min.js') }}"></script>
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
    </script>
@endsection

