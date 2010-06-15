<?php
    $have_phones = !empty($profile->phones);
    $have_emails = !empty($profile->emails);
?>
<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Basic Information</legend>
            <div>
                <label>First Name</label>
                <?php echo form_input('first_name', set_value('first_name', $profile->first_name)); ?>
            </div>
            <div>
                <label>Last Name</label>
                <?php echo form_input('last_name', set_value('last_name', $profile->last_name)); ?>
            </div>
            <div>
                <label>Photo Upload</label>
                <?php echo form_input('file_name', set_value('photo', $profile->photo), 'id="file-name" disabled="true"'); ?>
                <?php echo form_button('', 'Browse', 'id="ajax-upload"')?>
                <?php echo form_hidden('photo', set_value('photo', $profile->photo)) ?>
                <div id="fileupload"></div>
            </div>
            <div>
                <label>Artist Biography</label>
                <?php
                    $bio_textarea = array(
                        'name' => 'bio',
                        'value' => set_value('bio', $profile->bio),
                        'class' => 'jwysiwyg',
                        'rows' => "10",
                        'cols' => "50"
                    );
                    echo form_textarea($bio_textarea);
                ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Emails</legend>
            <?php for($i = 0; $i < $email_limit; $i++): ?>
            <div>
                <label>Email</label>
                <?php if($have_emails) {
                        echo form_input('emails[]', set_value('emails[' . $i . ']', $profile->emails[$i]), 'class="long"');
                    } else {
                        echo form_input('emails[]', set_value('emails[]', $profile->emails), 'class="long"');
                    } ?>
            </div>
            <?php endfor; ?>
        </fieldset>
        <fieldset>
            <legend>Contact Information</legend>
            <div>
                <label>Unit No.</label>
                <?php echo '# ' . form_input('unit_no', set_value('unit_no', $profile->unit_no), 'class="long"'); ?>
            </div>
            <div>
                <label>Address</label>
                <?php echo form_input('address', set_value('address', $profile->address), 'class="long"'); ?>
            </div>
            <div>
                <label>City</label>
                <?php echo form_input('city', set_value('city', $profile->city), 'class="long"'); ?>
            </div>
            <div>
                <label>Province/State</label>
                <?php echo form_input('region', set_value('region', $profile->region), 'class="long"'); ?>
            </div>
            <div>
                <label>Country</label>
                <?php echo form_input('country', set_value('country', $profile->country), 'class="long"'); ?>
            </div>
            <div>
                <label>Postal/Zip Code</label>
                <?php echo form_input('postcode', set_value('postcode', $profile->postcode), 'class="long"'); ?>
            </div>
            <?php for($i = 0; $i < $phone_limit; $i++): ?>
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[' . $i . ']', $profile->phones[$i]), 'class="long"');
                        echo form_dropdown('phones_type[]', $phone_types, set_value('phones_type[' . $i . ']', $profile->phones_type[$i]));
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $profile->phones), 'class="long"');
                        echo form_dropdown('phones_type[]', $phone_types, set_value('phones_type[' . $i . ']', $profile->phones_type));
                    } ?>
            </div>
            <?php endfor; ?>
        </fieldset>
        <fieldset>
            <legend>Additional Information</legend>
            <div>
                <label>Title</label>
                <?php echo form_input('addtional_title', set_value('addtional_title', $profile->addtional_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Content</label>
                <?php
                    $addtional_content_textarea = array(
                        'name' => 'addtional_content',
                        'value' => set_value('addtional_content', $profile->addtional_content),
                        'class' => 'jwysiwyg',
                        'rows' => "10",
                        'cols' => "50"
                    );
                    echo form_textarea($addtional_content_textarea);
                ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Search Engine Option</legend>
            <div>
                <label>Meta Keywords</label>
                <?php echo form_input('meta_keywords', set_value('meta_keywords', $profile->meta_keywords), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Title</label>
                <?php echo form_input('meta_title', set_value('meta_title', $profile->meta_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Description</label>
                <?php
                    $meta_description_textarea = array(
                        'name' => 'meta_description',
                        'value' => set_value('meta_description', $profile->meta_description),
                        'class' => 'medium',
                        'rows' => "5",
                        'cols' => "50"
                    );
                    echo form_textarea($meta_description_textarea);
                ?>
            </div>
        </fieldset>
        <div>
            <input type="submit" value="Submit" name="submit" class="submit_btn"/>
        </div>
    </form>
</div>
