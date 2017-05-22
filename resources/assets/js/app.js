// require('!!babel-loader!../config/bootstrap.config');
import 'node-layer/build/skin/default/layer.css'
require('../../../public/assets/js/bootstrap.min.js');
require('../../../public/assets/js/app.min.js');

import 'node-layer';

$('#modal').on('show.bs.modal', function (e) {
    $(this).load($(e.relatedTarget).data('url'));
});
//
$("#modal").on('hidden.bs.modal',function(e){
    $(this).removeData("modal");
    $("#modal").empty();
});

