<!-- TinyMCE -->
<script type="text/javascript">
    $(function(){
        $('textarea.tinymce').tinymce({
            scrtipt_url : ASSETS_URI + 'js/tiny_mce/tiny_mce.js',
            theme : "advanced",
            skin : "cirkuit",
            plugins : "",
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
            theme_advanced_buttons2 : "formatselect,fontsizeselect,|,bullist,numlist,|,link,unlink,cleanup",
            theme_advanced_buttons3 : "",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            document_base_url : "<?php echo BASE_URL; ?>"
        });
    });
</script>
<!-- /TinyMCE -->