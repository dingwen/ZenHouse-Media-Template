<div id="content-list">
<?php if(isset($links) AND !empty($links)): ?>
    <table id="social_media_list">
        <thead>
            <tr>
                <th>Text</th>
                <th>Type</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($links as $link): ?>
            <tr>
                <td><?php echo $link['text']; ?></td>
                <td><?php echo $link['type']; ?></td>
                <td><?php echo $link['url']; ?></td>
                <td>
                    <?php echo anchor(site_url('admin/contact/get_social_media/' . $link['id']), 'edit', 'class="edit"') ?>
                    <?php echo anchor(site_url('admin/contact/delete_social_media/' . $link['id']), 'delete', 'class="confirm"') ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Text</th>
                <th>Type</th>
                <th>Url</th>
            </tr>
        </tfoot>
    </table>
<?php else: ?>
    <p>No Social Media Link is created. Please use the form below to create social media links.</p>
<?php endif; ?>
</div>
<div id="form">
    <form action="<?php echo site_url('admin/contact/add_social_media'); ?>" method="post">
        <div>
            <label>Social Media List</label>
            <?php echo form_dropdown('type', $types, set_value('social_media_type', ''), 'id="social_media_type"') ?>
            <label>Link Text</label>
            <?php echo form_input('text', set_value('social_meida_url', ''), 'id="social_media_text"'); ?>
        </div>
        <div>
            <label>Social Media URL</label>
            <?php echo form_input('url', set_value('social_meida_url', ''), 'id="social_media_url"'); ?>
        </div>
        <div>
            <?php echo form_hidden('id', set_value('id', '0')); ?>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
        </div>
    </form>
</div>
<?php
    if($links_count < $links_limit) {
        echo form_hidden('allow', 1);
    } else {
        echo form_hidden('allow', 0);
    }
?>