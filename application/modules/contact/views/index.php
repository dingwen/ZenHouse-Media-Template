<div id="main-col-inner">
        <div class="main-inner">
           <div id="main-img"><img src="<?php echo $theme_image_path.'contact_img.jpg'; ?>"/></div><!--main-img-->
        </div><!--main-inner-->
    </div><!--main-col-inner-->
<div id="left-col-inner">
    <div id="contact-box">
        <div class="inner">
            <h2>Contact Us</h2>
            <h3><?php echo $web_profile['name']; ?></h3>
            <p><?php echo 'Unit '.$contact['unit_no'].' - '.$contact['address']; ?></p>
            <p><?php echo $contact['city'].', '.$contact['region'].', '.$contact['country']; ?></p>
            <?php foreach($contact['phones'] as $phone): ?>
                <?php if(!empty($phone)): ?>
            <label><span class="blue">t</span> <?php echo $phone ?></label>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach($contact['emails'] as $email): ?>
                <?php if(!empty($email)): ?>
            <label><span class="blue">e</span> <?php echo mailto($email, $email); ?></label>
                <?php endif; ?>
            <?php endforeach; ?>
        </div><!--inner-->
    </div><!--contact-box-->
    <div id="google-maps"></div><!--google-maps-->
    <script>
        $(function() {
            $('#google-maps').gMap({ markers: [
                        {address: "<?php echo $contact['address'].', '.$contact['city'].', '.$contact['region'].', '.$contact['country']; ?>",
                        html: "<?php echo $web_profile['name']; ?>"}
                ],
                address: "<?php echo $contact['address'].', '.$contact['city'].', '.$contact['region'].', '.$contact['country']; ?>",
                zoom: 11
            });
        });
    </script>
</div><!--left-col-inner-->
<div id="right-col-inner">
    <div class="inner">
        <?php if(isset($email_is_sent) AND $email_is_sent): ?>
        <p>Your message is sent. Thanks!</p>
        <?php endif; ?>
        <form action="<?php echo site_url(uri_string()); ?>" method="post">
            <div>
                <label for="name">NAME:</label><?php echo form_error('name'); ?>
                <input id="name" type="text" name="name" value="<?php echo set_value('name'); ?>" />
            </div>
            <div>
                <label for="email">EMAIL ADDRESS:</label><?php echo form_error('email'); ?>
                <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"/>
            </div>
            <div>
                <label for="subject">SUBJECT:</label><?php echo form_error('subject'); ?>
                <input id="subject" type="text" name="subject" value="<?php echo set_value('subject'); ?>"/>
            </div>
            <div>
                <label for="message">MESSAGE:</label><?php echo form_error('message'); ?>
                <textarea name="message"><?php echo set_value('message'); ?></textarea>
            </div>
            <div class="controls">
                <input id="submit" name="submit" type="submit" value=""/>
            </div>
        </form>
    </div><!--inner-->
</div><!--right-col-inner-->
<div class="clear-both"></div>
<div id="right-col-inner2">
    <img src="<?php echo $theme_image_path.'contact_img2.jpg'; ?>" />
    <img src="<?php echo $theme_image_path.'contact_img3.jpg'; ?>" />
</div><!--right-col-inner2-->