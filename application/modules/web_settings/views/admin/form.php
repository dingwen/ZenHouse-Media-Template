<h2>Web Settings</h2>
<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <div>
            <label>Enable Categories Module? </label>
            <?php echo form_checkbox('categories_enable', '1', set_value('categories_enable', $settings->categories_enable)); ?>
        </div>
        <div>
            <label>ShareThis Button Code</label>
            <?php echo form_textarea('sharethis', set_value('sharethis', $settings->sharethis), 'class="medium"'); ?>
        </div>
        <div>
            <label>Enable ShareThis?</label>
            <?php echo form_checkbox('sharethis_enable', '1', set_value('sharethis_enable', $settings->sharethis_enable)); ?>
        </div>
        <div>
            <label>Google API Key</label>
            <?php echo form_input('google_api_key', set_value('google_api_key', $settings->google_api_key), 'class="small"'); ?>
        </div>
        <div>
            <label>Google Analytics Web Property ID</label>
            <?php echo form_input('google_analytics', set_value('google_analytics', $settings->google_analytics), 'class="small"'); ?>
        </div>
        <div>
            <label>Enable Google Analytics?</label>
            <?php echo form_checkbox('google_analytics_enable', '1', set_value('google_analytics_enable', $settings->google_analytics_enable)); ?>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
        </div>
    </form>
</div>