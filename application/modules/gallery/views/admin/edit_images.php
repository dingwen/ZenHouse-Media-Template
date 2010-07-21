<?php if(isset($images) AND !empty($images)): ?>
<form action="<?php echo site_url('admin/gallery/update_image_info'); ?>" method="post">
    <?php foreach($images as $image): ?>
    <div>
        <img src="<?php echo $image['image_thumb_url']; ?>" alt="<?php echo $image['image_name']; ?>" />
        <input type="hidden" name="image_id[]" value="<?php echo $image['id']; ?>" />
        <div>
            <label for="title">Title</label>
            <input type="text" name="image_title[]" value="<?php echo $image['title']; ?>" />
        </div>
        <div>
            <label for="title">Description</label>
            <textarea cols="25" rows="5" name="image_description[]"><?php echo $image['description']; ?></textarea>
        </div>
    </div>
    <?php endforeach; ?>
    <input type="hidden" name="gallery_id" value="<?php echo $gallery_id; ?>" />
    <input type="submit" name="submit" value="Update" />
    <a href="#" id="cancel_image_edit">Cancel</a>
</form>
<?php else: ?>
<p>There is no images to edit. <a href="<?php echo site_url('admin/gallery'); ?>">Back to gallery list</a></p>
<?php endif; ?>