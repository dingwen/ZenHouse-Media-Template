<div id="content-list">
    <?php if(isset($main_categories) AND !empty($main_categories)): ?>
    <label for="main_categories">Page List: </label><?php echo form_dropdown('main_categories', $main_categories, 0, 'id="main-categories"') ?>
    <?php endif; ?>
    <div id="sub-categories"></div>
</div>