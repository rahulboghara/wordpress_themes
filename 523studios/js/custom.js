

jQuery(document).ready(function(){
    'use strict';
  jQuery("button.menu-toggle").click(function(){
    jQuery("#menu-navigation").slideToggle('slow');
});


    
 
    jQuery( 'nav.main-navigation .sub-menu' ).before( '<button class="sub-menu-toggle" role="button" aria-pressed="false"></button>' ); // Add toggles to sub menus
 
    // Show/hide the navigation
    jQuery( '.sub-menu-toggle' ).on( 'click', function() {
        var $this = jQuery(this);
        $this.attr( 'aria-pressed', function( index, value ) {
            return 'false' === value ? 'true' : 'false';
        });
 
        $this.toggleClass( 'activated' );
        $this.next( '.sub-menu' ).slideToggle( 'fast' );
 
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


jQuery(document).ready(function(){

    jQuery(".std_container").each(function () {
            jQuery(this).wrapInner("<div class='container'><div class='row'> </div></div>");
        });
});
