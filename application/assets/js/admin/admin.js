(function($){
    $(function() {
        $("div#form-tabs").tabs();

        $('a.close').click(function() {
            $(this).parents('.message').hide('fast');
            return false;
        });

        confirm_popup();
    });
    function confirm_popup() {
        /* Pop up a confirm box when user click on a delete link. */
        $('a.confirm').click(function() {
            return confirm("Are you sure to delete these items?");
        });
    }
})(jQuery);