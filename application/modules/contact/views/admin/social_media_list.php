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