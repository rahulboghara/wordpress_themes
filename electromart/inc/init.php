<?php
/**
 * zs engine room
 *
 * @package zs
 */



/**
 * Setup.
 * Enqueue styles, register widget regions, etc.
 */
require get_template_directory() . '/inc/functions/extra.php';
require get_template_directory() . '/inc/functions/media.php';




/**
 * Redux Framework
 * Load theme options and their override filters
 */
if ( is_redux_activated() ) {
	require get_template_directory() . '/inc/zs-redux/zs-config.php';
	require get_template_directory() . '/inc/zs-redux/functions.php';
	require get_template_directory() . '/inc/zs-redux/hooks.php';
}

/**
 * WooCommerce.
 * Load WooCommerce compatibility files.
 */
if( is_woocommerce_activated() ) {

	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';

}


/**
 * One Click Demo Import
 */
if ( is_ocdi_activated() ) {
	require get_template_directory() . '/inc/ocdi/hooks.php';
	require get_template_directory() . '/inc/ocdi/functions.php';
}

/**
 * Structure
 */
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/footer.php';
require get_template_directory() . '/inc/structure/social.php';