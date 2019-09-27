@extends('layouts.admin')
@section('title', 'EurekaHost | Admin Vouchers')

@section('content')
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

    <h1>Vouchers</h1>
    <hr/>
    <table class="ui table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Used</th>
                <th>Generated</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vouchers as $voucher)
            <tr>
                <td>{{ $voucher->id }}</td>
                <td>{{ $voucher->voucher}}</td>
                <td>
                    @if($voucher->active == 1)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{ $voucher->created_at }}</td>
                <td>
                    <a class="ui button" href="{{ url('delete/voucher').'/'.$voucher->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('footerscripts')
    <script>
        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        });
    </script>
@endsection
