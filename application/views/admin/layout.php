<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo $template['title']; ?></title>
        <script type="text/javascript">
            var APPPATH_URI = "<?php echo APPPATH_URI;?>";
            var BASE_URL = "<?php echo base_url();?>";
            var BASE_URI = "<?php echo BASE_URI;?>";
            var ASSETS_URI = "<?php echo BASE_URI . 'application/assets/';?>";
        </script>
    <?php if (!empty($template['partials']['google_cdn'])): ?>
        <?php echo $template['partials']['google_cdn']; ?>
    <?php endif; ?>
        <?php echo $template['metadata']; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php echo $template['partials']['header']; ?>
            <?php echo $template['partials']['nav']; ?>
            <div id="content-wrapper">
                <?php $this->load->view('admin/result_messages'); ?>
            <?php if (!empty($template['partials']['side_menu'])): ?>
                <div id="left-col">
                    <?php echo $template['partials']['side_menu']; ?>
                </div>
                <div id="right-col">
                    <?php echo $template['body']; ?>
                </div>
            <?php else: ?>
                <div id="mid-col">
                    <?php echo $template['body']; ?>
                </div>
            <?php endif; ?>
            </div>
            <?php echo $template['partials']['footer']; ?>
        </div>
    </body>
</html>