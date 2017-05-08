require ('jquery-validation/dist/jquery.validate.js');

$.validator.setDefaults({
    submitHandler: function() {
        console.log("提交事件!"); //验证通过，执行的方法，看文档
    }
});