$(document).ready(function() {
    $("#community_add").validate({
        submitHandler: function (form) {
            $(form).ajaxSubmit();
        },
        rules: {
            name: "required",
        },
        messages: {
            name: "社团名称不能为空",
        }
    });
});