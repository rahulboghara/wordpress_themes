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

		$primary_color      = isset( $zs_options['custom_primary_color'] ) ? $zs_options['custom_primary_color'] : '#83b735';
		$primary_text_color = isset( $zs_options['custom_primary_text_color'] ) ? $zs_options['custom_primary_text_color'] : '#fff';

		$primary_text_hover_color = isset( $zs_options['custom_primary_text_hover_color'] ) ? $zs_options['custom_primary_text_hover_color'] : '#000';

		$primary_button_color      = isset( $zs_options['custom_button_color'] ) ? $zs_options['custom_button_color'] : '#83b735';

		$primary_button_text_color      = isset( $zs_options['custom_button_text_color'] ) ? $zs_options['custom_button_text_color'] : '#fff';

		$primary_button_hover_color      = isset( $zs_options['custom_button_hover_color'] ) ? $zs_options['custom_button_hover_color'] : '#000';

		$primary_button_text_hover_color = isset( $zs_options['custom_button_text_hover_color'] ) ? $zs_options['custom_button_text_hover_color'] : '#fff';

		$color_body         = '#fff';

		$active_background  = sass_darken( $primary_color, '100%' );
		$active_border      = sass_darken( $primary_color, '100%' );

		$styles 	        = '
		.header-top,.em-cart-count{
			background-color: ' . $primary_color . ';
		}

		.offer-link li {
		    display: block;
		    list-style: none;
		    height: 42px;
		    border-left: 1px solid '. $primary_text_color .';
		}
		button, input[type="button"], input[type="reset"], input[type="submit"] {
		    background: ' . $primary_button_color . ';
		    color: ' . $primary_button_text_color . ';
		}
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {
		    background: ' . $primary_button_hover_color . ';
		    color: ' . $primary_button_text_hover_color . ';
		}
		.open >	a.dokan-btn-theme.dropdown-toggle, .dokan-btn-theme:active, .dokan-btn-theme.active, .open > .dokan-btn-theme.dropdown-toggle {
		  color: ' . $primary_text_color . ';
		  background-color: ' . $active_background . ';
		  border-color: ' . $active_border . ';
		  background-image: none;
		}

		.navbar-primary .navbar-nav > .menu-item > a:hover,
		.navbar-primary .navbar-nav > .menu-item > a:focus,
		.zs-navbar-primary .nav>.menu-item>a:focus,
		.zs-navbar-primary .nav>.menu-item>a:hover  {
			background-color: ' . sass_darken( $primary_color, '4.5%' ) . ';
		}

		.navbar-primary .navbar-nav > .menu-item > a {
			border-color: ' . sass_darken( $primary_color, '4.5%' ) . ';
		}

		.full-color-background .navbar-primary,
		.zs-compact .header-v4 .zs-navbar-primary,
		.header-v4 .zs-navbar-primary {
			border-top-color: ' . sass_darken( $primary_color, '4.5%' ) . ';
		}

		.full-color-background .top-bar .nav-inline .menu-item+.menu-item:before {
			color: ' . sass_darken( $primary_color, '4.5%' ) . ';
		}

		.zs-navbar-primary .nav>.menu-item+.menu-item>a,
		.home-mobile-v2-features-block .features-list .feature+.feature .media {
			border-left-color: ' . sass_darken( $primary_color, '4.5%' ) . ';
		}';


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
