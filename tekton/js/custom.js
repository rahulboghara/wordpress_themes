jQuery(document).ready(function(){    
    "use strict";
    jQuery("footer .widget section .menu").addClass("footer-dropdown");
    jQuery("footer .widget section > ul").addClass("footer-dropdown");
    jQuery("footer .widget section .textwidget ul").addClass("footer-dropdown");

});

jQuery(document).ready(function() {
    jQuery('.footer-title .widget-title').append( "<div class='widget-title-res'></div>" );

    jQuery(".footer-title .widget-title .widget-title-res").click(function() {
       var $this = jQuery(this).closest('aside.footer-column .widget section').find('.footer-dropdown');
       $this.slideToggle('slow');
       jQuery('.footer-dropdown').not($this).slideUp('slow');
    });
});

jQuery(document).ready(function(){
    'use strict';
  jQuery("button.menu-toggle").click(function(){
    jQuery("#menu-navigation").slideToggle('slow');
    jQuery("#top-menu").slideUp('slow');

});

  jQuery("button.top-menu-toggle").click(function(){
    jQuery("#top-menu").slideToggle('slow');
    jQuery("#menu-navigation").slideUp('slow');
    
});

});



jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('.backtotop').addClass("fixed")
    } else {
        jQuery('.backtotop').removeClass("fixed")
    }
});
jQuery('.backtotop').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({
        scrollTop: 0
    }, 800)
});
