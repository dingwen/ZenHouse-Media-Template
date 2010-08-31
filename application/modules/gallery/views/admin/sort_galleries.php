<div id="list">
<?php if ($gallery_category_enable): ?>
    <?php if(isset($galleries) AND isset($galleries_with_cate)): ?>
        <ul class="sortable">
        <?php foreach($galleries_with_cate as $category): ?>
            <li id="<?php echo $category['id'] ?>" class="category" title="<?php echo $category['name']; ?>"><?php echo $category['name']; ?>
                <?php if(!empty($category['galleries'])): ?>
                <ul class="galleries">
                    <?php foreach($category['galleries'] as $gallery): ?>
                    <li id="<?php echo $gallery['id']; ?>" title="<?php echo $gallery['title']; ?>"><?php echo $gallery['title']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
        <ul class="sortable">
        <?php foreach($galleries as $gallery): ?>
            <li class="no_category" id="<?php echo $gallery['id']; ?>" title="<?php echo $gallery['title']; ?>"><?php echo $gallery['title']; ?></li>
        <?php endforeach; ?>
        </ul>
        <input type="button" value="Save" id="save_list" />
    <?php else: ?>
        <p>There is no galleries exist or published.</p>
    <?php endif; ?>
<?php else: ?>
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
<?php endif; ?>
</div>
<?php if($gallery_category_enable): ?>
<script>
    $(function() {
        var sorted_list = new Array();
        var no_cate_list = new Array();
        var list = $('ul.sortable');
        var galleries = $('ul.galleries');
        var options = {axis: 'y', opacity: 0.6, cursor: 'crosshair'};

        list.sortable(options);
        galleries.sortable(options);
        list.disableSelection();
        galleries.disableSelection();

        $("#save_list").click(function() {
            list.children('li.category').each(function(index) {
                var temp = new Object();
                temp.category = {"id": $(this).attr('id')};
                temp.galleries = new Array();
                $(this).find('li').each(function(index) {
                    temp.galleries[index] = {"id": $(this).attr('id')};
                });
                sorted_list[index] = temp;
            });
            list.children('li.no_category').each(function(index) {
                var temp = new Object();
                temp = {"id": $(this).attr('id')};
                no_cate_list[index] = temp;
            });
            $.post(BASE_URL + 'admin/gallery/update_sort_galleries', {'list': sorted_list, 'no_cate_list': no_cate_list}, function(data) {
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
<?php else: ?>
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
                temp = {"id": $(this).attr('id')};
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
<?php endif; ?>