<nav class="ui fluid fixed container">
    <!-- Add jumbotron or equivalent here -->
    {{-- <div id="page-header"></div> --}}
    <div class="ui segment">
        <div class="ui secondary  menu">
            <a href="{{url('/')}}" class="{{ Request::is('/') ? 'active' : 'ui' }} item">
                EurekaHost
                <!-- <img style="width: 100px" src="{{ asset('img/PixlyPro_Logo_Black.png') }}" alt="logo" /> -->
            </a>

            <div class="right menu">
                <a class="{{ Request::is('login') ? 'active' : 'ui' }} item" href="{{ url('login') }}">
                    Log In
                </a>
                <a class="{{ Request::is('register') ? 'active' : 'ui' }} item" href="{{ url('register') }}">
                    Register
                </a>
            </div>
        </div>
    </div>
</nav>
