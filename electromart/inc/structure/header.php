<?php
/**
 * Functions and template tags used in theme header
 */

if ( ! function_exists( 'zs_enqueue_styles' ) ) {
	/**
	 * Enqueues all styles used by the theme
	 */
	function zs_enequeue_styles() {

		global $zs_version;

		if ( apply_filters( 'zs_use_predefined_colors', true ) ) {
			$color_css_file = apply_filters( 'zs_primary_color', 'default_theme_color' );
			wp_enqueue_style( 'zs-color', get_template_directory_uri() . '/css/' . $color_css_file . '.css', '', $zs_version );
		}
	}
}
if ( ! function_exists( 'zs_enqueue_scripts' ) ) {
	/**
	 * Enqueues all scripts used by the theme
	 */
	global $zs_version;

	function zs_enqueue_scripts() {

		if( apply_filters( 'zs_enable_scrollup', true ) ) {
			wp_enqueue_script( 'easing-js',		get_template_directory_uri() . '/js/jquery.easing.min.js', array( 'jquery' ), $zs_version, true );
			wp_enqueue_script( 'scrollup-js',	get_template_directory_uri() . '/js/scrollup.min.js', array( 'jquery' ), $zs_version, true );
		}

		if( apply_filters( 'zs_enable_sticky_header', true ) ) {
			wp_enqueue_script( 'header_fixed_js',	get_template_directory_uri() . '/js/header_fixed.min.js', array( 'jquery' ), $zs_version, true );
		}
	}
}
if ( ! function_exists( 'zs_scripts' ) ) {
	/**
	 */
	function zs_scripts() {

		// Enqueue styles
		zs_enequeue_styles();

		// Enqueue scripts
		zs_enqueue_scripts();

	}
}

add_action( 'wp_enqueue_scripts',       'zs_scripts',      10 );

