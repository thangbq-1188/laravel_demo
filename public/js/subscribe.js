$(document).ready(function() {
    $('.btn-subscribe').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/subscribers',
            data: {
                email: $('input[name="email"]').val()
            },
            dataType: 'json',
            success: function(data) {
                $('div.content').html('You\'ve successfully subscribed to ournewsletter').fadeIn('fast');
                $('.newsletter').fadeOut(3000);
            },
            error: function(data) {
                $('div.content').html('Have some error, please try later').fadeIn('fast');
            }
        });
    });
});
