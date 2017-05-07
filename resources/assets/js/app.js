window.$ = window.jQuery = require('jquery');

require('jquery-validation/dist/jquery.validate.js');

$(document).ready(function () {
    // $('#modal').on('show.bs.modal', function (e) {
    //     $(this).load($(e.relatedTarget).data('url'), function (response, status, xhr) {
    //         if (status == "error") {
    //             $('#modal').modal('hide');
    //             var message = $.parseJSON(response);
    //             $.notify({
    //                 message: message.error.message
    //             }, {
    //                 placement: {
    //                     align: 'center',
    //                 },
    //                 type: 'danger',
    //                 delay: 2000,
    //             });
    //         }
    //     });
    // });


    $('#community_add').validate({
        // submitHandler: function (form) {
        //     $(form).ajaxSubmit();
        // },
        rules: {
            name: "required",
        },
        messages: {
            name: "请输入社团名称",
        }
    });

});

