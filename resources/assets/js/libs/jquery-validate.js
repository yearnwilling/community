import jquery from 'jquery';

window.$ = window.jQuery = jquery;

require ('jquery-validation/dist/jquery.validate.js');

$.validator.setDefaults({
    submitHandler: function() {
        console.log("提交事件!"); //验证通过，执行的方法，看文档
    },
    highlight: function(element, errorClass, validClass) {
        let $row = $(element).parents('.form-group');
        $row.addClass('has-error');
        $row.find('.help-block').each(function() {
            let $this = $(this);
            if (!$this.hasClass('jq-validate-error')) {
                $this.hide();
            }
        });
    },
    unhighlight: function(element, errorClass, validClass) {
        let $row = $(element).parents('.form-group');
        $row.removeClass('has-error');
        $row.find('.help-block').each(function() {
            let $this = $(this);
            if (!$this.hasClass('jq-validate-error')) {
                $this.show();
            }
        });
    },
    errorElement : 'span',
    errorClass : 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent().hasClass('input-group')) {
            element.parent().after(error);
        } else if (element.parent().is('label')) {
            element.parent().after(error);
        } else {
            element.after(error);
        }
    },
});