<div id="left-col-inner">
    <div id="flash"></div><!--flash-->
</div><!--left-col-inner-->
<!--This is only for the home section on the page (welcome section)-->
<div id="right-col-inner">
    <div id="main-col-inner">
        <div class="main-inner">
            <h2 class="main-title"><?php echo $web_profile['welcome_title']; ?></h2>
            <p class="welcome"><?php echo $web_profile['welcome_message']; ?></p>
            <p class="tagline"><?php echo $web_profile['tagline']; ?></p>
            <div id="main-img">
            <object width="400" height="300"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=13468818&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=13468818&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="400" height="300"></embed></object>     
            </div><!--main-img-->
            <!--This is the end of the welcome section on the home page-->
        </div><!--main-inner-->
    </div><!--main-col-inner-->
    <div id="left-col-inner2">
        <div id="news-home">
            <div class="inner">
                <h3 class ="hbg2"><?php echo $news_content['title'] ?></h3>
                <label class="date"><?php echo date('M d, Y', strtotime($news_content['publish_date'])); ?></label>
                <p><?php echo $news_content['content']; ?><?php echo anchor(site_url('news/'.$news_content['slug']), 'Read More'); ?></p>
                <a href="<?php echo site_url('news'); ?>"><img src="<?php echo $theme_image_path.'news_btn.png'; ?>" /></a><div class="clear-both"></div>
                <label class="rss"><a href="<?php echo site_url('news/rss'); ?>"><img src="<?php echo $theme_image_path.'rss.png'; ?>" />&nbsp;Subscribe to Fairview Conveyor News</a></label>
            </div><!--inner-->
        </div><!--news-home-->
        <div id="event-home">
            <div class="inner">
                <h3 class="title">For Your Free Estimate,</h3>
                <h3 class="subtitle"><a href="<?php echo site_url('contact'); ?>">Contact Us Today.</a></h3>
            </div><!--inner-->
        </div><!--event-home-->
    </div><!--left-col-inner2-->
    <div id="right-col-inner2">
        <div id="featured-art">
            <div class="inner">
                <h3 class="hbg1">New Products</h3>
                <div id="featured-art-img"><img src="<?php echo $theme_image_path.'featured_art.jpg'; ?>" class="noborder"/></div><!--featured-art-img-->
                <label>WHAT:<span class="black"> &nbsp;Bucket Label</span></label>
                <label>BUILT FOR:<span class="black">&nbsp;Dan-D-Pak</span></label>
                <a href="<?php echo site_url('gallery'); ?>">More Examples of Our Work</a>
            </div><!--inner-->
        </div><!--featured-art-->
    </div><!--right-col-inner2-->
    <div id="ads">
        <ul>
            <li class="ad1"><img src="<?php echo $theme_image_path.'logo1.jpg'; ?>" /></li>
            <li class="ad2"><img src="<?php echo $theme_image_path.'logo2.jpg'; ?>" /></li>
            <li class="ad3"><img src="<?php echo $theme_image_path.'logo3.jpg'; ?>" /></li>
            <li class="ad4"><img src="<?php echo $theme_image_path.'logo4.jpg'; ?>" /></li>
            <li class="ad5"><img src="<?php echo $theme_image_path.'logo5.jpg'; ?>" /></li>
            <li class="ad6"><img src="<?php echo $theme_image_path.'logo6.jpg'; ?>" /></li>
        </ul>
    </div><!--ads-->
    <div class="clear-both"></div>
</div><!--right-col-inner-->