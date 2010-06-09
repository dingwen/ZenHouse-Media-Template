<?php if($this->session->flashdata('error')): ?>
<div class="message error">
    <h4>Error!</h4>
    <p>Can not perform requested action!</p>
    <a href="#" class="close">close</a>
</div>
<?php endif; ?>
<?php if(function_exists('validation_errors')): ?>
    <?php if(validation_errors()): ?>
<div class="message error">
    <h4>Form Error!</h4>
    <p><?php echo validation_errors(); ?></p>
    <a href="#" class="close">close</a>
</div>
    <?php endif; ?>
<?php endif; ?>
<?php if($this->session->flashdata('success')): ?>
<div class="message success">
    <h4>Success!</h4>
    <p>The action is performed successfully.</p>
    <a href="#" class="close">close</a>
</div>
<?php endif; ?>