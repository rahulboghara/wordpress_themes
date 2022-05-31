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

    jQuery("#mrb_plan_section #mrb_plan_inner").each(function () {
            jQuery(this).wrapInner(" <div class='plan_content_inner'> </div>");
        });
    jQuery(".mrb_services #mrb_services_img").each(function () {
            jQuery(this).wrapInner(" <div class='mrb_services_img_inner'> </div>");
        });
    jQuery(".mrb_popularcat #mrb_popularcat-content").each(function () {
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
