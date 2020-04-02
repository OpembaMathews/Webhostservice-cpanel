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

function checkDomain(){
    $(".response").html("");
    $(".check-domain").html('<div class="spinner-border text-white m-1" role="status"><span class="sr-only">Loading...</span></div><span style="vertical-align:super"> Checking...</span>');

    var ajaxPost = $.ajax({
        url: "https://"+window.location.host+"/domain/create",
        method: "POST",
        data: $(".domain-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(response){
        if(response.count){
            $(".response").html("<div class='alert alert-danger' style='margin-bottom:10px'><strong>"+$("[name='domain']").val()+" is not available</strong></div>").show();

            $(".check-domain").html('Create hosting account');
        }
        else{
            $(".response").html("<div class='alert alert-success' style='margin-bottom:10px'><strong> Domain name created successfully!</strong></div>").show();

            $(".check-domain").html('Create hosting account');

            setTimeout(function(){
                window.location.reload()
            },3000);
        }
        
    });

    ajaxPost.fail(function(err){}); 
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
