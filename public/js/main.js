/**
 * Created by carlo on 20/09/2016.
 */

 $(function () {
    /*aeleção de elementos inicisi*/
    var loader = $('.loader').hide();
    var form = $('.ajax');
    var status = $('.message').hide();
    var statusError = $('.messageError').hide();
    var showlist = $('#showlist');
    /*Usar o select2*/
    /*$('.entrega').select2();*/

    setTimeout(function () {
        $('.delete-success').hide();
    }, 3000);

    $('.create-produtos').on('hidden.bs.modal', function () {
        location.reload();
    });

    form.on('submit', function (e) {
        e.preventDefault();

        $('#valor').unmask();

        var data = $(this).serialize();

        $(document).ajaxStart(function () {
            loader.show();
        });

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: data,
            success: function (response) {
                loader.hide();

                var message = response.msg;

                if (response.status == 'ok') {
                    status.prepend(message);

                    status.show();

                    setTimeout(function () {
                        status.hide();
                        status.empty();
                        document.location.reload(true);
                    }, 2000);

                    form.trigger('reset');


                    setTimeout(function () {
                        $('.create-produtos').modal('hide');                        
                    }, 3000);                    
                }
            },

            error: function (response) {

                loader.hide();
                var errors = $.parseJSON(response.responseText);

                $.each(errors, function (index, value) {
                    statusError.prepend(value + "<br>");
                });

                statusError.show();

                setTimeout(function () {
                    statusError.hide();
                    statusError.empty();
                }, 10000);
            }
        });
    });
    $('.search').quicksearch('table tbody tr', {
        'bind': 'keyup',
    });
});
