<?php if(isset($sub_categories) AND !empty($sub_categories)): ?>
<table id="sub-categories-list">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($sub_categories as $category): ?>
        <tr>
            <td><?php echo $category['name']; ?></td>
            <td>
                <?php echo anchor(site_url('admin/categories/edit/' . $category['parent_id'] . '/' . $category['id']), 'edit'); ?>
                <?php echo anchor(site_url('admin/categories/delete/' . $category['id']), 'delete', 'class="confirm"'); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
<?php else: ?>
<p>Please select a page from the Page List dropdown menu.</p>
<?php endif; ?>