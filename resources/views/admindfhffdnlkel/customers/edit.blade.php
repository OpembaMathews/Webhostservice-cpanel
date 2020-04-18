@extends('layouts.admin')
@section('title', 'EurekaHost | Admin Dashboard')

@section('content')
    <h1>Edit User</h1>
    <hr/>
    <div class="ui stackable grid">
        <div class="four wide column"></div>
        <div class="eight wide column">
            @if ($errors->any())
                <div class="ui warning message">
                    <i class="close icon"></i>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
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
    
            <form class="ui form" method="post" action="{{ url('admin/updateuser') }}" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" value="{{ $user->id }}"/>
                <div class="field">
                    <label>First Name</label>
                <input type="text" name="name" placeholder="First Name" value="{{ $user->name }}" required/>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="Email Address" disabled/>
                </div>
                
                <button id="submit-btn" type="submit" class="fluid ui primary large button">Update</button>
            </form>
        </div>
        <div class="four wide column"></div>
    </div>
@endsection

@section('footerscripts')
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
        
        $('.ui .dropdown').dropdown();

    </script>
@endsection
