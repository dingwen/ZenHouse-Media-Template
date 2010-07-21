<h2><?php echo $gallery['title']; ?></h2>
<div id="list">
<?php if(isset($images) AND !empty($images)): ?>
    <ul id="sortable">
    <?php foreach($images as $image): ?>
        <li id="<?php echo $image['id']; ?>" title="<?php echo $image['title']; ?>"><img src="<?php echo $image['image_thumb_url']; ?>" alt="<?php echo $image['image_name']; ?>" /></li>
    <?php endforeach; ?>
    </ul>
    <input type="button" value="Save" id="save_list" />
<?php else: ?>
    <p>There is no galleries exist or published.</p>
<?php endif; ?>
</div>
<script>
    $(function() {
        var sorted_list = new Array();
        var list = $('#sortable');
        var options = {axis: 'y', opacity: 0.6, cursor: 'crosshair'};

        list.sortable(options);
        list.disableSelection();

        $("#save_list").click(function() {
            list.children('li').each(function(index) {
                var temp = new Object();
                temp = {"id": $(this).attr('id'), "image": $(this).attr('title')};
                sorted_list[index] = temp;
            });
            $.post(BASE_URL + 'admin/gallery/update_sort_images', {'list': sorted_list}, function(data) {
                $('#list').before(data);
                $('a.close').click(function(e) {
                    e.preventDefault();
                    $(this).parents('.message').hide('fast');
                    return false;
                });
            });
        });
    });
</script>