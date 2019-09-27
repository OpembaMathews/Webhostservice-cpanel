<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href='{{ asset("favicon.ico") }}'/>
        <link rel="stylesheet" type="text/css" href='{{ asset("css/semantic.min.css") }}' />
        <link rel="stylesheet" type="text/css" href='{{ asset("css/user.css") }}'/>


        <title>@yield('title', 'EurekaHost')</title>

        @yield('style')

    </head>
    <body>
        @include('includes.admin.sidebar')
        <div class="pusher">
            <div class="ui basic segment">
                @yield('content')                    
            </div>
        </div>
        @include('includes.admin.footerscripts')       
    </body>
</html>
