<?php
/**
 * Filter functions for Styling Section of Theme Options
 */

if ( ! function_exists( 'redux_toggle_use_predefined_colors' ) ) {
	function redux_toggle_use_predefined_colors( $enable ) {
		global $zs_options;

		if ( isset( $zs_options['use_predefined_color'] ) && $zs_options['use_predefined_color'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_apply_primary_color' ) ) {
	function redux_apply_primary_color( $color ) {
		global $zs_options;

		if ( isset( $zs_options['main_color'] ) ) {
			$color = $zs_options['main_color'];
		}

		return $color;
	}
}

if ( ! function_exists( 'sass_darken' ) ) {
	function sass_darken( $hex, $percent ) {
		preg_match( '/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors );
		str_replace( '%', '', $percent );
		$percent = (int) $percent;
		$color = "#";
		for( $i = 1; $i <= 3; $i++ ) {
			$primary_colors[$i] = hexdec( $primary_colors[$i] );
			if ( $percent > 50 ) $percent = 50;
			$dv = 100 - ( $percent * 2 );
			$primary_colors[$i] = round( $primary_colors[$i] * ( $dv ) / 100 );
			$color .= str_pad( dechex( $primary_colors[$i] ), 2, '0', STR_PAD_LEFT );
		}
		return $color;
	}
}

if ( ! function_exists( 'redux_apply_custom_color_css' ) ) {
	function redux_apply_custom_color_css() {
		global $zs_options;

		if ( isset( $zs_options['use_predefined_color'] ) && $zs_options['use_predefined_color'] ) {
			return;
		}

		$how_to_include = isset( $zs_options['include_custom_color'] ) ? $zs_options['include_custom_color'] : '1';

		if ( $how_to_include != '1' ) {
			return;
		}

		?><style type="text/css"><?php echo redux_get_custom_color_css(); ?></style><?php
	}
}

if ( ! function_exists( 'redux_get_custom_color_css' ) ) {
	function redux_get_custom_color_css() {
		global $zs_options;

		$primary_button_color      = isset( $zs_options['custom_button_color'] ) ? $zs_options['custom_button_color'] : '#e41b2b';

		$primary_button_text_color      = isset( $zs_options['custom_button_text_color'] ) ? $zs_options['custom_button_text_color'] : '#fff';

		$primary_button_hover_color      = isset( $zs_options['custom_button_hover_color'] ) ? $zs_options['custom_button_hover_color'] : '#274397';

		$primary_button_text_hover_color = isset( $zs_options['custom_button_text_hover_color'] ) ? $zs_options['custom_button_text_hover_color'] : '#fff';

		$styles 	        = '
		button,
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
			background: '. $primary_button_color .';
			color: '. $primary_button_text_color .';
		}

		button:hover,
		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover {
		    background-color: '. $primary_button_hover_color .';
		    color: '. $primary_button_text_hover_color .';
		}
		';


		return $styles;
	}
}

function redux_load_external_custom_css() {
	global $zs_options;

	if ( isset( $zs_options['use_predefined_color'] ) && $zs_options['use_predefined_color'] ) {
		return;
	}

	$how_to_include = isset( $zs_options['include_custom_color'] ) ? $zs_options['include_custom_color'] : '1';

	if ( $how_to_include == '1' ) {
		return;
	}

	$custom_color_file = get_stylesheet_directory() . '/custom-color.css';

	if ( file_exists( $custom_color_file ) ) {
		wp_enqueue_style( 'zs-custom-color', get_stylesheet_directory_uri() . '/custom-color.css' );
	}
}

function redux_toggle_custom_css_page() {
	global $zs_options;

	if ( isset( $zs_options['use_predefined_color'] ) && $zs_options['use_predefined_color'] ) {
		$should_add = false;
	} else {
		if ( !isset( $zs_options['include_custom_color'] ) ) {
			$zs_options['include_custom_color'] = '1';
		}

		if ( $zs_options['include_custom_color'] == '2' ) {
			$should_add = true;
		} else {
			$should_add = false;
		}
	}

	return $should_add;
}
