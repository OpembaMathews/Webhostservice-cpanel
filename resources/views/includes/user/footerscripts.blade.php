<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src='{{ asset("js/semantic.min.js") }}'></script>

<script>
    function checkWidth(init)
    {
        if($(window).width() < 767)
        {
            $('#sidebar').removeClass('visible');
            $('.pusher').removeClass('dimmed');
        }
        else
        {
            if(!init){
                $('#sidebar').addClass('visible');
                $('.pusher').removeClass('dimmed');
            }
        }
    }

    function checkDomain(type){
        if(type != "onchange"){
            $(".response").html("");
            $(".check-domain").html('<i class="spinner loading icon"></i>Checking...');
            $(".register-domain").hide();

            var ajaxPost = $.ajax({
                url: "{{ url('domain/check') }}",
                method: "POST",
                data: $(".domain-form").serialize(),
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            ajaxPost.done(function(response){
                if(response.count == 0){
                    $(".response").html("<div class='ui positive message' style='margin-bottom:10px'><div class='header'><i class='check icon'></i><span style='font-size:2em; margin-right:5px'>"+$("[name='domain']").val()+''+$("[name='ext']").val()+"</span> is available</div></div>").show();

                    $(".register-domain").show();
                    $(".check-domain").html('<i class="search icon"></i>Check Availability');

                    // alert($("[name='domain']").val()+''+$("[name='ext']").val()+" is available.");
                }
                else{
                    $(".response").html("<div class='ui negative message' style='margin-bottom:10px'><div class='header'><i class='times icon'></i>"+$("[name='domain']").val()+''+$("[name='ext']").val()+" is not available</div></div>").show();

                    $(".register-domain").hide();
                    $(".check-domain").html('<i class="search icon"></i>Check Availability');
                }
                
            });

            ajaxPost.fail(function(err){});
        }
        else{
            $(".response").html("");
            $(".register-domain").hide();
            $(".check-domain").html('<i class="search icon"></i>Check Availability').show();
        }
    }

    function registerDomain(){
        $(".response").html("");
        $(".check-domain").html('<i class="spinner loading icon"></i>Checking...');
        $(".register-domain").hide();

        var ajaxPost = $.ajax({
            url: "{{ url('domain/check') }}",
            method: "POST",
            data: $(".domain-form").serialize(),
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        ajaxPost.done(function(response){
            if(response.count == 0){
                $(".response").html("<div class='ui positive message' style='margin-bottom:10px'><div class='header'><i class='check circle icon'></i>"+$("[name='domain']").val()+''+$("[name='ext']").val()+" is available</div></div>").show();

                $(".register-domain").show();
                $(".check-domain").html('<i class="search icon"></i>Check Availability');

                // alert($("[name='domain']").val()+''+$("[name='ext']").val()+" is available.");
            }
            else{
                $(".response").html("<div class='ui negative message' style='margin-bottom:10px'><div class='header'><i class='times icon'></i>"+$("[name='domain']").val()+''+$("[name='ext']").val()+" is not available</div></div>").show();

                $(".register-domain").hide();
                $(".check-domain").html('<i class="search icon"></i>Check Availability');
            }
        });

        ajaxPost.fail(function(err){});
    }

    $(document).ready(function(){
        $('#toggle_menu').on('click', function(){
            $('.ui.sidebar').sidebar('toggle');
        });

        checkWidth(true);

        $(window).resize(function(){
            checkWidth(false);
        });

        $('#subaccount-select').dropdown();

        $('#subaccount-select').on('change', function() {
            var current_account_id = $(this).val();
            $.ajax({
                url: "{{ url('setaccount') }}",
                method: "POST",
                data: {"current_account_id":current_account_id, _token: '{{ csrf_token() }}'},
                success: function (data){
                    location.reload(true);
                }
            });
        });

        $('.ui.accordion').accordion({
            selector: {

            }
        });

        $("a.setting-item").each(function(){
            if($(this).hasClass("active"))
            {
                $(this).parent('.content').addClass('active');
            }
        });

        $(".ui.dropdown").dropdown({
            onChange: function(value, text, $selectedItem) {
              checkDomain("onchange");
            }
        });
    });
</script>

@yield('footerscripts')
