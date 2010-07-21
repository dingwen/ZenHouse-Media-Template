<div id="main-col-inner">
    <div class="inner">
        <h3><span class="title">Product Gallery:</span><?php echo $gallery['title']; ?></h3>
    </div><!--inner-->
</div><!--main-col-inner-->
<div id="left-col-inner">
    <div id="loading">Loading image ...</div>
    <div id="gallery-view-main"></div><!--gallery-view-main-->
    <div id="slide-control">
        <div class="photo-index"></div>
        <div class="pagination-img"></div>
    </div>
    <div class="clear-both"></div>
    <div id="gallery-mid-container">
        <div id="gallery-desc"></div><!--gallery-desc-->
        <div id="gallery-view-thumbs">
        <?php if(isset($gallery_image) AND !empty($gallery_image)): ?>
            <ul class="thumbs noscript">
                <?php foreach($gallery_image as $image): ?>
                <li>
                    <a class="thumb" href="<?php echo $image['image_url']; ?>" title="<?php echo $image['title']; ?>">
                        <img src="<?php echo $image['image_thumb_url']; ?>" alt="<?php echo $image['title']; ?>" />
                    </a>
                    <div class="caption">
                        <div class="inner">
                            <h4><?php echo $image['title']; ?></h4>
                            <p><?php echo $image['description']; ?></p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
        <?php endif; ?>
            </ul>
        </div>
        <div id="thumb-control">
            <div class="photo-index"></div>
            <div class="pagination-img"></div>
        </div>
    </div>
    <div class="clear-both"></div>
    <div id="gallery-about">
        <div class="inner">
            <h3>Project Description</h3>
            <p><?php echo $gallery['description']; ?></p>
        </div>
    </div><!--gallery-about-->
</div><!--left-col-inner-->
<div id="right-col-inner">
    <h3>PROJECTS</h3>
    <div id="subnav">
    <?php if (isset($galleries) AND !empty($galleries)): ?>
        <div class="secondary-nav">
            <div class="sub-category">
        <?php foreach ($galleries as $list): ?>
        <?php if ($list['id'] == $gallery['id']): ?>
                <div class="current"><?php echo $list['title']; ?></div>
        <?php else: ?>
                <div class="li"><a href="<?php echo site_url('gallery/' . $list['id']); ?>"><?php echo $list['title']; ?></a></div>
        <?php endif; ?>
        <?php endforeach; ?>
                </div><!--sub-category-->
            </div><!--secondary-nav-->
    <?php endif; ?>
    </div><!--subnav-->
</div><!--right-col-inner-->
<div class="clear-both"></div>
<script>
jQuery(document).ready(function($) {
    var onMouseOutOpacity = 0.45;

    $('#gallery-view-thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity:   onMouseOutOpacity,
        mouseOverOpacity:  1.0,
        fadeSpeed:         'fast',
        exemptionSelector: '.selected'
    });

    $('#gallery-view-thumbs').galleriffic({
        'delay':                     1500, // in milliseconds
        'numThumbs':                 8, // The number of thumbnails to show page
        'preloadAhead':              40, // Set to -1 to preload all images
        'enableTopPager':            false,
        'enableBottomPager':         false,
        'maxPagesToShow':            0,  // The maximum number of pages to display in either the top or bottom pager
        'imageContainerSel':         '#gallery-view-main', // The CSS selector for the element within which the main slideshow image should be rendered
        'controlsContainerSel':      'div.pagination-img', // The CSS selector for the element within which the slideshow controls should be rendered
        'captionContainerSel':       '#gallery-desc', // The CSS selector for the element within which the captions should be rendered
        'loadingContainerSel':       '#loading', // The CSS selector for the element within which should be shown when an image is loading
        'renderSSControls':          false, // Specifies whether the slideshow's Play and Pause links should be rendered
        'renderNavControls':         true, // Specifies whether the slideshow's Next and Previous links should be rendered
        'playLinkText':              '',
        'pauseLinkText':             '',
        'prevLinkText':              '',
        'nextLinkText':              '',
        'nextPageLinkText':          'Next',
        'prevPageLinkText':          'Previous',
        'enableHistory':             false, // Specifies whether the url's hash and the browser's history cache should update when the current slideshow image changes
        'enableKeyboardNavigation':  false, // Specifies whether keyboard navigation is enabled
        'autoStart':                 false, // Specifies whether the slideshow should be playing or paused when the page first loads
        'syncTransitions':           false, // Specifies whether the out and in transitions occur simultaneously or distinctly
        'defaultTransitionDuration': 800, // If using the default transitions, specifies the duration of the transitions
        'onSlideChange':             function(prevIndex, nextIndex) {
            this.find('ul.thumbs').children()
                .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                .eq(nextIndex).fadeTo('fast', 1.0);
            $('div.photo-index').html((nextIndex+1) +'/'+ this.data.length);
        },
        onPageTransitionOut:        function(callback) {
            this.fadeTo('fast', 0.0, callback);
        },
        onPageTransitionIn:         function() {
            this.fadeTo('fast', 1.0);
        }
    });
});
</script>