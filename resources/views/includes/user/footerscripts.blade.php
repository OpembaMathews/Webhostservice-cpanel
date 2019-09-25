<script src="{{ asset("js/jquery-3.4.1.min.js") }}"></script>
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
    });
</script>

@yield('footerscripts')
