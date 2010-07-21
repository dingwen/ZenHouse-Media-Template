<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>User Login</legend>
            <div>
                <label for="username">Username</label>
                <?php echo form_input('username', set_value('username', '')); ?>
            </div>
            <div>
                <label for="password">Password</label>
                <?php echo form_password('password', set_value('password', '')); ?>
            </div>
        </fieldset>
        <div>
            <?php echo form_submit('submit', 'Login', 'class="form_submit"'); ?>
            <?php echo anchor(site_url('users/change_password'), "Forget Password?") ?>
        </div>
    </form>
</div>