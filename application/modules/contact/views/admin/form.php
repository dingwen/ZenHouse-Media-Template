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
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[0]', $contact->phones[0]), 'class="long"');
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $contact->phones), 'class="long"');
                    } ?>
            </div>
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[1]', $contact->phones[1]), 'class="long"');
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $contact->phones), 'class="long"');
                    } ?>
            </div>
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[2]', $contact->phones[2]), 'class="long"');
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $contact->phones), 'class="long"');
                    } ?>
            </div>
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
            <div>
                <label>Email</label>
                <?php if($have_emails) {
                        echo form_input('emails[]', set_value('emails[0]', $contact->emails[0]), 'class="long"');
                    } else {
                        echo form_input('emails[]', set_value('emails[]', $contact->emails), 'class="long"');
                    } ?>
            </div>
            <div>
                <label>Email</label>
                <?php if($have_emails) {
                        echo form_input('emails[]', set_value('emails[1]', $contact->emails[1]), 'class="long"');
                    } else {
                        echo form_input('emails[]', set_value('emails[]', $contact->emails), 'class="long"');
                    } ?>
            </div>
            <div>
                <label>Email</label>
                <?php if($have_emails) {
                        echo form_input('emails[]', set_value('emails[2]', $contact->emails[2]), 'class="long"');
                    } else {
                        echo form_input('emails[]', set_value('emails[]', $contact->emails), 'class="long"');
                    } ?>
            </div>
        </fieldset>
        <div>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
            <?php echo anchor(site_url('admin/contact'), 'Cancel'); ?>
        </div>
    </form>
</div>