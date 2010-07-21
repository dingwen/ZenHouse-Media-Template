<div>
    <h2><?php echo $gallery['title'] . ' Image Upload'; ?></h2>
    <p>Limited 8 Images per upload queue.</p>
    <div id="image_upload">You have a problem with your javascript</div>
    <a href="javascript:$('#image_upload').fileUploadStart()">Start Upload</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="javascript:$('#image_upload').fileUploadClearQueue()">Clear Queue</a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?php echo site_url('admin/gallery/view_gallery/' . $gallery['id']); ?>" id="view_gallery_link">View Gallery</a>
    <div id="upload_info"></div>
</div>
<script>
    $(function() {
        $("#view_gallery_link").hide();
        $("#image_upload").fileUpload({
            'uploader': "<?php echo APPPATH_URI . 'assets/flash/uploader.swf'; ?>",
            'cancelImg': "<?php echo image_path('cancel.png') ?>",
            'script': '<?php echo js_path('uploadify.php'); ?>',
            'folder': '<?php echo APPPATH_URI . "uploads/galleries/" . $gallery["slug"]; ?>',
            'multi': true,
            'buttonText': 'Select Images',
            'displayData': 'speed',
            'fileDesc': 'Image Files',
            'fileExt': '*.jpg;*.png',
            'sizeLimit': 1527846,
            'queueSizeLimit': 8,
            'scriptData': {'gallery_id': '<?php echo $gallery['id']; ?>'},
            'onError': function (a, b, c, d) {
                if (d.status == 404)
                    alert('Could not find upload script.');
                else if (d.type === "HTTP")
                    alert('error '+d.type+": "+d.status);
                else if (d.type ==="File Size")
                    alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
                else
                    alert('error '+d.type+": "+d.text);
            },
            'onComplete': function (event, queueID, fileObj, response, data) {
                $.post('<?php echo site_url('admin/gallery/upload'); ?>',{filearray: response},function(info){
                    $("#upload_info").append(info);
                });
            },
            'onAllComplete': function (event, data) {
                $("#view_gallery_link").show();
            }
        });
    });
</script>