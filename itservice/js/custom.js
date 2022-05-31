jQuery(document).ready(function(){
    jQuery('.its-page').mCustomScrollbar({
            mouseWheel: {
                preventDefault: false},
            contentTouchScroll: false,
            documentTouchScroll: false,
            theme: 'rounded',
        });
    

    jQuery('.custom-scroll').mCustomScrollbar({theme: 'rounded'});


    jQuery('#menu-navigation.menu a').each(function (index, item) {
        jQuery(item).attr('data-page', index + 1);
        jQuery(item).addClass('its-page-' + (index + 1));
        jQuery(item).unwrap(); 

    });

    jQuery('.md-modal .md-content .mdl-content').after('<div><span class="md-close"></span></div>');
    jQuery('.md-modal .md-content .mdl-content .custom-heading h2').after('<br>');


    jQuery('.its-page').each(function () {
        jQuery(this).find('.inner-content').wrapInner(" <div class='inner-column'> </div>");
    });
    jQuery('.its-page .inner-content .inner-column').each(function () {
        jQuery(this).find('.wpb_wrapper').first().unwrap();
    });

    jQuery('.its-page .inner-content .inner-column').each(function () {
        jQuery(this).find('.wpb_wrapper').first().contents().unwrap();

    });    

    jQuery('#menu-navigation.menu a.its-page-1').prepend('<img src="' + theme_directory + '/img/slogan.png" alt="slogan"/>');

    jQuery('#menu-navigation.menu a.its-page-3 h3').insertAfter('#menu-navigation.menu a.its-page-3 h2');


    jQuery("#its-article-bottom #its-article-content").each(function () {
            jQuery(this).wrapInner(" <div class='article-content-inner'> </div>");
        });
    jQuery(".its-popularcat #its-popularcat-content").each(function () {
            jQuery(this).wrapInner(" <div class='popularcat-content-inner'> </div>");
        });
});

