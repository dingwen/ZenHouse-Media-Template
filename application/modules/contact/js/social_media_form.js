(function($) {
    $(function() {
        init_datatable();

        $("form").submit(function(e) {
            e.preventDefault();
            $.post(BASE_URL + 'admin/contact/add_social_media' , $("form").serialize(), function(data) {
                var result_msg = $.parseJSON(data);
                $('#form').prepend(result_msg.message);
                if(result_msg.links != "error") {
                   $('form :input').not(':submit').val('');
                   $('#content-list').html(result_msg.links);
                   init_datatable();
                   confirm_popup();
                }
                close_message();
            })
        });

        function init_datatable() {
            $('#social_media_list').dataTable({
                "aoColumns": [null, null, null, {"bSortable": false}]
            });
            edit_link();
        }

        function edit_link() {
            $('a.edit').click(function(e) {
                e.preventDefault();
                $.post($(this).attr('href'), function(data) {
                    if(data == "") {
                        alert("Can't retrieve selected Social Media data.");
                    } else {
                        var social_media_obj =  $.parseJSON(data);
                        $('#social_media_type').val(social_media_obj.type);
                        $('#social_media_text').val(social_media_obj.text);
                        $('#social_media_url').val(social_media_obj.url);
                        $('input:hidden[name="id"]').val(social_media_obj.id);
                    }
                });
            });
        }

        function close_message() {
            $('a.close').click(function(e) {
                e.preventDefault();
                $(this).parents('.message').hide('fast');
                return false;
            });
        }
        
        function confirm_popup() {
            /* Pop up a confirm box when user click on a delete link. */
            $('a.confirm').click(function() {
                return confirm("Are you sure to delete these items?");
            });
        }
    });
})(jQuery);