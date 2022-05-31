function FooterDropdownAddClass() {
    "use strict";
    jQuery('.widget .footer-title').click(function() {
        if (jQuery(this).parent().hasClass('dropdown-add')) {
            jQuery(this).parent().removeClass('dropdown-add');
            jQuery(this).parent().addClass('dropdown-remove')
        } else {
            jQuery(this).parent().addClass('dropdown-add');
            jQuery(this).parent().removeClass('dropdown-remove')
        }
        return (!1)
    })
}
jQuery(document).ready(function() {
    "use strict";
    FooterDropdownAddClass()
});



function SidebarDropdownAddClass() {
    "use strict";
    jQuery('.sidebar .widget .widget-title').click(function() {
        if (jQuery(this).parent().hasClass('dropdown-add')) {
            jQuery(this).parent().removeClass('dropdown-add');
            jQuery(this).parent().addClass('dropdown-remove')
        } else {
            jQuery(this).parent().addClass('dropdown-add');
            jQuery(this).parent().removeClass('dropdown-remove')
        }
        return (!1)
    })
}

jQuery(document).ready(function() {
    "use strict";
    SidebarDropdownAddClass()
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


jQuery(".search-toggle").click(function(){
        jQuery(".overlay").slideToggle('slow');
})
jQuery(".search_close").click(function(){
    jQuery(".overlay").slideUp('slow');  
})
});


jQuery(window).bind('scroll', function() {
	'use strict';
    if (jQuery(window).scrollTop() > 210) {
        jQuery('.site-header').addClass('fixed');
       /* jQuery('.site-header .site-branding').insertAfter('.site-header.fixed #site-navigation .menu-toggle');*/
    } else {
        jQuery('.site-header').removeClass('fixed');
/*        jQuery('.site-header .site-branding').prependTo('.header-top > .container .col-xs-4');*/
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


/*
jQuery(document).ready(function() {
    var max_elem = 4;
    var items = jQuery('ul#blog-middel-menu-items > li');
    var surplus = items.slice(max_elem, items.length);
    surplus.wrapAll('<li class="more_menu" id="more_menu"><div id="moremenu" ><ul class="sub_more_menu top-menu">');
    jQuery('ul#blog-middel-menu-items .more_menu').prepend('<a href="#"><span class="float-xs-right hidden-md-up"></span>More</a>');
    jQuery('ul#blog-middel-menu-items .more_menu').mouseover(function() {
        jQuery(this).children('div').css('display', 'block');
    }).mouseout(function() {
        jQuery(this).children('div').css('display', 'none');
    });
});*/