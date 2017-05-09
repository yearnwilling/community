import styles from 'jquery-autocomplete/jquery.autocomplete.css';

require('../../libs/jquery-validate.js');
require('jquery-autocomplete/jquery.autocomplete.js');

$("#community_add").validate({
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

$('#users').autocomplete({
        valueKey: 'title',
        titleKey: 'title',
        source: [{
            url: "http://xdsoft.net/jquery-plugins/?task=demodata&s=%QUERY%",
            type: 'remote',
            getValue: function (item) {
                return item.title
            },
            getTitle: function (item) {
                return item.id
            },
            ajax: {
                dataType: 'jsonp'
            }
        }]
    }
).on('selected.xdsoft',function(e,datum){
    $('#president_id').val(datum.id)
});;