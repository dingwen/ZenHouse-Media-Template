<div id="main">
    <div id="main-header"><h2 class="head-title"></h2></div><!--main-header-->
    <div id="main-inner">
        <div id="left-col">
            <div id="subnav">
            <?php if(isset($about_list) AND !empty($about_list)): ?>
                <ul class="secondary-nav">
                <?php foreach($about_list as $list): ?>
                    <li class="<?php echo $list['slug'] == $content['slug'] ? 'current' : 'nav2'; ?>">
                        <a href="<?php echo site_url('about/'.$list['slug']); ?>">
                        <?php
                            if(!empty($list['link_name'])) {
                                echo $list['link_name'];
                            } else {
                                echo $list['title'];
                            }
                        ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </div><!--subnav-->
        </div><!--left-col-->
        <div id="right-col">
        <?php if(isset($content) AND !empty($content)): ?>
            <h2><?php echo $content['title']; ?></h2>
            <?php echo $content['content']; ?>
        <?php else: ?>
            <h2>Coming Soon</h2>
            <p>The content is on its way.</p>
        <?php endif; ?>
        </div><!--right-col-->
        <div class="clear-both"></div>
    </div><!--main-inner-->
</div><!--main-->