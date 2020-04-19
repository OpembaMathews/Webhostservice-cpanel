<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="/img/host-icon.png">

    <!-- App css -->
    <link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{ url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/horizontal.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <link href="{{ url('/css/user.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

    <title>@yield('title', 'EurekaHost')</title>
    <body>
        @include('includes.user.navbar')
        @yield('content')
        @include('includes.user.footer')
        @include('includes.user.footerscripts')
    </body>
</html>
