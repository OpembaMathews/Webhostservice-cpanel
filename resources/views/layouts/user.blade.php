<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href='{{ asset("favicon.ico") }}'/>
        <link rel="stylesheet" type="text/css" href='{{ asset("css/semantic.min.css") }}' />
        <link rel="stylesheet" type="text/css" href='{{ asset("css/user.css") }}'/>


        <title>@yield('title', 'EurekaHost')</title>

        @yield('style')

    </head>
    <body class="index pushable" ontouchstart>
        @include('includes.user.sidebar')
        <div class="pusher">
            <div style="min-height:100%;position:relative;" class="ui basic segment">
                @include('includes.user.navbar')

                @yield('content')
                
                @include('includes.user.footer')
            </div>
        </div>
        @include('includes.user.footerscripts')       
    </body>
</html>
