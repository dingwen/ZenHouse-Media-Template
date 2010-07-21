<?php if(isset($images) AND !empty($images)): ?>
<?php foreach($images as $image): ?>
<div>
    <input type="checkbox" value="<?php echo $image['id']; ?>" class="image_check_box" />
    <label><?php echo $image['title']; ?></label>
    <img src="<?php echo $image['image_thumb_url']; ?>" alt="<?php echo $image['image_name']; ?>" />
</div>
<?php endforeach; ?>
<?php else: ?>
<p>There is no images in this gallery.</p>
<?php endif; ?>