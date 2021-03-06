<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>News Information</legend>
            <div>
                <label>Title</label>
                <?php echo form_input('title', set_value('title', $news->title)); ?>
            </div>
            <?php if($category_enable): ?>
            <div>
                <label>Category</label>
                <?php echo form_dropdown('category', $categories, set_value('category', $news->category)); ?>
            </div>
            <?php endif; ?>
            <div>
                <label>Content</label>
                <?php echo form_textarea('content', set_value('content', $news->content), 'class="tinymce"') ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Search Engine Option</legend>
            <div>
                <label>Meta Keywords</label>
                <?php echo form_input('meta_keywords', set_value('meta_keywords', $news->meta_keywords), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Title</label>
                <?php echo form_input('meta_title', set_value('meta_title', $news->meta_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Description</label>
                <?php
                    $meta_description_textarea = array(
                        'name' => 'meta_description',
                        'value' => set_value('meta_description', $news->meta_description),
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
            <?php echo anchor(site_url('admin/news'), 'Cancel'); ?>
        </div>
    </form>
</div>