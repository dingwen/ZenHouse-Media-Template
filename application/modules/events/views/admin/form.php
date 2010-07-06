<div id="form">
    <form action="<?php echo site_url(uri_string()); ?>" method="post">
        <fieldset>
            <legend>Events Information</legend>
            <div>
                <label>Title</label>
                <?php echo form_input('title', set_value('title', $events->title)); ?>
            </div>
            <div>
                <label>Subtitle</label>
                <?php echo form_input('title', set_value('title', $events->subtitle)); ?>
            </div>
            <?php if($category_enable): ?>
            <div>
                <label>Category</label>
                <?php echo form_dropdown('category', $categories, set_value('category', $events->category)); ?>
            </div>
            <?php endif; ?>
            <div>
                <label>Image Upload</label>
                <?php echo form_input('file_name', set_value('image', $events->image), 'id="file-name" disabled="true"'); ?>
                <?php echo form_button('', 'Browse', 'id="ajax-upload"')?>
                <?php echo form_hidden('image', set_value('image', $events->image)) ?>
                <div id="fileupload"></div>
            </div>
            <div>
                <label>Event Description</label>
                <?php
                    $description_textarea = array(
                        'name' => 'description',
                        'value' => set_value('description', $events->description),
                        'class' => 'jwysiwyg',
                        'rows' => "10",
                        'cols' => "50"
                    );
                    echo form_textarea($description_textarea);
                ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Contact Information</legend>
            <div>
                <label>Where</label>
                <?php echo form_input('where', set_value('where', $events->where)); ?>
            </div>
            <div>
                <label>Unit No.</label>
                <?php echo '# ' . form_input('unit_no', set_value('unit_no', $events->unit_no), 'class="long"'); ?>
            </div>
            <div>
                <label>Address</label>
                <?php echo form_input('address', set_value('address', $events->address), 'class="long"'); ?>
            </div>
            <div>
                <label>City</label>
                <?php echo form_input('city', set_value('city', $events->city), 'class="long"'); ?>
            </div>
            <div>
                <label>Province/State</label>
                <?php echo form_input('region', set_value('region', $events->region), 'class="long"'); ?>
            </div>
            <div>
                <label>Country</label>
                <?php echo form_input('country', set_value('country', $events->country), 'class="long"'); ?>
            </div>
            <div>
                <label>Postal/Zip Code</label>
                <?php echo form_input('postcode', set_value('postcode', $events->postcode), 'class="long"'); ?>
            </div>
            <?php for($i = 0; $i < $phone_limit; $i++): ?>
            <div>
                <label>Phone Number</label>
                <?php if($have_phones) {
                        echo form_input('phones[]', set_value('phones[' . $i . ']', $events->phones[$i]), 'class="long"');
                        echo form_dropdown('phones_type[]', $phone_types, set_value('phones_type[' . $i . ']', $events->phones_type[$i]));
                    } else {
                        echo form_input('phones[]', set_value('phones[]', $events->phones), 'class="long"');
                        echo form_dropdown('phones_type[]', $phone_types, set_value('phones_type[' . $i . ']', $events->phones_type));
                    } ?>
            </div>
            <?php endfor; ?>
        </fieldset>
        <fieldset>
            <legend>Search Engine Option</legend>
            <div>
                <label>Meta Keywords</label>
                <?php echo form_input('meta_keywords', set_value('meta_keywords', $events->meta_keywords), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Title</label>
                <?php echo form_input('meta_title', set_value('meta_title', $events->meta_title), 'class="long"'); ?>
            </div>
            <div>
                <label>Meta Description</label>
                <?php
                    $meta_description_textarea = array(
                        'name' => 'meta_description',
                        'value' => set_value('meta_description', $events->meta_description),
                        'class' => 'medium',
                        'rows' => "5",
                        'cols' => "50"
                    );
                    echo form_textarea($meta_description_textarea);
                ?>
            </div>
        </fieldset>
    </form>
</div>