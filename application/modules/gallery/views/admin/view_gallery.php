<h2><?php echo $gallery['title']; ?></h2>
<?php if(isset($images) AND !empty($images)): ?>
<a href="<?php echo site_url('admin/gallery/delete_image'); ?>" id="delete_image">delete selected images</a>&nbsp;
<a href="<?php echo site_url('admin/gallery/edit_image'); ?>" id="edit_image">edit selected images</a>&nbsp;
<a href="<?php echo site_url('admin/gallery/image_upload/'.$gallery['id']); ?>">upload images</a>&nbsp;
<a href="<?php echo site_url('admin/gallery/sort_images/'.$gallery['id']); ?>">sort images</a>
<p><input type="checkbox" value="all" id="select_all" />Select All</p>
<div id="image_list">
    <?php foreach($images as $image): ?>
    <div>
        <input type="checkbox" value="<?php echo $image['id']; ?>" class="image_check_box" />
        <label><?php echo $image['title']; ?></label>
        <img src="<?php echo $image['image_thumb_url']; ?>" alt="<?php echo $image['image_name']; ?>" />
    </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
<a href="<?php echo site_url('admin/gallery/image_upload/'.$gallery['id']); ?>">upload images</a>
<p>There is no images in this gallery.</p>
<?php endif; ?>
<div id="edit_images_form"></div>
<input type="hidden" id="gallery_slug" value="<?php echo $gallery['slug']; ?>" />
<input type="hidden" id="gallery_id" value="<?php echo $gallery['id']; ?>" />
<script>
    $(function () {
        $('#edit_images_form').hide();
        $('#select_all').click(function() {
            if(this.checked) {
                $('input.image_check_box').each(function () {
                    $(this).attr('checked', 'checked');
                });
            } else {
                $('input.image_check_box').each(function () {
                    $(this).removeAttr('checked');
                });
            }
        });
        $('#delete_image').click(function (e) {
            e.preventDefault();
            var selected_images = new Array();
            $('input.image_check_box').each(function () {
                if(this.checked) {
                    selected_images.push($(this).val());
                }
            });
            if(selected_images.length > 0) {
                $.post($(this).attr('href'),
                {'images[]': selected_images, 'gallery_id': $('#gallery_id').val(), 'gallery_slug': $('#gallery_slug').val()},
                function(data) { $('#image_list').html(data); }, 'html');
            }
            return false;
        });
        $('#edit_image').click(function (e) {
            e.preventDefault();
            var selected_images = new Array();
            $('input.image_check_box').each(function () {
                if(this.checked) {
                    selected_images.push($(this).val());
                }
            });
            if(selected_images.length > 0) {
                $.post($(this).attr('href'),
                {'images[]': selected_images, 'gallery_id': $('#gallery_id').val(), 'gallery_slug': $('#gallery_slug').val()},
                function(data) {
                    $('#image_list').hide();
                    var image_form = $('#edit_images_form');
                    image_form.html(data);
                    image_form.show();
                    $('#cancel_image_edit').click(function () {
                        image_form.html('');
                        image_form.hide();
                        $('#image_list').show();
                    });
                }, 'html');
            }
            return false;
        });
    });
</script>