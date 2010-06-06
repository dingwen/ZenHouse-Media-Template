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
            <?php echo form_upload('homepage_file', '', 'class="fileupload"') ?>
            <span>(image/flash)</span>
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