jQuery(window).load(function () { 
    "use strict";
    jQuery("#page-overlay").fadeOut("slow"); 
});

jQuery(document).ready(function(){    
    "use strict";
    jQuery("footer .widget .menu").addClass("footer-dropdown");
    jQuery("footer .widget > ul").addClass("footer-dropdown");
    jQuery("footer .widget.widget_text .textwidget  ul").addClass("footer-dropdown");
    jQuery("footer .widget .mc4wp-form").addClass("footer-dropdown");

    jQuery(".site-info ul").removeClass("footer-dropdown");
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
  jQuery("button.menu-toggle").click(function(){
    jQuery("#menu-navigation").slideToggle('slow');
});

});



jQuery(document).ready(function(){

    jQuery("#pms_plan_section #pms_plan_inner").each(function () {
            jQuery(this).wrapInner(" <div class='plan_content_inner'> </div>");
        });
    jQuery(".pms_services #pms_services_img").each(function () {
            jQuery(this).wrapInner(" <div class='pms_services_img_inner'> </div>");
        });
    jQuery(".pms_popularcat #pms_popularcat-content").each(function () {
            jQuery(this).wrapInner(" <div class='popularcat-content-inner'> </div>");
        });
});



jQuery(document).ready(function() {
        jQuery('#menu-navigation a[href*=#],#menu-footer-menu a[href*=#]').bind('click', function(e) {
                e.preventDefault(); // prevent hard jump, the default behavior

                var target = jQuery(this).attr("href"); // Set the target as variable

                // perform animated scrolling by getting top-position of target-element and set it as scroll target
                jQuery('html, body').stop().animate({
                        scrollTop: jQuery(target).offset().top
                }, 600, function() {
                        location.hash = target; //attach the hash (#jumptarget) to the pageurl
                });

                return false;
        });


    if (jQuery(window).width() > 768) { 
      jQuery(document).ready(function () {
        jQuery('#menu-navigation li a').on('click', function(){
            jQuery(this).parent().addClass('active').siblings().removeClass('active');
        });
    });
    }

  

});


function header_responsive(){
    if (jQuery(window).width() > 991) { 
        jQuery('.header-top .header-top-center').insertAfter('.header-top .header-top-left');
    }else{
        jQuery('.header-top .header-top-center').insertBefore('.header-top .header-top-left');
    } 
}
jQuery(document).ready(function() { header_responsive();});
jQuery(window).resize(function() {header_responsive();});



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
        jQuery('#scrollUp').addClass("fixed")
    } else {
        jQuery('#scrollUp').removeClass("fixed")
    }
});
jQuery('#scrollUp').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({
        scrollTop: 0
    }, 800)
});
