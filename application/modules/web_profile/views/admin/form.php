<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <div>
            <label>Website Name</label>
            <?php echo form_input('name', set_value('name', $profile->name), 'class="long"'); ?>
        </div>
        <div>
            <label>Tagline</label>
            <?php echo form_input('tagline', set_value('tagline', $profile->tagline), 'class="long"'); ?>
        </div>
        <div>
            <label>Welcome Title</label>
            <?php echo form_input('welcome_title', set_value('welcome_title', $profile->welcome_title), 'class="long"'); ?>
        </div>
        <div>
            <label>Welcome Message</label>
            <?php echo form_textarea('welcome_message', set_value('welcome_message', $profile->welcome_message), 'class="short"') ?>
        </div>
        <div>
            <label>Contact Email</label>
            <?php echo form_input('contact_email', set_value('contact_email', $profile->contact_email), 'class="long"'); ?>
        </div>
        <div>
            <label>Homepage File</label>
            <?php echo form_input('file_name', set_value('homepage_file', $profile->homepage_file), 'id="file-name" disabled="true"'); ?>
            <?php echo form_button('', 'Browse', 'id="ajax-upload"')?>
            <?php echo form_hidden('homepage_file', set_value('homepage_file', $profile->homepage_file)) ?>
            <div id="fileupload"></div>
        </div>
        <div>
            <label>Meta Keywords</label>
            <?php echo form_input('meta_keywords', set_value('meta_keywords', $profile->meta_keywords), 'class="long"'); ?>
        </div>
        <div>
            <label>Meta Title</label>
            <?php echo form_input('meta_title', set_value('meta_title', $profile->meta_title), 'class="long"'); ?>
        </div>
        <div>
            <label>Meta Description</label>
            <?php echo form_textarea('meta_description', set_value('meta_description', $profile->meta_description), 'class="medium"') ?>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit" class="publish_btn"/>
            <?php echo anchor(site_url('admin/web_profile'), 'Cancel'); ?>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var button = $('#ajax-upload');
        var fileupload = $('#fileupload');
        new AjaxUpload(
            button,
            {
                action: "<?php echo site_url('admin/web_profile/save_file'); ?>",
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
                        $("input[name='homepage_file']").val(responseObj.message);
                    } else {
                        button.text('Browse');
                        this.enable();
                        fileupload.html('<span style="color: red;">' + responseObj.message + '</span>');
                    }
                }
            }
        );
    });
</script>