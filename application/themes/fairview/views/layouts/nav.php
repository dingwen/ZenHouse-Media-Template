<ul id="primary-nav">
    <li>
        <a class="<?php echo $page_id == 'index' ? 'current' : 'home'; ?>" href="<?php echo BASE_URL; ?>">HOME</a>
    </li>
    <li>
        <a class="<?php echo $page_id == 'about' ? 'current' : 'about'; ?>" href="<?php echo site_url('about'); ?>">ABOUT US</a>
    </li>
    <!--ABOUT SUB NAV-->
    <?php if ($page_id == 'about'): ?>
        <?php if (isset($about_list) AND !empty($about_list)): ?>
        <ul class="sub-category">
            <?php foreach($about_list as $list): ?>
            <li><a  id="<?php echo $list['slug'];?>" <?php echo $list['slug'] == $content['slug'] ? 'style="background-position: 0 -24px"' : '';?> href="<?php echo site_url('about/'.$list['slug']); ?>"><?php echo $list['title']; ?></a></li>
            <?php endforeach; ?>
        </ul><!--sub-category-->
        <?php endif; ?>
    <?php endif; ?>
    <li>
        <a class="<?php echo $page_id == 'gallery' ? 'current' : 'gallery'; ?>" href="<?php echo site_url('gallery'); ?>">PRODUCTS</a>
    </li>
    <li>
        <a class="<?php echo $page_id == 'contact' ? 'current' : 'contact'; ?>" href="<?php echo site_url('contact'); ?>">CONTACT US</a>
    </li>
    <li>
        <a class="<?php echo $page_id == 'news' ? 'current' : 'news'; ?>" href="<?php echo site_url('news'); ?>">NEWS</a>
    </li>
</ul><!--primary-nav-->