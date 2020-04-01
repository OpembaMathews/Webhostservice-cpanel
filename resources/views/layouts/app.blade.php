<html lang="en">
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- App favicon -->
            <!-- <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}"> -->

            <!-- App css -->
            <link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
            <link href="{{ url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />

            <title>@yield('title', 'EurekaHost')</title>
      </head>
      <body>
            <div class="container-fluid">
                <br>
                @yield('content')
            </div>

            <!-- Vendor js -->
            <script src="{{ url('assets/js/vendor.min.js')}}"></script>

            <!-- App js -->
            <script src="{{ url('assets/js/app.min.js')}}"></script>
            @include('includes.user.footerscripts')
      </body>
  </html>
