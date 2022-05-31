<?php
/**
 * studios engine room
 *
 * @package studios
 */


/**
 * One Click Demo Import
 */
if ( is_ocdi_activated() ) {
	require get_template_directory() . '/inc/ocdi/hooks.php';
	require get_template_directory() . '/inc/ocdi/functions.php';
}
