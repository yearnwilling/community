// require('!!babel-loader!../config/bootstrap.config');
require('../../../public/assets/js/bootstrap.min.js');
require('../../../public/assets/js/app.min.js');


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


