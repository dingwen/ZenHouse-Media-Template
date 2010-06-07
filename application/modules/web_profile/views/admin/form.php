<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <div>
            <label>Website Name: </label>
            <?php echo form_input('name', set_value('name', $profile->name)); ?>
        </div>
        <div>
            <label>Tagline: </label>
            <?php echo form_input('tagline', set_value('tagline', $profile->tagline)); ?>
        </div>
        <div>
            <label>Welcome Title: </label>
            <?php echo form_input('welcome_title', set_value('welcome_title', $profile->welcome_title)); ?>
        </div>
        <div>
            <label>Welcome Message: </label>
            <?php echo form_textarea('welcome_message', set_value('welcome_message', $profile->welcome_message), 'class="tinymce"') ?>
        </div>
        <div>
            <label>Contact Email: </label>
            <?php echo form_input('contact_email', set_value('contact_email', $profile->contact_email)); ?>
        </div>
        <div>
            <label>Homepage File: </label>
            <?php echo form_input('homepage_file_text', set_value('homepage_file_text', $profile->homepage_file), 'id="homepage_file_text" disabled="true"'); ?>
            <?php echo form_hidden('homepage_file', set_value('homepage_file', $profile->homepage_file)); ?>
            <?php echo form_upload('userfile', '', 'id="uploadify"'); ?>
            <div id="file-queue"></div>
        </div>
        <div>
            <label>Meta Keywords: </label>
            <?php echo form_input('meta_keywords', set_value('meta_keywords', $profile->meta_keywords)); ?>
        </div>
        <div>
            <label>Meta Title: </label>
            <?php echo form_input('meta_title', set_value('meta_title', $profile->meta_title)); ?>
        </div>
        <div>
            <label>Meta Description: </label>
            <?php echo form_textarea('meta_description', set_value('meta_description', $profile->meta_description)) ?>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit" />
            <?php echo anchor(site_url('admin/web_profile'), 'Cancel'); ?>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function() {
        $('#uploadify').uploadify({
            'fileDataName' : 'userfile',
            'uploader' : "<?php echo js_path('admin/uploadify.swf'); ?>",
            'script' : "<?php echo site_url('admin/web_profile/save_file'); ?>",
            'cancelImg' : "<?php echo image_path('cancel.png'); ?>",
            'queueID' : "file-queue",
            'auto' : true,
            'multi' : false,
            'fileDesc' : 'Homepage Image or Flash File',
            'fileExt' : '*.png;*.jpg;*.swf',
            'sizeLimit' : '5000000',
            'onError' : function (event, queueID, fileObj, errorObj) {
                alert(errorObj.type + ': ' + errorObj.info);
            },
            'onComplete' : function (event, queueID, fileObj, response, data) {
                alert("The selected " + response + " is uploaded.");
                $('input[name="homepage_file"]').val(response);
                $('#homepage_file_text').val(response);
            }
        });
    });
</script>