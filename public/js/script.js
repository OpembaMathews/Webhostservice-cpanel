var resp;
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
        url: window.location.protocol+"//"+window.location.host+"/domain/create",
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
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/user/create",
        method: "POST",
        data: $(".register-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        errorResponse(res);
        $(e).html("<strong>Register</strong>");

        if(res.hasOwnProperty("redirect")){
            $(".response").append('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></i> Account created successfully. <br>You will be redirected shortly.</strong></div>');

            setTimeout(function(){
                window.location.href = window.location.protocol+"//"+window.location.host+"/"+res.redirect;
            },2000);
        }
    });

    ajaxPost.fail(function(res){
        errorResponse(res.responseJSON);
        $(e).html("<strong>Register</strong>");
    });
}

function login(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/user/login",
        method: "POST",
        data: $(".login-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        errorResponse(res);
        $(e).html("<strong>Log In</strong>");

        if(res.hasOwnProperty("redirect")){
            $(".response").append('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></i> Login successful. <br>You will be redirected shortly.</strong></div>');

            setTimeout(function(){
                window.location.href = window.location.protocol+"//"+window.location.host+""+res.redirect;
            },2000);
        }
    });

    ajaxPost.fail(function(res){
        errorResponse(res.responseJSON);
        $(e).html("<strong>Log In</strong>");
    });
}

function errorResponse(response){
    if(response.hasOwnProperty("errors")){
        if(response.errors.hasOwnProperty("voucher")){
            $(".response").append('<div class="alert alert-danger" role="alert"><strong><i class="mdi mdi-cancel"></i> '+response.errors.voucher+'</strong></div>');
        }

        if(response.errors.hasOwnProperty("name")){
            $(".response").append('<div class="alert alert-danger" role="alert"><strong><i class="mdi mdi-cancel"></i> '+response.errors.name+'</strong></div>');
        }

        if(response.errors.hasOwnProperty("email")){
            $(".response").append('<div class="alert alert-danger" role="alert"><strong><i class="mdi mdi-cancel"></i> '+response.errors.email+'</strong></div>');
        }

        if(response.errors.hasOwnProperty("password")){
            $(".response").append('<div class="alert alert-danger" role="alert"><strong><i class="mdi mdi-cancel"></i> '+response.errors.password+'</strong></div>');
        }
    }
}

function moveToTrash(e,type){
    var path = $(e).attr("data-value");
    var id = $(e).attr("data-id");
    $(".file-title").html($(e).attr("title"));

    if(type == "photo"){
        $("img.trash-file").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+path);
    }

    if(type == "audio"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "video"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "document"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "compress"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "folder"){
        $("img.trash-file").attr("src",path);
    }

    $("[name='trash_id']").val(id);
}

function restoreFile(e,type){
    var path = $(e).attr("data-value");
    var id = $(e).attr("data-id");
    $(".file-title").html($(e).attr("title"));

    if(type == "photo"){
        $("img.trash-file").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+path);
    }

    if(type == "audio"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "video"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "document"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "compress"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "folder"){
        $("img.trash-file").attr("src",path);
    }

    
    $("[name='trash_id']").val(id);
}

function deleteFile(e,type){
    var path = $(e).attr("data-value");
    var id = $(e).attr("data-id");
    $(".file-title").html($(e).attr("title"));

    if(type == "photo"){
        $("img.trash-file").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+path);
    }

    if(type == "audio"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "video"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "document"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "compress"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "folder"){
        $("img.trash-file").attr("src",path);
    }

    $("[name='trash_id']").val(id);
    $("[name='trash_file']").val(path);
}

function deleteFolder(e,type){
    var path = $(e).attr("data-value");
    var id = $(e).attr("data-id");
    $(".file-title").html($(e).attr("title"));

    if(type == "photo"){
        $("img.trash-file").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+path);
    }

    if(type == "audio"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "video"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "document"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "compress"){
        $("img.trash-file").attr("src",path);
    }

    if(type == "folder"){
        $("img.trash-file").attr("src",path);
    }

    $("[name='trash_id']").val(id);
    $("[name='trash_file']").val(path);
}

function confirmMoveToTrash(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/move/trash",
        method: "POST",
        data: $(".move-to-trash-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Move</strong>");
     $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> File moved to trash</strong></div>');

        setTimeout(function(){
            window.location.reload()
        },2000);
    });

    ajaxPost.fail(function(res){
    });
}

function confirmRestoreFile(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/restore",
        method: "POST",
        data: $(".restore-file-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Restore</strong>");
     $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> File restored</strong></div>');

        setTimeout(function(){
            window.location.reload()
        },2000);
    });

    ajaxPost.fail(function(res){
    });
}

function confirmDeleteFile(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/delete",
        method: "DELETE",
        data: $(".delete-file-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Delete</strong>");

        if(res.message == "success"){
            $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> File deleted</strong></div>');

            setTimeout(function(){
                window.location.reload()
            },2000);
        }
        else{
            $(".response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){
    });
}

function confirmDeleteFolder(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/folder/delete",
        method: "DELETE",
        data: $(".delete-folder-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Delete</strong>");

        if(res.message == "success"){
            $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Folder deleted</strong></div>');

            setTimeout(function(){
                window.location.reload()
            },2000);
        }
        else{
            $(".response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){
    });
}

function confirmDeleteCustomer(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/user/delete",
        method: "DELETE",
        data: $(".delete-user-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Delete</strong>");

        if(res.message == "success"){
            $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Customer deleted successully.</strong></div>');

            setTimeout(function(){
                window.location.href = window.location.protocol+"//"+window.location.host+"/admin/customers";
            },2000);
        }
        else{
            $(".response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){
    });
}

function checkForHostOrDrive(e){
    var _v = $(e).val();

    if(_v == ""){
        $(".host-select").hide();
        $(".drive-select").hide();
        $(".voucher-number").hide();
    }

    if(_v == "host"){
        $(".host-select").show();
        $(".drive-select").hide();
        $(".voucher-number").show();
    }

    if(_v == "drive"){
        $(".host-select").hide();
        $(".drive-select").show();
        $(".voucher-number").show();
    }

    if(_v == "both"){
        $(".host-select").show();
        $(".drive-select").show();
        $(".voucher-number").show();
    }
}

function generateVoucher(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/admin/generateVoucher",
        method: "POST",
        data: $(".generate-voucher-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Generate Voucher</strong>");

        if(res.message == "success"){
            $(".voucher-response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Voucher generated successully.</strong></div>');

            setTimeout(function(){
                window.location.href = window.location.protocol+"//"+window.location.host+"/admin/vouchers";
            },2000);
        }
        else{
            $(".voucher-response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){});
}

function showAllFiles(e){
    var searchType = $(".search-type").val();

    if($(e).val() == ""){
        $(".default-files-"+searchType).show();
        $(".search-files-"+searchType).hide();
    }
}

function getDriveFiles(){
    var searchType = $(".search-type").val();
    var searchInput = $(".search-input").val();

    $(".default-files-"+searchType).hide();

    $(".search-files-"+searchType).show();
    $(".search-col").hide();
    $(".search-response").html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Searching...</span></strong>").show();

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/file/"+searchType+"/search",
        method: "GET",
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });

    ajaxPost.done(function(res){
        const fuse = new Fuse(res, {
          keys: ['name']
        })

        //console.log(fuse.search(searchInput))

        if(fuse.search(searchInput).length > 0 ){
            $(".search-response").hide();

            $.map(fuse.search(searchInput),function(item,index){
                $('[data-name="'+item.item.name+'"]').show();
            });
        }
        else{
            $(".search-col").hide();
            $(".search-response").html("<strong><i class='mdi mdi-cancel'></i> No file found</strong>").show();
        }
    })
}

function createFolder(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/folder/create",
        method: "POST",
        data: $(".create-folder-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Create</strong>");

        if(res.message == "success"){
            $(".response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Folder created successully.</strong></div>');

            setTimeout(function(){
                window.location.reload();
            },2000);
        }
        else{
            $(".response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){
    });
}

function confirmRenameFolder(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/folder/update",
        method: "PUT",
        data: $(".rename-folder-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Save</strong>");

        if(res.message == "success"){
            $(".folder-response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Folder saved successully.</strong></div>');

            setTimeout(function(){
                window.location.reload();
            },2000);
        }
        else{
            $(".folder-response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){});
}

function renameFolder(e){
    $(".folder-id").val($(e).attr("data-id"));
    $(".folder-name").val($(e).attr("title"));
    $(".folder-title").html($(e).attr("title"));
}

function getMedia(e,type){
    var media = $(e).attr("data-media");

    $(".media-player").attr("src",$(e).attr("data-media"));
    $(".media-title").html($(e).attr("title"));
    $(".drive-url").val($(e).attr("data-url"));
    $(".drive-url").val($(e).attr("data-url"));
    $(".drive-id").val($(e).attr("data-id"));

    if(type == "photo"){
        $("img.m-image").show();
        $("audio.m-audio").hide();
        $("video.m-video").hide();
        $("iframe.m-document").hide();
    }

    if(type == "audio"){
        $("img.m-image").hide();
        $("audio.m-audio").show();
        $("video.m-video").hide();
        $("iframe.m-document").hide();
    }

    if(type == "video"){
        $("img.m-image").hide();
        $("audio.m-audio").hide();
        $("video.m-video").show();
        $("iframe.m-document").hide();
    }

    if(type == "document"){
        $("img.m-image").hide();
        $("audio.m-audio").hide();
        $("video.m-video").hide();
        $("embed.m-document").show();
    }

    if(type == "add password"){
        $("img.m-image").hide();
        $("audio.m-audio").hide();
        $("video.m-video").hide();
        $("embed.m-document").hide();
        $(".pwd-title").html("Add Password");
    }

    if(type == "remove password"){
        $("img.m-image").hide();
        $("audio.m-audio").hide();
        $("video.m-video").hide();
        $("embed.m-document").hide();
        $(".pwd-title").html("Type 'REMOVE' in the box below to disable password control");
    }
}

function addDrivePasswordControl(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/password/control/create",
        method: "POST",
        data: $(".password-control-form").serialize(),
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Save</strong>");

        if(res.message == "success"){
            $(".pwd-response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> Successful.</strong></div>');

            setTimeout(function(){
                window.location.reload();
            },2000);
        }
        else{
            $(".pwd-response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(res){
    });
}

function checkDrivePassword(e){
    $(e).html("<strong><div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div><span style='vertical-align:super' class='ml-1'>Please wait...</span></strong>");

    var ajaxPost = $.ajax({
        url: window.location.protocol+"//"+window.location.host+"/drive/password/check",
        method: "GET",
        data: $(".drive-password-form").serialize(),
        dataType:"json",
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    ajaxPost.done(function(res){
        $(e).html("<strong>Send</strong>");

        if(res.message == "success"){
            $(".drive-password-box").hide();
            $(".drive-file").show();

            if(res.drive.file_type == "photo"){
                $(".m-photo").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+res.drive.path).show();

                $(".m-audio").hide();
                $(".m-video").hide();
                $(".m-document").hide();
                $(".m-compress").hide();
                $(".plyr").hide();
            }

            if(res.drive.file_type == "audio"){
                $(".m-audio").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+res.drive.path).show();

                $(".m-photo").hide();
                $(".m-video").hide();
                $(".m-document").hide();
                $(".m-compress").hide();
                $(".plyr").show();
            }

            if(res.drive.file_type == "video"){
                $(".m-video").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+res.drive.path).show();

                $(".m-audio").hide();
                $(".m-photo").hide();
                $(".m-document").hide();
                $(".m-compress").hide();
                $(".plyr").show();
            }

            if(res.drive.file_type == "document"){
                $(".m-document").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+res.drive.path).show();

                $(".m-audio").hide();
                $(".m-video").hide();
                $(".m-photo").hide();
                $(".m-compress").hide();
                $(".plyr").hide();
            }

            if(res.drive.file_type == "compress"){
                $(".m-compress").attr("src","https://eurekahostdrive.nyc3.cdn.digitaloceanspaces.com/"+res.drive.path).show();

                $(".m-audio").hide();
                $(".m-video").hide();
                $(".m-document").hide();
                $(".m-photo").hide();
                $(".plyr").hide();
            }
        }
        else{
            $(".pwd-response").html('<div class="alert alert-danger" role="alert"><strong>'+res.message+'</strong></div>');
        }
    });

    ajaxPost.fail(function(err){
    });
}

var clipboard = new ClipboardJS('#copy-btn');

clipboard.on('success',function(e){
    e.clearSelection();
    showTooltip(e.trigger,'Copied!');
});

clipboard.on('error',function(e){
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
    showTooltip(e.trigger,fallbackMessage(e.action));
});

var btns = document.querySelectorAll('#copy-btn');

for(var i = 0; i < btns.length; i++){
    btns[i].addEventListener('mouseleave',clearTooltip);
    btns[i].addEventListener('blur',clearTooltip);
}

function clearTooltip(e){
    e.currentTarget.setAttribute('class','btn');
    e.currentTarget.removeAttribute('aria-label');
}

function showTooltip(elem,msg){
    elem.setAttribute('class','btn tooltipped tooltipped-s');
    elem.setAttribute('aria-label',msg);
}

function fallbackMessage(action){
    var actionMsg = '';
    var actionKey = (action==='cut'?'X':'C');

    if(/iPhone|iPad/i.test(navigator.userAgent)){ actionMsg = 'No support :('; }
    else if(/Mac/i.test(navigator.userAgent)){ actionMsg = 'Press ⌘-'+actionKey+' to '+action; }
    else{ actionMsg = 'Press Ctrl-'+actionKey+' to '+action; }

    return actionMsg;
}

$('.search-input').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        event.preventDefault();
        getDriveFiles(); 
    }
});

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

var myDropzone = new Dropzone(".dropzone", { 
    init: function() {
        this.on("sending", function(file, xhr, formData) {
          formData.append("file_name", file.upload.filename);
          formData.append("file_size", file.size);
          formData.append("folder_id", $(".folder-select").val());
          formData.append("password", $(".drive-password").val());

          $(".upload-response").html('<div class="alert alert-info"><strong><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div><span class="ml-1" style="vertical-align:super">Uploading...</span></strong></div>');
        });
    },
    url: window.location.protocol+"//"+window.location.host+"/drive/create",
    method: "post",
    paramName: "filename",
    dictDefaultMessage: "Drop files here or click to upload.",
    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //acceptedFiles:"image/*,application/pdf,.psd,.zip,",
    accept: function(file,done){ return done(); },
    addRemoveLinks: true,
    dictRemoveFile: "Remove",
    success: function(file,response){
        if(response.message == "success"){
            $(".upload-response").html('<div class="alert alert-success" role="alert"><strong><i class="mdi mdi-check-circle-outline"></> File uploaded successully.</strong></div>');

            setTimeout(function(){
                window.location.reload()
            },2000);
        }
        else{
            $(".upload-response").html('<div class="alert alert-danger" role="alert"><strong>'+response.message+'</strong></div>');
        }
    }
});

const player = new Plyr('.media-player', {
  tooltips:{ controls: true, seek: true }
});

const player2 = new Plyr('.media-v-player', {
  tooltips:{ controls: true, seek: true }
});

const player3 = new Plyr('.media-a-player', {
  tooltips:{ controls: true, seek: true }
});

const player4 = new Plyr('.media-vv-player', {
  tooltips:{ controls: true, seek: true }
});
