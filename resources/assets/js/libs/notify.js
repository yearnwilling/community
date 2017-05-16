import 'bootstrap-notify';

let showMessage = function(type, message, duration) {
    duration = typeof(duration) == 'undefined' ? 2 :  duration;
    $.notify({
        message: message
    },{
        // settings
        placement:  {
            align: 'center',
        },
        type: type,
        delay: duration*1000,
        z_index: 99999,
    });
}

let notify = {
    success: function(message, duration) {
        showMessage('success', message, duration);
    },

    warning: function(message, duration) {
        showMessage('warning', message, duration);
    },

    danger: function(message, duration) {
        showMessage('danger', message, duration);
    },

    info: function(message, duration) {
        showMessage('info', message, duration);
    }
};
export default notify;