  jQuery(window).load(function () { 
    "use strict";
    jQuery("#page-overlay").fadeOut("slow"); 
});

jQuery(document).ready(function(){    
    "use strict";
    jQuery("footer .widget .menu").addClass("footer-dropdown");
    jQuery("footer .widget > ul").addClass("footer-dropdown");
    jQuery("footer .widget .gallery").addClass("footer-dropdown");

    jQuery(".sidebar .widget > ul").addClass("sidebar-dropdown");
    jQuery(".site-info ul").removeClass("footer-dropdown");
});


jQuery(document).ready(function(){
  jQuery("button.menu-toggle").click(function(){
    jQuery("#menu-navigation").slideToggle('slow');
});

  jQuery('.footer-title .widget-title').append( "<div class='widget-title-res'></div>" );

  jQuery(".footer-title .widget-title .widget-title-res").click(function() {
     var $this = jQuery(this).closest('aside.footer-column .widget section').find('.footer-dropdown');
     $this.slideToggle('slow');
     jQuery('.footer-dropdown').not($this).slideUp('slow');
 });

  jQuery('.main-navigation #menu-navigation > li.menu-item-has-children').prepend( "<div class='menu-title-res'></div>" );
  jQuery(".main-navigation #menu-navigation > li.menu-item-has-children > a ").each(function() {
     var $this = jQuery(this).closest('.main-navigation ul.menu > li.menu-item-has-children ').find('.menu-title-res');
     $this.html(jQuery(this).html());
 });

    jQuery(".main-navigation #menu-navigation > li.menu-item-has-children .menu-title-res").click(function() {
     var $this = jQuery(this).closest('.main-navigation ul.menu > li.menu-item-has-children ').find('.sub-menu');
     $this.slideToggle('slow');
 });

    jQuery("#smart-container #smart_category_block").wrapAll("<div class='smart_category_row'></div>");
});


function MenuDropdown() {
    "use strict";
if(jQuery(window).innerWidth() >= 991) {
   
     jQuery('.main-navigation ul.menu > li.menu-item-has-children .sub-menu').removeAttr( 'style' );
     jQuery('#menu-navigation.menu').removeAttr( 'style' );
}
}

jQuery(document).ready(function() {
    "use strict";
    MenuDropdown();
});
jQuery( window ).resize(function() {
    "use strict";
    MenuDropdown();
 });



jQuery(window).bind('scroll', function() {
	'use strict';
    if (jQuery(window).scrollTop() > 210) {
        jQuery('.site-header').addClass('fixed');
        /* jQuery('.site-header .site-branding').insertAfter('.site-header.fixed #site-navigation .menu-toggle');*/
    } else {
        jQuery('.site-header').removeClass('fixed');
        /*        jQuery('.site-header .site-branding').prependTo('.header-top > .container .col-sm-4');*/
    }
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
