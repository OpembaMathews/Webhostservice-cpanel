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

function register(e){
    var ajaxPost = $.ajax({
        url: "http://"+window.location.host+"/user/create",
        method: "POST",
        data: $(".register-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        errorResponse(res)
    });

    ajaxPost.fail(function(res){
        errorResponse(res.responseJSON);
    });
}

function errorResponse(response){
    if(response.hasOwnProperty("errors")){
        if(response.errors.hasOwnProperty("voucher")){
            $(".response").append('<div class="alert alert-danger" role="alert">'+response.errors.voucher+'</div>');
        }

        if(response.errors.hasOwnProperty("name")){
            $(".response").append('<div class="alert alert-danger" role="alert">'+response.errors.name+'</div>');
        }

        if(response.errors.hasOwnProperty("email")){
            $(".response").append('<div class="alert alert-danger" role="alert">'+response.errors.email+'</div>');
        }

        if(response.errors.hasOwnProperty("password")){
            $(".response").append('<div class="alert alert-danger" role="alert">'+response.errors.password+'</div>');
        }
    }
}
