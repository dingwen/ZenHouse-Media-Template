(function($) {
    $(function() {
        var button = $('#ajax-upload');
        var fileupload = $('#fileupload');
        new AjaxUpload(button,
            {
                action: BASE_URL + "admin/single_artist/save_file",
                name: 'userfile',
                onSubmit: function(file, ext) {
                    fileupload.empty();
                    button.text('Uploading');
                    this.disable();
                },
                onComplete: function(file, response) {
                    var responseObj = $.parseJSON(response);
                    if(responseObj.uploaded) {
                        button.text('File Uploaded');
                        this.disable();
                        $('#file-name').val(responseObj.message);
                        $("input[name='photo']").val(responseObj.message);
                    } else {
                        button.text('Browse');
                        this.enable();
                        fileupload.html('<span style="color: red;">' + responseObj.message + '</span>');
                    }
                }
            }
        );
    });
})(jQuery);