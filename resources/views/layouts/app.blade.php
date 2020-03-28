<html lang="en">
      <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href='{{asset("favicon.ico") }}'/>
            <link rel="stylesheet" type="text/css" href='{{ url("css/semantic.min.css") }}' />
            <link rel="stylesheet" type="text/css" href='{{ url("css/home.css") }}'/>
            <link rel="stylesheet" type="text/css" href="{{url('css/icon.css')}}">
            <link rel="stylesheet" type="text/css" href="{{url('css/campaign.css')}}">

            <title>@yield('title', 'EurekaHost')</title>
      </head>
      <body>

            @include('layouts.header')
            <div class="container-fluid">
                <br>
                @yield('content')
            </div>

            <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
            <script src='{{ url("js/semantic.min.js") }}'></script>
            @yield('footerscripts')
      </body>
  </html>
