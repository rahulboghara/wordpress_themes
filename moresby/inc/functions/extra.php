<?php
/**
 * Additional functions used by the theme
 */

/**
 * Call a shortcode function by tag name.
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */


/**
 * Check if Redux Framework is activated
 */
if( ! function_exists( 'is_redux_activated' ) ) {
	function is_redux_activated() {
		return class_exists( 'ReduxFrameworkPlugin' ) ? true : false;
	}
}


if( ! function_exists( 'is_ocdi_activated' ) ) {
	/**
	 * Check if One Click Demo Import is activated
	 */
	function is_ocdi_activated() {
		return class_exists( 'OCDI_Plugin' ) ? true : false;
	}
}