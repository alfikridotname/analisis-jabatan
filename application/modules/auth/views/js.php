<script>
    $(document).ready(function() {
        $('#username').focus();
    });

    $('#username').keypress(function(e) {
        if (e.which == 13) {
            $('#password').focus();
            return false;
        }
    });

    $('#form-login').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: baseUrl('auth/login'),
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
            success: function(data) {
                $(".login-box").slideUp(500, function() {
                    setTimeout(function() {
                        window.location.href = baseUrl('dashboard');
                    });
                });
                // $('.notif').html('');
                // if (data.status == true) {
                //     $(".login-box").slideUp(500, function() {
                //         setTimeout(function() {
                //             window.location.href = baseUrl('dashboard');
                //         });
                //     });
                // } else {
                //     $('.notif').append(`<div class="alert alert-warning alert-dismissible">
                //         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                //         <i class="icon fas fa-exclamation-triangle"></i> ${data.message}
                //     </div>`);
                //     $('#username').focus();
                // }
            }
        });
    });
</script>