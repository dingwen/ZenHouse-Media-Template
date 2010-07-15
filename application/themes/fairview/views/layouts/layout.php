<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $template['title']; ?></title>
    	<?php echo $template['metadata']; ?>
    </head>
    <body id="news">
    	<div id="wrapper">
   			<!--/*************MAIN SECTION OF THE SITE***************/-->
             <div id="main">
             	<div id="main-header">
                <?php echo $template['partials']['header']; ?>
                </div><!--main-header-->
                <div id="main-inner">
                    <div id="left-col">
                        <div id="logo"></div><!--logo-->
                        <h1>Fairview Conveyor<br />Services Inc.</h1>
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