(function($) {
    $(function() {
        $('#flash').flash({
            swf: THEME_FLASH+'fairview_belt_animation.swf',
            height: 1076,
            width: 500,
            quality: 'high',
            align: 'middle',
            wmode: 'transparent',
            id: 'fairview_belt_animation',
            name: 'fairview_belt_animation',
            allowFullScreen: 'false',
            hasVersion: 10,
            expressInstaller: THEME_FLASH+'expressInstall.swf'
        });
    });
})(jQuery);