<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Gallery Information</legend>
            <div>
                <label>Title</label>
                <?php echo form_input('title', set_value('title', $gallery->title)); ?>
            </div>
            <?php if($gallery_category_enable): ?>
            <div>
                <label>Category</label>
                <?php echo form_dropdown('category', $categories, set_value('category', $gallery->category)); ?>
            </div>
            <?php endif; ?>
            <div>
                <label>Description</label>
                <textarea name="description" class="tinymce"><?php echo set_value('addtional_content', $gallery->description); ?></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Search Engine Option</legend>
            <div>
                <label>Meta Keywords</label>
                <?php echo form_input('meta_keywords', set_value('meta_keywords', $gallery->meta_keywords), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Title</label>
                <?php echo form_input('meta_title', set_value('meta_title', $gallery->meta_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Description</label>
                <?php
                    $meta_description_textarea = array(
                        'name' => 'meta_description',
                        'value' => set_value('meta_description', $gallery->meta_description),
                        'class' => 'medium',
                        'rows' => "5",
                        'cols' => "50"
                    );
                    echo form_textarea($meta_description_textarea);
                ?>
            </div>
        </fieldset>
        <div>
        <?php if($page == "create"): ?>
            <input type="submit" value="Publish" name="publish" class="submit_btn"/>
            <input type="submit" value="Save Draft" name="draft" class="submit_btn"/>
        <?php elseif($page == "edit"): ?>
            <input type="submit" value="Update" name="update" class="submit_btn"/>
        <?php endif; ?>
            <?php echo anchor(site_url('admin/gallery'), 'Cancel'); ?>
        </div>
    </form>
</div>