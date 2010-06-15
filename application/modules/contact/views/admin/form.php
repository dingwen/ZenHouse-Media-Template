<?php
    $have_phones = !empty($contact->phones);
    $have_emails = !empty($contact->emails);
?>
<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Contact Information</legend>
            <div>
                <label>Unit No.</label>
                <?php echo '# ' . form_input('unit_no', set_value('unit_no', $contact->unit_no), 'class="long"'); ?>
            </div>
            <div>
                <label>Address</label>
                <?php echo form_input('address', set_value('address', $contact->address), 'class="long"'); ?>
            </div>
            <div>
                <label>City</label>
                <?php echo form_input('city', set_value('city', $contact->city), 'class="long"'); ?>
            </div>
            <div>
                <label>Province/State</label>
                <?php echo form_input('region', set_value('region', $contact->region), 'class="long"'); ?>
            </div>
            <div>
                <label>Country</label>
                <?php echo form_input('country', set_value('country', $contact->country), 'class="long"'); ?>
            </div>
            <div>
                <label>Postal/Zip Code</label>
                <?php echo form_input('postcode', set_value('postcode', $contact->postcode), 'class="long"'); ?>
            </div>
            <?php for($i = 0; $i < $phone_limit; $i++): ?>
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[' . $i . ']', $contact->phones[$i]), 'class="long"');
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $contact->phones), 'class="long"');
                    } ?>
            </div>
            <?php endfor; ?>
        </fieldset>
        <fieldset>
            <legend>Contact Form Preset</legend>
            <div>
                <label>Subject</label>
                <?php echo form_input('subject', set_value('subject', $contact->subject), 'class="long"'); ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Emails</legend>
            <?php for($i = 0; $i < $email_limit; $i++): ?>
            <div>
                <label>Email</label>
                <?php if($have_emails) {
                        echo form_input('emails[]', set_value('emails[' . $i . ']', $contact->emails[$i]), 'class="long"');
                    } else {
                        echo form_input('emails[]', set_value('emails[]', $contact->emails), 'class="long"');
                    } ?>
            </div>
            <?php endfor; ?>
        </fieldset>
        <div>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
            <?php echo anchor(site_url('admin/contact'), 'Cancel'); ?>
        </div>
    </form>
</div>