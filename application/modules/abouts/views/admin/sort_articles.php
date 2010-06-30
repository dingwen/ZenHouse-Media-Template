<div>
    <ul id="sortable">
        <li id="1" class="category" title="Category 1">Category 1
            <ul class="articles">
                <li id="1" title="List Item 1">List Item 1</li>
            </ul>
        </li>
    </ul>
    <input type="button" value="Save" id="save_list" />
</div>
<script type="text/javascript">
    $(function() {
        var list = $('#sortable');
        var articles = $('ul.articles');
        var options = {axis: 'y', opacity: 0.6, cursor: 'crosshair'};

        list.sortable(options);
        articles.sortable(options);
        list.disableSelection();
        articles.disableSelection();

        $("#save_list").click(function() {
            var sorted_list = new Array();
            list.children('li.category').each(function(index) {
                var temp = new Object();
                temp.category = {"id": $(this).attr('id'), "category": $(this).attr('title')} ;
                temp.articles = new Array();
                $(this).find('li').each(function(index) {
                    temp.articles[index] = {"id": $(this).attr('id'), "article": $(this).attr('title')};
                });
                sorted_list[index] = temp;
            });
        });
    });
</script>