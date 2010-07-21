<div id="list">
<?php if(isset($galleries) AND !empty($galleries)): ?>
    <ul id="sortable">    
    <?php foreach($galleries as $gallery): ?>
        <li id="<?php echo $gallery['id']; ?>" title="<?php echo $gallery['title']; ?>"><?php echo $gallery['title']; ?></li>
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
                temp = {"id": $(this).attr('id'), "gallery": $(this).attr('title')};
                sorted_list[index] = temp;
            });
            $.post(BASE_URL + 'admin/gallery/update_sort_galleries', {'list': sorted_list}, function(data) {
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