jQuery(window).load(function () { 
    "use strict";
    jQuery("#page-overlay").fadeOut("slow"); 
});

jQuery(document).ready(function(){    
    "use strict";
    jQuery("footer .widget .menu").addClass("footer-dropdown");
    jQuery("footer .widget > ul").addClass("footer-dropdown");
    jQuery("footer .widget .rpwwt-widget > ul").addClass("footer-dropdown");
    jQuery("footer .widget .mc4wp-form").addClass("footer-dropdown");

    jQuery(".sidebar .widget > ul").addClass("sidebar-dropdown");
    jQuery(".sidebar .widget > form").addClass("sidebar-dropdown");
    jQuery(".sidebar .widget > #cat-drop-stack").addClass("sidebar-dropdown");
    jQuery(".site-info ul").removeClass("footer-dropdown");
});


jQuery(document).ready(function(){
    jQuery(".main-navigation button.menu-toggle").click(function(){
        jQuery("#menu-navigation").slideToggle('slow');
        jQuery("#social-menu").slideUp('slow');
        jQuery("#category-menu").slideUp('slow');
        jQuery(".fb-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
        jQuery(".category-toggle").parent().removeClass('active');
    });

    jQuery(".social-menu > button.menu-toggle").click(function(){
        jQuery("#social-menu").slideToggle('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery("#category-menu").slideUp('slow');
        jQuery(".fb-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
        jQuery(".category-toggle").parent().removeClass('active');
    });
    jQuery(".category-toggle").click(function(){
        jQuery(this).parent().toggleClass('active');
        jQuery("#category-menu").slideToggle('slow');
    });
    jQuery(".category-toggle-res").click(function(){
        jQuery(this).parent().toggleClass('active');
        jQuery("#category-menu").slideToggle('slow');
        jQuery("#social-menu").slideUp('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery(".fb-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
    });


    jQuery("#shopping_cart").click(function(){
        jQuery(".fb-shopping-cart .widget.widget_shopping_cart").slideToggle('slow');
    });
    jQuery("#shopping_cart_res").click(function(){
        jQuery(".fb-shopping-cart .widget.widget_shopping_cart").slideToggle('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery("#category-menu").slideUp('slow');
        jQuery(".category-toggle").parent().removeClass('active');
        jQuery("#social-menu").slideUp('slow');
    });

});


jQuery(document).ready(function() {
    jQuery(".social-menu > button.menu-toggle").click(function() {
        jQuery("#menu-navigation").slideUp('slow');
    });

    jQuery(".main-navigation button.menu-toggle").click(function() {
        jQuery("#social-menu").slideUp('slow');
    });

    jQuery('.sidebar .widget-title').append( "<div class='widget-title-sidebar'></div>" );

    jQuery(".sidebar .widget-title .widget-title-sidebar").click(function() {
       var $this = jQuery(this).closest('.sidebar section,.sidebar .dokan-store-widget').find('.sidebar-dropdown');
       $this.slideToggle('slow');
       jQuery('.sidebar-dropdown').not($this).slideUp('slow');
    });


    jQuery('.footer-title .widget-title').append( "<div class='widget-title-res'></div>" );

    jQuery(".footer-title .widget-title .widget-title-res").click(function() {
       var $this = jQuery(this).closest('aside.footer-column .widget section').find('.footer-dropdown');
       $this.slideToggle('slow');
       jQuery('.footer-dropdown').not($this).slideUp('slow');
    });
});

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('#masthead').addClass("fixed");
        jQuery('.header-middle-left').prependTo(".header-bottom-content");

    } else {
        jQuery('#masthead').removeClass("fixed");
        jQuery('.header-middle-left').prependTo(".header-middle-content");

    }
});


jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 200) {
        jQuery('.backtotop').addClass("fixed");
    } else {
        jQuery('.backtotop').removeClass("fixed");
    }
});
jQuery('.backtotop').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({
        scrollTop: 0
    }, 800)
});


jQuery(document).ready(function() { 
        //Product Tabs
        window.setTimeout(function(){
            var tabCount = 1;
            var tabTotal = jQuery('.home-tabs .wpb_content_element').length;
            jQuery('.home-tabs').prepend('<div class="title-container"><ul class="home-tabs-title"></ul></div>');
            var tabTitle = jQuery('.home-tabs .home-tabs-title');
            jQuery('.home-tabs .wpb_content_element').each(function(){
                var tabClass = '';
                var tabLinkClass = '';
                var tabWidget = jQuery(this).next('.woocommerce');
                tabWidget.addClass('product-tabs');
                var widgetTitle = jQuery(this).find('h3').html();
                tabWidget.attr('id', 'wpb_content_element2-'+tabCount);
                
                if(tabCount==1) {
                    tabClass = 'first';
                    tabLinkClass = 'active';
                    
                    tabWidget.addClass('active');
                    
                    //first tab carousel

                } else {
                    tabWidget.addClass('heightzero');
                }
                if(tabCount == tabTotal) {
                    tabClass = 'last';
                }
                
                tabTitle.append('<li class="'+tabClass+'"><a class="tab-link '+tabLinkClass+'" href="#" rel="wpb_content_element2-'+tabCount+'">'+widgetTitle+'</a></li>');
                
                tabCount++;
                
                //tab click
                jQuery('.home-tabs .tab-link').each(function(){
                    jQuery(this).on('click', function(event){
                        event.preventDefault();
                        var tabRel = jQuery(this).attr('rel');
                        
                        jQuery('.home-tabs .tab-link').removeClass('active');
                        jQuery(this).addClass('active');
                        
                        jQuery('.home-tabs .product-tabs.active').fadeOut(300, function(){
                            jQuery('.home-tabs .product-tabs').addClass('heightzero');
                            jQuery('#'+tabRel).removeClass('heightzero');
                            jQuery(this).fadeIn(300);
                        });
                        jQuery('.home-tabs .product-tabs').removeClass('active');
                        jQuery('#'+tabRel).addClass('active');
                        
                        //make carousel

                    });
                });
            });
        }, 1000 );

        jQuery('.home-tabs .products').slick({
            rows: 2,
            dots: false,
            arrows: true,
            infinite: false,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 992,
                settings: {
                    rows: 2,
                    slidesToScroll: 1,
                    slidesToShow: 3,
                    dots: false,
                    arrows: true
                }
            },
            {
                breakpoint: 650,
                settings: {
                    rows: 2,
                    slidesPerRow: 2,
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: false,
                    arrows: true
                }
            },
            {
                breakpoint: 422,
                settings: {
                    rows: 1,
                    slidesPerRow: 1,
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: false,
                    arrows: true
                }
            }
            ]
        });


    });


jQuery(window).load(function() {
    "use strict";
    jQuery(".products .content-inner").find(".add_to_cart_button,.product_type_external,.product_type_grouped,.product_type_simple,.product_type_variable").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-button"));
    });

    jQuery(".products .content-inner").find(".compare.button").each(function(i){
        jQuery(this).insertAfter(jQuery(this).parent().parent().parent().find(".product-button .add_to_cart_button, .product-button .product_type_external,.product-button .product_type_grouped,.product-button .product_type_simple,.product-button .product_type_variable"));
    });
    jQuery(".products .content-inner").find(".yith-wcqv-button").each(function(i){
        jQuery(this).insertAfter(jQuery(this).parent().parent().find(".product-button .add_to_cart_button,.product-button .product_type_external, .product-button .product_type_grouped,.product-button .product_type_simple,.product-button .product_type_variable"));
    });
     
    jQuery(".products .content-inner").find(".woosw-btn").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-button"));
    });
    jQuery(".products .content-inner").find(".woosw-btn").each(function(i){
        jQuery(this).addClass('button');
    });
    jQuery(".products .content-inner").find(".yith-wcqv-button").each(function(i){
        jQuery(this).addClass('button');
    });
    jQuery(".products .content-inner .product-image").find(".onsale").each(function(i){
        jQuery(this).siblings('.itsnew').css('display','none');
    });


    jQuery(".products .product-image").find(".variations_form").each(function(i){
        jQuery(this).insertAfter(jQuery(this).parent().parent().find(".product-desc-wrapper .product-button"));
    });

    jQuery(".products .product-image").find(".itsnew").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-label"));
    });

    jQuery(".products .product-image").find(".featured").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-label"));
    });

});


jQuery(document).ready(function() { 
    "use strict";
    jQuery(".product_type_simple.add_to_cart_button").attr("title", "Add To Cart");
    jQuery(".product_type_external,.product_type_grouped,.product_type_variable").attr("title", "Select Option");
    jQuery(".yith-wcqv-button").attr("title", "Quick View");
    jQuery(".compare.button").attr("title", "Add To Compare");
    jQuery(".woosw-btn").attr("title", "Add To Wishlist");
});


jQuery(document).ready(function() {
    "use strict";
    jQuery(".single-product #content div.product > .onsale").prependTo(".woocommerce #content div.product div.images");   
    jQuery(".single-product div.product .entry-summary .wb-single-img-cnt").insertAfter(".single-product div.product .entry-summary > .price");
    jQuery(".single-product div.product .entry-summary > .product-offer").insertAfter(".single-product div.product .entry-summary > .price");
    jQuery(".single-product div.product .entry-summary > .stock").insertAfter(".single-product div.product .entry-summary > .price");
    jQuery(".single-product div.product .ywpc-countdown").insertBefore(".single-product div.product .entry-summary > .price");
});


jQuery(document).ready(function() { 
    jQuery('.single-product .flex-control-nav').slick({
        rows: 1,
        dots: false,
        arrows: true,
        infinite: false,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        focusOnSelect: true,
        vertical: true,
        responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 4,
                dots: false
            }
        },
        {
            breakpoint: 480,
            settings: {
                rows: 1,
                slidesToScroll: 1,
                slidesToShow: 3,
                dots: false
            }
        }
        ]
    });
});

jQuery(document).ready(function() { 
    jQuery('.related.products .products.columns-4,.up-sells.upsells.products .products.columns-4,.cross-sells .products.columns-2,.recently_viewed .products.columns-4').slick({
        rows: 1,
        dots: false,
        arrows: true,
        infinite: false,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
        {
            breakpoint: 1229,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 3,
                dots: false
            }
        },
        {
            breakpoint: 650,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 2,
                dots: false
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 2,
                dots: false
            }
        },
        {
            breakpoint: 380,
            settings: {
                slidesToScroll: 1,
                slidesToShow: 1,
                dots: false
            }
        }
        ]
    });

});
// Ajax add to cart on the product page
var $warp_fragment_refresh = {
    url: wc_cart_fragments_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'get_refreshed_fragments' ),
    type: 'POST',
    success: function( data ) {
        if ( data && data.fragments ) {

            jQuery.each( data.fragments, function( key, value ) {
                jQuery( key ).replaceWith( value );
            });

            jQuery( document.body ).trigger( 'wc_fragments_refreshed' );
        }
    }
};

jQuery('.entry-summary form.cart.simple_form,.entry-summary form.cart.grouped_form,.entry-summary form.cart.variations_form').on('submit', function (e)
{
    e.preventDefault();


    jQuery('.single_add_to_cart_button').addClass('adding-cart');
    jQuery('html, body').animate({ scrollTop: 0 }, 'slow');



    var product_url = window.location,
    form = jQuery(this);

    jQuery.post(product_url, form.serialize() + '&_wp_http_referer=' + product_url, function (result)
    {
        var cart_dropdown = jQuery('.widget_shopping_cart', result)

        // update dropdown cart
        jQuery('.widget_shopping_cart').replaceWith(cart_dropdown);

        // update fragments
        jQuery.ajax($warp_fragment_refresh);

        jQuery('.single_add_to_cart_button').removeClass('adding-cart');

    });
});

jQuery(document).ready(function(){
    jQuery(".gridlist-toggle").prependTo(jQuery("#primary.primary-content-area .site-main"));
    jQuery(".woocommerce-result-count").wrap(" <div class='cat-tool'> </div>");
    jQuery(".products .product-category").wrapInner(" <div class='container-inner'> </div>");
    jQuery(".woocommerce-ordering").appendTo(".cat-tool");
    jQuery(".gridlist-toggle").prependTo(".cat-tool");
    jQuery(".woocommerce-product-gallery__trigger").appendTo(".woocommerce-product-gallery .flex-viewport");


});


jQuery(window).load(function() {
    if ('ul.products.grid, ul.products.list') {
        jQuery('li.product .product-desc-wrapper .product-category').each(function () {
            jQuery(this).wrapAll( "<div class='product-desc-left' />");
        });
        jQuery('li.product .product-desc-wrapper .product-price').each(function () {
            jQuery(this).wrapAll( "<div class='product-desc-right' />");
        });

        jQuery("li.product .product-desc-wrapper .product-title").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-left"));
        });
        jQuery("li.product .product-desc-wrapper .sold-by").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-left"));
        });
        jQuery("li.product .product-desc-wrapper .star-rating").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-left"));
        });
        jQuery("li.product .product-desc-wrapper .zs-star-rating").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-left"));
        });
        jQuery("li.product .product-desc-wrapper .woocommerce-product-details__short-description").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-left"));
        });

        jQuery("li.product .product-desc-wrapper .product-button").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-right"));
        });

        jQuery("li.product .product-desc-wrapper .variations_form").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().find(".product-desc-right .product-button"));
        });

    }
    return false;

});

jQuery(document).ready(function() {
    jQuery('#gridlist-toggle a').click(function(event) {
        event.preventDefault();
    });

    if(jQuery('.cart .qty').length){
        var originalUrl = jQuery('#fb_express_checkout').attr('href');
        jQuery('.cart .qty').change(function(){
            var url = originalUrl + '&quantity=' + jQuery(this).val();
            jQuery('#fb_express_checkout').attr('href', url);
        });
    }
});



jQuery(document).ready(function(){

    jQuery( '.woocommerce .products .slick-list' ).hover( function() {
        jQuery( this ).addClass( 'overlay' );
    }, function() {
        jQuery( this ).removeClass( 'overlay' );
    });

    jQuery( '.product_category_inner ul.products.owl-carousel .owl-stage-outer' ).hover( function() {
        jQuery( this ).addClass( 'overlay' );
    }, function() {
        jQuery( this ).removeClass( 'overlay' );
    });


     jQuery('.related.products>h2,.up-sells.upsells.products>h2,.cross-sells>h2,.recently_viewed.products>h2').each(function () {
            jQuery(this).wrapAll( "<div class='fb-custom-heading' />");
    });
});


jQuery(window).load(function() {
    "use strict";
    jQuery(".product_category_inner ul.products li.product .product-desc-wrapper").find(".saved-sale").each(function(i){
        jQuery(this).prependTo(jQuery(this).parent().parent().parent().parent().find(".product-label"));
    });


});



jQuery( document ).ready( function( $ ){
$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
var counter = $('.fb-wishlist-count');

$.ajax({
url: yith_wcwl_l10n.ajax_url,
data: {
action: 'yith_wcwl_update_wishlist_count'
},
dataType: 'json',
success: function( data ){
counter.html( data.count );
}
})
} )
});

