<div id="main-col-inner">
    <div class="main-inner">
        <div id="main-img"><img src="<?php echo $theme_image_path . 'news_img.jpg'; ?>" class="noborder"/></div><!--main-img-->
    </div><!--main-inner-->
</div><!--main-col-inner-->
<div id="left-col-inner">
    <div class="inner">
        <h2><?php echo $content['title']; ?></h2>
        <ul class="news-social-media">
            <li><a href="<?php echo site_url('news/rss'); ?>"><img src="<?php echo $theme_image_path . 'rss.png'; ?>"/>&nbsp;Subscribe</a></li>
            <li><?php echo $web_settings['sharethis']; ?></li>
            <li><a href="mailto:?subject=<?php echo $content['title']; ?>&body=link:<?php echo site_url('news/'.$content['slug']); ?>"><img src="<?php echo $theme_image_path . 'email.png'; ?>"/>&nbsp;Email</a></li>
        </ul>
        <div class="clear-both"></div>
            <label><?php echo date('F d, Y', strtotime($content['publish_date'])); ?></label>
            <?php echo $content['content']; ?>
    </div><!--inner-->
</div><!--left-col-inner-->
<div id="right-col-inner">
        <h3>ARCHIVES</h3>
        <div id="subnav">
            <?php if (isset($list) AND !empty($list)): ?>
                <ul class="secondary-nav">
                    <div class="category"></div>
                        <div class="sub-category">
                        <?php foreach ($list as $title): ?>
                        <?php if($title['id'] == $content['id']): ?>
                            <div class="current"><?php echo $title['title']; ?></div>
                        <?php else: ?>
                            <div class="li"><a href="<?php echo site_url('news/'.$title['slug']) ?>"><?php echo $title['title']; ?></a></div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </div><!--sub-category-->
                </ul><!--secondary-nav-->
            <?php endif; ?>
        </div><!--subnav-->
</div><!--right-col-inner-->