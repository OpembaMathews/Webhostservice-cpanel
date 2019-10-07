@extends('layouts.user')
@section('title', 'EurekaHost | Billing')

@section('style')
    <style>
        ul{
            padding: 0;
            list-style-type: none;
            width: 70%;
            margin: 0px auto;
        }
        
        li{
            border-top: 2px solid black;
            padding: 3px;
        }

        .ui.secondary.pointing.menu a:first-child {
            margin-left: auto;
        }

        .ui.secondary.pointing.menu a:last-child {
            margin-right: auto;
        }
        .ui.secondary.pointing.menu{
            border-bottom: none;
        }

        #monthly_tab, #yearly_tab{
            color: black;
        }

        #monthly_tab.active, #yearly_tab.active{
            background: #17A6CC;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
@endsection

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
            
            <div class="ui vertical segment">
                <h2>Billing</h2>
            </div>
            <br/>
            <!-- <div class="ui pointing secondary menu">
                <a id="monthly_tab" class="item {{ $current_plan == 'free' || $current_plan == 'basic_monthly' || $current_plan == 'pro_monthly' || $current_plan == 'agency_monthly' ? 'active' : '' }}" data-tab="monthly">MONTHLY</a>
                <a id="yearly_tab" class="item {{ $current_plan == 'basic_yearly' || $current_plan == 'pro_yearly' || $current_plan == 'agency_yearly' ? 'active' : '' }}" data-tab="yearly">YEARLY</a>
            </div> -->
            {{-- Monthly Subscription --}}
            <!-- <div class="ui stackable grid tab {{ $current_plan == 'free' || $current_plan == 'basic_monthly' || $current_plan == 'pro_monthly' || $current_plan == 'agency_monthly' ? 'active' : '' }}" data-tab="monthly">
                <div class="four column stretched row" >
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Free</h2>
                            <h1 style="color: #17A6CC;">$0.00</h1>
                            <div>                      
                                <ul>
                                    <li>1,000 Clicks</li>
                                    <li>1 Subaccount</li>
                                    <li>No Image CTA</li>
                                    <li>No Form CTA</li>
                                    <li>No Theme</li>
                                    <li>No Extension</li>
                                    <li>1 Pixel</li>
                                    <li>No UTM Builder</li>
                                </ul>
                            </div>
                            @if($current_plan == 'free')
                            <h2>Current Plan</h2>
                            @endif
                        </div>
                    </div>
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Basic</h2>
                            <h1 style="color: #17A6CC;">$19.00 / Month</h1>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>5,000 Clicks</li>
                                    </ul>
                                </div>
                                
                                @if($current_plan == 'free')
                                <button class="ui primary button" id="basicMonthlyButton">Upgrade</button>
                                @elseif($current_plan == 'basic_monthly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="basicMonthlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Pro</h2>
                            <h1 style="color: #17A6CC;">$49.00 / Month</h1>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>50,000 Clicks</li>
                                        <li>Remove Logo</li>
                                    </ul>
                                </div>

                                @if($current_plan == 'free' || $current_plan == 'basic_monthly' || $current_plan == 'basic_yearly')
                                <button class="ui subscribe primary button" id="proMonthlyButton">Upgrade</button>
                                @elseif($current_plan == 'pro_monthly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="proMonthlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Agency</h2>
                            <h1 style="color: #17A6CC;">$119.00 / Month</h1>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>250,000 Clicks</li>
                                        <li>Remove Logo</li>
                                        <li>Phone Support</li>
                                        <li>Setup Assistance</li>
                                    </ul>
                                </div>

                                @if($current_plan == 'free' || $current_plan == 'basic_monthly' || $current_plan == 'pro_monthly' || $current_plan == 'basic_yearly' || $current_plan == 'pro_yearly')
                                <button class="ui subscribe primary button" id="agencyMonthlyButton">Upgrade</button>
                                @elseif($current_plan == 'agency_monthly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="agencyMonthlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            {{-- Annualy Subscription --}}
            <!-- <div class="ui stackable grid tab {{ $current_plan == 'basic_yearly' || $current_plan == 'pro_yearly' || $current_plan == 'agency_yearly' ? 'active' : '' }}" data-tab="yearly">
                <div class="three column stretched row" >
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Basic</h2>
                            <h1 style="color: #17A6CC;">$14.00 / Month</h1>
                            <h4 style="color: #17A6CC;">Total:  $168 (paid annually)</h4>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>5,000 Clicks</li>
                                    </ul>
                                </div>
                                
                                @if($current_plan == 'free' || $current_plan == 'basic_monthly')
                                <button class="ui subscribe primary button" id="basicYearlyButton">Upgrade</button>
                                @elseif($current_plan == 'basic_yearly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="basicYearlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Pro</h2>
                            <h1 style="color: #17A6CC;">$39.00 / Month</h1>
                            <h4 style="color: #17A6CC;">Total:  $468 (paid annually)</h4>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>50,000 Clicks</li>
                                        <li>Remove Logo</li>
                                    </ul>
                                </div>

                                @if($current_plan == 'free' || $current_plan == 'basic_yearly' || $current_plan == 'basic_monthly' || $current_plan == 'pro_monthly')
                                <button class="ui subscribe primary button" id="proYearlyButton">Upgrade</button>
                                @elseif($current_plan == 'pro_yearly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="proYearlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="column" style="text-align: center;">
                        <div class="ui raised segment">
                            <h2>Agency</h2>
                            <h1 style="color: #17A6CC;">$89.00 / Month</h1>
                            <h4 style="color: #17A6CC;">Total:  $1068 (paid annually)</h4>
                            <div>
                                <div>                      
                                    <ul>
                                        <li>250,000 Clicks</li>
                                        <li>Remove Logo</li>
                                        <li>Phone Support</li>
                                        <li>Setup Assistance</li>
                                    </ul>
                                </div>

                                @if($current_plan == 'free' || $current_plan == 'basic_yearly' || $current_plan == 'pro_yearly' || $current_plan == 'basic_monthly' || $current_plan == 'pro_monthly' || $current_plan == 'agency_monthly')
                                <button class="ui subscribe primary button" id="agencyYearlyButton">Upgrade</button>
                                @elseif($current_plan == 'agency_yearly')
                                <h2>Current Plan</h2>
                                @else
                                <button class="ui subscribe primary button" id="agencyYearlyButton">Downgrade</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="ui segment">
                <h3>Billing History</h3>
                <hr/>
                @if(!$invoices->isEmpty())
                <table class="ui stackable striped table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount Charged</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td><a href="/invoice/{{ $invoice->id }}"><i data-content="Download Invoice" class="download icon"></i></a></td>
                        </tr>
                        @endforeach
                    <tbody>
                </table>
                @else
                <div class="ui message">
                    You have no billing history
                </div>
                @endif
            </div>
            <!-- <div class="ui segment">
                <a href="{{ url('cancel_subscription') }}" id="cancel_sub_link" style="font-size: 13px;">Cancel My Subscription</a>
            </div> -->
        </div>
    </div>
@endsection

@section('footerscripts')
    <script type="text/javascript" src="{{ url("js/notify.min.js") }}"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>

    <script>
        $('i').popup();
        $('.menu .item').tab();

        var handler = StripeCheckout.configure({
            key: "{{\Config::get('app.stripe_key')}}",
            image: 'https://pixlypro.com/img/PixlyPro_Icon.png',
            locale: 'auto',
        });

        let last_four = '{{ $user->card_last_four }}';
        
        if ($('#basicMonthlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('basicMonthlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Basic Monthly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#basicMonthlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "basic_monthly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#basicMonthlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();

                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('basicMonthlyButton').addEventListener('click', function(e) {
                    e.preventDefault();
                    $("#basicMonthlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "basic_monthly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#basicMonthlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }

        if ($('#proMonthlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('proMonthlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Pro Monthly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#proMonthlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "pro_monthly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#proMonthlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();
                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('proMonthlyButton').addEventListener('click', function(e) {
                    e.preventDefault();
                    $("#proMonthlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "pro_monthly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#proMonthlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }
        
        if ($('#agencyMonthlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('agencyMonthlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Agency Monthly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#agencyMonthlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "agency_monthly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#agencyMonthlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();
                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('agencyMonthlyButton').addEventListener('click', function(e) {
                    $("#agencyMonthlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "agency_monthly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#agencyMonthlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }

        if ($('#basicYearlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('basicYearlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Basic Yearly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#basicYearlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "basic_yearly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#basicYearlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();

                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('basicYearlyButton').addEventListener('click', function(e) {
                    e.preventDefault();
                    $("#basicYearlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "basic_yearly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#basicYearlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }

        if ($('#proYearlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('proYearlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Pro Yearly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#proYearlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "pro_yearly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#proYearlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();
                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('proYearlyButton').addEventListener('click', function(e) {
                    e.preventDefault();
                    $("#proYearlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "pro_yearly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#proYearlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }

        if ($('#agencyYearlyButton').length > 0) {
            if(last_four == '')
            {
                document.getElementById('agencyYearlyButton').addEventListener('click', function(e) {
                // Open Checkout with further options:
                    handler.open({
                        name: 'PixlyPro',
                        description: 'Agency Yearly',
                        panelLabel: 'Subscribe',
                        email: "{{ $user->email }}",
                        token: function(token) {
                            // You can access the token ID with `token.id`.
                            // Get the token ID to your server-side code for use.
                            $("#agencyYearlyButton").addClass("loading");
                            $('.subscribe').prop('disabled', true);

                            $.ajax({
                                url: '{{ url("subscribe_process") }}',
                                method: 'POST',
                                data: { token: token.id, plan: "agency_yearly" },
                                headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                                success: function(data){
                                    $("#agencyYearlyButton").removeClass("loading");
                                    $('.subscribe').prop('disabled', false);
                                    $.notify(data, 'success');
                                    location.reload();
                                },
                                error: function(data){
                                    console.log("An error occurred");
                                }
                            });
                        }
                    });
                    e.preventDefault();
                });
            }
            else
            {
                document.getElementById('agencyYearlyButton').addEventListener('click', function(e) {
                    e.preventDefault();
                    $("#agencyYearlyButton").addClass("loading");
                    $('.subscribe').prop('disabled', true);

                    $.ajax({
                        url: '{{ url("subscribe_process") }}',
                        method: 'POST',
                        data: { plan: "agency_yearly" },
                        headers: {'X-CSRF-Token': '{{ csrf_token() }}'},
                        success: function(data){
                            $("#agencyYearlyButton").removeClass("loading");
                            $('.subscribe').prop('disabled', false);
                            $.notify(data, 'success');
                            location.reload();
                        },
                        error: function(data){
                            console.log("An error occurred");
                        }
                    });
                });
            }
        }
        
        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
            handler.close();
        });

        $('#cancel_sub_link').on('click', function(e){
            e.preventDefault();
            let url = $(this).attr('href');

            $.ajax({
                url: url,
                method: 'get',
                success: function(data)
                {
                    $.notify(data, 'success');
                },
                error: function(data)
                {
                    console.log("an error occurred");
                }
            });
        });
    </script>
@endsection
