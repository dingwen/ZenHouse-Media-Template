<!-- TinyMCE -->
<script type="text/javascript">
    $(function(){
        $('textarea.tinymce').tinymce({
            scrtipt_url : ASSETS_URI + 'js/tiny_mce/tiny_mce.js',
            theme : "advanced",
            skin : "cirkuit",
            plugins : "advimage,advlink,media,contextmenu",
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontsizeselect",
            theme_advanced_buttons2 : "bullist,numlist,|,link,unlink,anchor,image,cleanup",
            theme_advanced_buttons3 : "",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,

            relative_urls : false,
            remove_script_host : false,
            document_base_url : "<?php echo BASE_URL; ?>",

            file_browser_callback: filebrowser
        });
        function filebrowser(field_name, url, type, win) {

            fileBrowserURL = "<?php echo BASE_URI; ?>pdw_file_browser/index.php?filter=" + type;

            tinyMCE.activeEditor.windowManager.open({
                title: "File Browser - by PDW",
                url: fileBrowserURL,
                width: 800,
                height: 600,
                inline: 0,
                maximizable: 1,
                close_previous: 0
            },{
                window : win,
                input : field_name
            });
        }
    });
</script>
<!-- /TinyMCE -->