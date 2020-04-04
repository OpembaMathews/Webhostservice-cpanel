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
        url: "http://"+window.location.host+"/domain/create",
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
                //window.location.reload()
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

$(".user-settings").on("click",function(){
    $(".profile-dropdown").addClass("show");
});

$(document).on("click",function(event){
    var trigger = $(".user-settings");
    if(trigger !== event.target && !trigger.has(event.target).length){
        $(".profile-dropdown").removeClass("show");
    }  
});

$('.message .close').on('click', function() {
    $(this).closest('.message').transition('fade');
});

$('#confirm-password').on('keyup', function(){
    var password = $("#p-password").val();
    var confirmPassword = $("#confirm-password").val();

    if(password === confirmPassword && (password != "" && confirmPassword != "")){
        $('#match-message').html('Password Match').css('color', 'green');
        $('#submit-btn').removeAttr("disabled");
    } else if(password != "" && confirmPassword != "") {
        $('#match-message').html('Password Mismatch').css('color', 'red');
        $('#submit-btn').attr("disabled", "disabled");
    }
    else{
        $('#match-message').html('');
        $('#submit-btn').attr("disabled", "disabled");
    }
});

//Upload Picture
$('#cpic').on('click', function(e){
    e.preventDefault();
    $('#imageInput').click();
});
var croppieInitialized = false;
$('#imageInput').on('change', function(){
    $('#profilePic').hide();
    if(!croppieInitialized)
    {
        $uploadCrop = $('#profilePic').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 200,
                height: 200,
            },
            boundary: {
                width: 250,
                height: 250
            }
        });
        croppieInitialized = true;
    }

    var reader = new FileReader();
    reader.onload = function(e){
        $uploadCrop.croppie('bind', {
            url: e.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        })
    }
    reader.readAsDataURL(this.files[0]);
    $('#cpic').hide();
    $('#uploadDiv').show();
});

$('#uploadFile').on('click', function(e){
    e.preventDefault();
    console.log("{{ url('pictureupdate') }}");
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(resp) {
        $.ajax({
            url: "{{ url('pictureupdate') }}",
            method: "POST",
            data: {"image":resp, _token: '{{ csrf_token() }}'},
            success: function (data){
                $("#profilePic").attr('src', resp);
                $("#profilePicture").attr('src', resp);
                $uploadCrop.croppie('destroy');
                croppieInitialized = false;
                $('#uploadDiv').hide();
                $('#profilePic').show();
                $("#cpic").show();
            }
        });
    });
});

$('#uploadCancel').on('click', function(e){
    e.preventDefault();
    croppieInitialized = false;
    $uploadCrop.croppie('destroy'); 
    $('#uploadDiv').hide();
    $('#profilePic').show();
    $("#cpic").show();
});

$('#rotateLeft').on('click', function(e){
    $uploadCrop.croppie('rotate', -90);
});

$('#rotateRight').on('click', function(e){
    $uploadCrop.croppie('rotate', 90);
});
