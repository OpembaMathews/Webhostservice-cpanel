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

            
            <div class="ui segment">
                <h3>Eureka!!!</h3>
                <hr/>
                Welcome!!!
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

