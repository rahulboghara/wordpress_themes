<?php
/**
 * Filter functions for General Section of Theme Options
 */

if( ! function_exists( 'redux_toggle_scrollup' ) ) {
	function redux_toggle_scrollup() {
		global $zs_options;

		if( isset( $zs_options['scrollup'] ) && $zs_options['scrollup'] == '1' ) {
			$scrollup = true;
		} else {
			$scrollup = false;
		}

		return $scrollup;
	}
}

if( ! function_exists( 'redux_toggle_register_image_size' ) ) {
	function redux_toggle_register_image_size() {
		global $zs_options;

		if( isset( $zs_options['reg_image_size'] ) && $zs_options['reg_image_size'] == '1' ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_toggle_zs_child_style' ) ) {
	function redux_toggle_zs_child_style() {
		global $zs_options;

		if ( isset( $zs_options['load_child_theme'] ) && $zs_options['load_child_theme'] == '1' ) {
			$load = true;
		} else {
			$load = false;
		}

		return $load;
	}
}

/*if ( ! function_exists( 'redux_apply_home_sidebar_margin_top' ) ) {
	function redux_apply_home_sidebar_margin_top( $sidebar_margin_top ) {
		global $zs_options;

		if( isset( $zs_options['sidebar_margin_top'] ) ) {
			$sidebar_margin_top = $zs_options['sidebar_margin_top'];
		}

		return $sidebar_margin_top;
	}
}*/