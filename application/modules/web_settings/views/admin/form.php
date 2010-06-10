<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <div>
            <label>Enable Categories Module? </label>
            <?php
                $checked = set_checkbox('categories_enable', $settings->categories_enable);
                echo form_checkbox('categories_enable', '1', empty($checked));
            ?>
        </div>
        <div>
            <label>ShareThis Button Code</label>
            <?php echo form_textarea('sharethis', set_value('sharethis', $settings->sharethis)); ?>
        </div>
        <div>
            <label>Enable ShareThis?</label>
            <?php
                $checked = set_checkbox('sharethis_enable', $settings->sharethis_enable);
                echo form_checkbox('sharethis_enable', '1', $checked);
            ?>
        </div>
        <div>
            <label>Google Analytics Web Property ID</label>
            <?php echo form_textarea('google_analytics', set_value('google_analytics', $settings->google_analytics)); ?>
        </div>
        <div>
            <label>Enable Google Analytics?</label>
            <?php
                $checked = set_checkbox('google_analytics_enable', $settings->google_analytics_enable);
                echo form_checkbox('google_analytics_enable', '1', empty($checked));
            ?>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit" />
            <?php echo anchor(site_url('admin/web_settings'), 'Cancel'); ?>
        </div>
    </form>
</div>