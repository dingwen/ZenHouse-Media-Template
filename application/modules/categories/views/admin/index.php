<div id="content-list">
    <?php if(isset($main_categories) AND !empty($main_categories)): ?>
    <label for="main_categories">Page List: </label><?php echo form_dropdown('main_categories', $main_categories, 0, 'id="main-categories"') ?>
    <?php endif; ?>
    <div id="sub-categories"></div>
</div>
<script type="text/javascript">
    $(function() {
        $('#main-categories').bind('change keyup', function(){
            $.post("<?php echo site_url('admin/categories/get_sub'); ?>" + "/" + $(this).val(), {}, function(data) {
                $('#sub-categories').html(data);
                $('a.confirm').click(function() {return confirm('Are you sure you want to delete this!?');});
                $('#sub-categories-list').dataTable({
                    "aoColumns": [
                        null,
                        { "bSortable": false }
                    ]
                });
            });
        });
    });
</script>