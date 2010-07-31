<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Abouts Article</legend>
            <div>
                <label>Title</label>
                <?php echo form_input('title', set_value('title', $abouts->title)); ?>
            </div>
            <div>
                <label>Link Name</label>
                <?php echo form_input('link_name', set_value('link_name', $abouts->link_name)); ?>
            </div>
            <?php if($category_enable): ?>
            <div>
                <label>Category</label>
                <?php echo form_dropdown('category', $categories, set_value('category', $abouts->category)); ?>
            </div>
            <?php endif; ?>
            <div>
                <label>Content</label>
                <?php echo form_textarea('content', set_value('content', $abouts->content), 'class="tinymce"') ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Search Engine Option</legend>
            <div>
                <label>Meta Keywords</label>
                <?php echo form_input('meta_keywords', set_value('meta_keywords', $abouts->meta_keywords), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Title</label>
                <?php echo form_input('meta_title', set_value('meta_title', $abouts->meta_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Description</label>
                <?php
                    $meta_description_textarea = array(
                        'name' => 'meta_description',
                        'value' => set_value('meta_description', $abouts->meta_description),
                        'class' => 'medium',
                        'rows' => "5",
                        'cols' => "50"
                    );
                    echo form_textarea($meta_description_textarea);
                ?>
            </div>
        </fieldset>
        <div>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
            <?php echo anchor(site_url('admin/abouts'), 'Cancel'); ?>
        </div>
    </form>
</div>
<script>
    $(function () {
        var title_input = $("input[name='title']");
        var link_name = $("input[name='link_name']");
        var link_name_val = "";

        title_input.focusout(function() {
            link_name_val = $.trim(link_name.val());
            if(link_name_val < 1) {
                link_name.attr('value', title_input.val());
            }
        });

        link_name.focusin(function() {
            link_name_val = $.trim(link_name.val());
            if(link_name_val < 1) {
                link_name.attr('value', title_input.val());
            }
        });
    });
</script>