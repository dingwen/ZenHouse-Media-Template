<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <div>
            <label>Page List: </label>
            <?php echo form_dropdown('main_id', $main_categories, set_value('main_categories', $category->main_id)) ?>
        </div>
        <div>
            <label>Category Name: </label>
            <?php echo form_input('name', set_value('name', $category->name)); ?>
        </div>
        <div>
            <input type="submit" value="Submit" name="submit" />
            <?php echo anchor(site_url('admin/categories'), 'Cancel'); ?>
        </div>
    </form>
</div>