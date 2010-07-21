<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Change Password</legend>
            <div>
                <label for="username">Username</label>
                <?php echo form_input('username', set_value('username', '')); ?>
            </div>
            <div>
                <label for="password">New Password</label>
                <?php echo form_password('password', set_value('password', '')); ?>
            </div>
            <div>
                <label for="confirm_password">Confirm PAssword</label>
                <?php echo form_password('confirm_password', set_value('confirm_password', '')); ?>
            </div>
        </fieldset>
        <div>
            <?php echo form_submit('submit', 'Change', 'class="form_submit"'); ?>
        </div>
    </form>
</div>