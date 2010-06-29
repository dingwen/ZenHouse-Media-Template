(function($) {
    $(function() {
        $('#main-categories').bind('change keyup', function(){
            $.post(BASE_URL + "admin/categories/get_sub/" + $(this).val(), {}, function(data) {
                $('#sub-categories').html(data);
                $('a.confirm').click(function() {return confirm('Are you sure you want to delete this!?');});
                $('#sub-categories-list').dataTable({
                    "aoColumns": [null, { "bSortable": false }]
                });
            });
        });
    });
})(jQuery);