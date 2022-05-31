jQuery(window).load(function () { 
    "use strict";
    jQuery("#page-overlay").fadeOut("slow"); 
});

jQuery(document).ready(function(){    
    "use strict";
    jQuery("footer .widget .menu").addClass("footer-dropdown");
    jQuery("footer .widget > ul").addClass("footer-dropdown");
    jQuery("footer .widget .rpwwt-widget > ul").addClass("footer-dropdown");

    jQuery(".sidebar .widget > ul").addClass("sidebar-dropdown");
    jQuery(".sidebar .widget > form").addClass("sidebar-dropdown");
    jQuery(".site-info ul").removeClass("footer-dropdown");
});


jQuery(document).ready(function(){
    jQuery(".main-navigation button.menu-toggle").click(function(){
        jQuery("#menu-navigation").slideToggle('slow');
        jQuery("#social-menu").slideUp('slow');
        jQuery("#wpmm-wrap-category-menu").slideUp('slow');
        jQuery(".em-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
        jQuery(".category-toggle").parent().removeClass('active');
    });

    jQuery(".social-menu > button.menu-toggle").click(function(){
        jQuery("#social-menu").slideToggle('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery("#wpmm-wrap-category-menu").slideUp('slow');
        jQuery(".em-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
        jQuery(".category-toggle").parent().removeClass('active');
    });
    jQuery(".category-toggle").click(function(){
        jQuery(this).parent().toggleClass('active');
        jQuery("#wpmm-wrap-category-menu").slideToggle('slow');
    });
    jQuery(".category-toggle-res").click(function(){
        jQuery(this).parent().toggleClass('active');
        jQuery("#wpmm-wrap-category-menu").slideToggle('slow');
        jQuery("#social-menu").slideUp('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery(".em-shopping-cart .widget.widget_shopping_cart").slideUp('slow');
    });


    jQuery("#shopping_cart").click(function(){
        jQuery(".em-shopping-cart .widget.widget_shopping_cart").slideToggle('slow');
    });
    jQuery("#shopping_cart_res").click(function(){
        jQuery(".em-shopping-cart .widget.widget_shopping_cart").slideToggle('slow');
        jQuery("#menu-navigation").slideUp('slow');
        jQuery("#wpmm-wrap-category-menu").slideUp('slow');
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
       var $this = jQuery(this).closest('.sidebar section').find('.sidebar-dropdown');
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
        jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-hover"));
    });
    jQuery(".products .content-inner").find(".yith-wcqv-button").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().parent().find(".product-hover"));
    });
    jQuery(".products .content-inner").find(".compare.button").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-hover"));
    }); 
    jQuery(".products .content-inner").find(".woosw-btn").each(function(i){
        jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-hover"));
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
        responsive: [
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
    jQuery('.related.products .products,.up-sells.upsells.products .products,.cross-sells .products').slick({
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
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false
            }
        },
        {
            breakpoint: 650,
            settings: {
                slidesPerRow: 2,
                rows: 1,
                slidesToScroll: 1,
                slidesToShow: 1,
                dots: false
            }
        },
        {
            breakpoint: 422,
            settings: {
                rows: 1,
                slidesPerRow: 1,
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
    jQuery(".woocommerce-result-count").wrap(" <div class='cat-tool'> </div>");
    jQuery(".products .product-category").wrapInner(" <div class='container-inner'> </div>");
    jQuery(".woocommerce-ordering").appendTo(".cat-tool");
    jQuery(".shop-view-switcher").prependTo(".cat-tool");
});




/*jQuery(document).ready(function() {
    jQuery('#grid').click(function() {
        jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.product-image').append(this);
        });
        return false;
    });

    jQuery('#list').click(function() {
        jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.woocommerce-product-details__short-description').append(this);
        });
        return false;
    });

*/

/*    jQuery('#gridlist-toggle a').click(function(event) {
        event.preventDefault();
    });

});
*/

jQuery(document).ready(function() {
    var hash_value = window.location.hash;

        switch( hash_value ) {
            case '#list-view':
            case '#grid':
                jQuery( '.shop-view-switcher a[href="' + hash_value +'"]' ).tab( 'show' );
            break;
        }


        jQuery( '.shop-view-switcher' ).on( 'click', '#grid', function() {
            jQuery( '[data-toggle="shop-products"]' ).attr( 'data-view', jQuery(this).data( 'archiveClass' ) );
            jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.product-image').append(this);
        });
    
        } );
        jQuery( '.shop-view-switcher' ).on( 'click', '#list-view', function() {
            jQuery( '[data-toggle="shop-products"]' ).attr( 'data-view', jQuery(this).data( 'archiveClass' ) );


        jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.woocommerce-product-details__short-description').append(this);
        });
    

        } );


});


jQuery(window).load(function() {

    if ('ul.products[data-view="list-view"]') {
        jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.woocommerce-product-details__short-description').append(this);
        });
    }
});
jQuery(window).load(function() {

    if ('ul.products[data-view="grid"]') {
        jQuery('li.product .product-hover').each(function () {
            jQuery(this).closest('li.product').find('.product-image').append(this);
        });
    }
});