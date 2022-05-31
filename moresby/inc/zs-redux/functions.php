<?php
/**
 * Redux Framework functions
 *
 * @package zs/ReduxFramework
 */

/**
 * Setup functions for theme options
 */

/**
 * Enqueues font awesome for Redux Theme Options
 * 
 * @return void
 */

function redux_queue_font_awesome() {
    wp_register_style(
		'redux-font-awesome',
		get_template_directory_uri() . '/css/font-awesome.min.css',
		array(),
		time(),
		'all'
    );
    wp_enqueue_style( 'redux-font-awesome' );
}

/**
 * Disables Demo mode of Redux Framework
 * 
 * @return void
 */
function redux_remove_demo_mode() { // Be sure to rename this function to something more unique
    remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
}



require_once get_template_directory() . '/inc/zs-redux/functions/general-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/style-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/footer-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/header-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/plan-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/service-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/typography-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/custom-code-functions.php';
/*
require_once get_template_directory() . '/inc/zs-redux/functions/mobile-functions.php';
require_once get_template_directory() . '/inc/zs-redux/functions/navigation-functions.php';

*/