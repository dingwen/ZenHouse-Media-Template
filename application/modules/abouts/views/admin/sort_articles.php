<div id="list">
<?php if(isset($articles) AND !empty($articles)): ?>
    <ul id="sortable">
    <?php if($category_enable): ?>
    <?php foreach($articles as $items): ?>
        <li id="<?php echo $items['category']['id']; ?>" class="category" title="<?php echo $items['category']['name']; ?>"><?php echo $items['category']['name']; ?>
            <ul class="articles">
            <?php foreach($items['articles'] as $about): ?>
                <li id="<?php echo $about['id']; ?>" title="<?php echo $about['title']; ?>"><?php echo $about['title']; ?></li>
            <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
    <?php else: ?>
    <?php foreach($articles as $about): ?>
        <li id="<?php echo $about['id']; ?>" title="<?php echo $about['title']; ?>"><?php echo $about['title']; ?></li>
    <?php endforeach; ?>
    <?php endif; ?>
    </ul>
    <input type="button" value="Save" id="save_list" />
<?php endif; ?>
</div>
<?php if($category_enable): ?>
<script>
    $(function() {
        var sorted_list = new Array();
        var list = $('#sortable');
        var articles = $('ul.articles');
        var options = {axis: 'y', opacity: 0.6, cursor: 'crosshair'};

        list.sortable(options);
        articles.sortable(options);
        list.disableSelection();
        articles.disableSelection();

        $("#save_list").click(function() {
            list.children('li.category').each(function(index) {
                var temp = new Object();
                temp.category = {"id": $(this).attr('id'), "category": $(this).attr('title')} ;
                temp.articles = new Array();
                $(this).find('li').each(function(index) {
                    temp.articles[index] = {"id": $(this).attr('id'), "article": $(this).attr('title')};
                });
                sorted_list[index] = temp;
            });
            $.post(BASE_URL + 'admin/abouts/update_sort', {'list': sorted_list}, function(data) {
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
                temp = {"id": $(this).attr('id'), "article": $(this).attr('title')};
                sorted_list[index] = temp;
            });
            $.post(BASE_URL + 'admin/abouts/update_sort', {'list': sorted_list}, function(data) {
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