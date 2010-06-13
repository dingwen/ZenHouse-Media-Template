<div id="content-list">
<?php if(isset($links) AND !empty($links)): ?>
    <table id="social_media_list">
        <thead>
            <tr>
                <th>Text</th>
                <th>Type</th>
                <th>Url</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($links as $link): ?>
            <tr>
                <td><?php echo $link['text']; ?></td>
                <td><?php echo $link['type']; ?></td>
                <td><?php echo $link['url']; ?></td>
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
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
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
    </form>
</div>