// import 'jquery-autocomplete/jquery.autocomplete.css';
import 'selectize/dist/less/selectize.default.less'
import notify from '../../libs/notify';
import 'selectize';

require('../../libs/jquery-validate.js');
require('jquery-form');

$("#community_add").validate({
    submitHandler: function (form) {
        let options = {
            success: function (data) {
                $('#modal').modal('hide');
                notify.success(data.msg);
                setTimeout('window.location.reload()',2000);
            },
            error : function (res) {
                if (res.status == 422) {
                    let errors = res.responseJSON;
                    let errorMsg = '';
                    $.each(errors, function (key, value) {
                        errorMsg += value +'';
                    })
                    notify.danger(errorMsg,3);
                } else {

                }
            }
        };
        $(form).ajaxSubmit(options);
    },
    rules: {
        name: "required",
        president_id: 'required'
    },
    messages: {
        name: "社团名称不能为空",
        president_id: '社长不能为空'
    }
});

$('#community_add_submit').on('click', function () {
    $("#community_add").submit();
});


let selectize_options = {
    valueField: 'id',
    labelField: 'name',
    searchField: 'name',
    options: [],
    create: false,
    load: function (query, callback) {
        if (!query.length) return callback();
        $.ajax({
            url: '/president_search?name=%'+query+'%',
            type: 'GET',
            dataType: 'json',
            error: function() {
                callback();
            },
            success: function(res) {
                console.log(res);
                callback(res);
            }
        });
    }
};

$('#users').selectize(selectize_options);


// $('#users').autocomplete({
//         valueKey: 'name',
//         titleKey: 'name',
//         source: [{
//             url: "/president_search?name=%QUERY%",
//             type: 'remote',
//             getValue: function (item) {
//                 return item.name
//             },
//             getTitle: function (item) {
//                 return item.name
//             },
//             ajax: {
//                 dataType: 'json'
//             }
//         }]
//     }
// ).on('selected.xdsoft',function(e,datum){
//     $('#president_id').val(datum.id)
// });
