import styles from 'jquery-autocomplete/jquery.autocomplete.css';

require('../../libs/jquery-validate.js');
require('jquery-form');
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
        valueKey: 'name',
        titleKey: 'name',
        source: [{
            url: "/president_search?name=%QUERY%",
            type: 'remote',
            getValue: function (item) {
                return item.name
            },
            getTitle: function (item) {
                return item.name
            },
            ajax: {
                dataType: 'json'
            }
        }]
    }
).on('selected.xdsoft',function(e,datum){
    $('#president_id').val(datum.id)
});;