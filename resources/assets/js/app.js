// require('!!babel-loader!../config/bootstrap.config');
require('../../../public/assets/js/bootstrap.min.js');
require('../../../public/assets/js/app.min.js');


$('#modal').on('show.bs.modal', function (e) {
    $(this).load($(e.relatedTarget).data('url'));
});
//
$("#modal").on('hide.bs.modal',function(e){
    // $(this).removeData();
    console.log(111);
});
