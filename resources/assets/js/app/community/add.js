$(document).ready(function() {
    console.log($("#community_add"));
    $("#community_add").validate({
        // submitHandler: function (form) {
        //     $(form).ajaxSubmit();
        // },
        rules: {
            // simple rule, converted to {required:true}
            name: "required",
        },
        messages: {
            name: "请输入社团名称",
        }
    });
});
//
//
// $('#community_add').validate({
//     submitHandler: function (form) {
//         $(form).ajaxSubmit();
//     },
//     rules: {
//         name: "required",
//     },
//     messages: {
//         name: "请输入社团名称",
//     }
// });