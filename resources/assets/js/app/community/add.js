// require ('../../libs/jquery-validate.js');

$("#community_add").validate({
    debug: true,
    rules: {
        name: "required",
    },
    messages: {
        name: "社团名称不能为空",
    }
});

$('#community_add_submit').on('click', function () {
    $("#community_add").submit();
});