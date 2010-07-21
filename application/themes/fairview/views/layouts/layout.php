<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $template['title']; ?></title>
        <script type="text/javascript">
            var APPPATH_URI = "<?php echo APPPATH_URI;?>";
            var BASE_URL = "<?php echo base_url();?>";
            var BASE_URI = "<?php echo BASE_URI;?>";
            var ASSETS_URI = "<?php echo BASE_URI . 'application/assets/';?>";
            var THEME_IMAGE = "<?php echo $theme_image_path;?>";
            var THEME_FLASH = "<?php echo $theme_flash_path;?>";
        </script>
        <?php if (!empty($template['partials']['google_cdn'])): ?>
            <?php echo $template['partials']['google_cdn']; ?>
        <?php endif; ?>
        <?php echo $template['metadata']; ?>
    </head>
    <body id="<?php echo $page_id; ?>">
    	<div id="wrapper">
   			<!--/*************MAIN SECTION OF THE SITE***************/-->
             <div id="main">
             	<div id="main-header">
                <?php echo $template['partials']['header']; ?>
                </div><!--main-header-->
                <div id="main-inner">
                    <div id="left-col">
                        <div id="logo"><a href="<?php echo BASE_URL; ?>"><h1>Fairview Conveyor Services Inc.</h1></a></div><!--logo-->
                        <!--/*************NAVIGATION SECTION***************/-->
                        <div id="nav">
                        <?php echo $template['partials']['nav']; ?>
                        </div><!--nav-->
                     </div><!--left-col-->
                     <div id="right-col">
                     	<?php echo $template['body']; ?>
                     	<!--/*************FOOTER***************/-->
                            <div id="footer">
                            <?php echo $template['partials']['footer']; ?>
                            </div><!--footer-->
                        </div><!--right-col-->
                     <div class="clear-both"></div>
                </div><!--main-inner-->
            </div><!--main-->
          <!--/*************END OF MAIN SECTION***************/-->
        </div><!--wrapper-->
    </body>
</html>