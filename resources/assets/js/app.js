import jquery from 'jquery';

window.$ = window.jQuery = jquery;

require ('./libs/jquery-validate.js');

$(document).ready(function () {
    $('#modal').on('show.bs.modal', function (e) {
        $(this).load($(e.relatedTarget).data('url'), function (response, status, xhr) {
            // if (status == "error") {
            //     $('#modal').modal('hide');
            //     var message = $.parseJSON(response);
            //     $.notify({
            //         message: message.error.message
            //     }, {
            //         placement: {
            //             align: 'center',
            //         },
            //         type: 'danger',
            //         delay: 2000,
            //     });
            // }
        });
    });
});

