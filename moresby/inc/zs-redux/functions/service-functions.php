<?php
/**
 * Filter functions for Styling Section of Theme Options
 */

if ( ! function_exists( 'redux_service_use_predefined_colors' ) ) {
	function redux_service_use_predefined_colors( $enable ) {
		global $zs_options;

		if ( isset( $zs_options['use_service_button_predefined_color'] ) && $zs_options['use_service_button_predefined_color'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_service_primary_color' ) ) {
	function redux_service_primary_color( $color ) {
		global $zs_options;

		if ( isset( $zs_options['service_main_color'] ) ) {
			$color = $zs_options['service_main_color'];
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

if ( ! function_exists( 'redux_service_custom_color_css' ) ) {
	function redux_service_custom_color_css() {
		global $zs_options;

		if ( isset( $zs_options['use_service_button_predefined_color'] ) && $zs_options['use_service_button_predefined_color'] ) {
			return;
		}

		$how_to_include = isset( $zs_options['include_custom_color'] ) ? $zs_options['include_custom_color'] : '1';

		if ( $how_to_include != '1' ) {
			return;
		}

		?><style type="text/css"><?php echo redux_service_get_custom_color_css(); ?></style><?php
	}
}

if ( ! function_exists( 'redux_service_get_custom_color_css' ) ) {
	function redux_service_get_custom_color_css() {
		global $zs_options;

		$service_1_button_color      = isset( $zs_options['service_1_button_color'] ) ? $zs_options['service_1_button_color'] : '#e41b2b';

		$service_1_button_text_color      = isset( $zs_options['service_1_button_text_color'] ) ? $zs_options['service_1_button_text_color'] : '#fff';

		$service_1_button_hover_color      = isset( $zs_options['service_1_button_hover_color'] ) ? $zs_options['service_1_button_hover_color'] : '#274397';

		$service_1_button_text_hover_color = isset( $zs_options['service_1_button_text_hover_color'] ) ? $zs_options['service_1_button_text_hover_color'] : '#fff';


		$service_2_button_color      = isset( $zs_options['service_2_button_color'] ) ? $zs_options['service_2_button_color'] : '#36ae44';

		$service_2_button_text_color      = isset( $zs_options['service_2_button_text_color'] ) ? $zs_options['service_2_button_text_color'] : '#fff';

		$service_2_button_hover_color      = isset( $zs_options['service_2_button_hover_color'] ) ? $zs_options['service_2_button_hover_color'] : '#274397';

		$service_2_button_text_hover_color = isset( $zs_options['service_2_button_text_hover_color'] ) ? $zs_options['service_2_button_text_hover_color'] : '#fff';


		$service_3_button_color      = isset( $zs_options['service_3_button_color'] ) ? $zs_options['service_3_button_color'] : '#01adef';

		$service_3_button_text_color      = isset( $zs_options['service_3_button_text_color'] ) ? $zs_options['service_3_button_text_color'] : '#fff';

		$service_3_button_hover_color      = isset( $zs_options['service_3_button_hover_color'] ) ? $zs_options['service_3_button_hover_color'] : '#274397';

		$service_3_button_text_hover_color = isset( $zs_options['service_3_button_text_hover_color'] ) ? $zs_options['service_3_button_text_hover_color'] : '#fff';

		$styles 	        = '
			#mrb_service_1 #mrb_service_btn button.vc_btn3 {
			    color: '. $service_1_button_text_color .';
			    background: ' . $service_1_button_color . ';
			}
			#mrb_service_2 #mrb_service_btn button.vc_btn3 {
			    color: '. $service_2_button_text_color .';
			    background: ' . $service_2_button_color . ';
			}
			#mrb_service_3 #mrb_service_btn button.vc_btn3 {
			    color: '. $service_3_button_text_color .';
			    background: ' . $service_3_button_color . ';
			}	

			#mrb_service_1 #mrb_service_btn button.vc_btn3:hover {
			    color: '. $service_1_button_text_hover_color .';
			    background: ' . $service_1_button_hover_color . ';
			}
			#mrb_service_2 #mrb_service_btn button.vc_btn3:hover {
			    color: '. $service_2_button_text_hover_color .';
			    background: ' . $service_2_button_hover_color . ';
			}
			#mrb_service_3 #mrb_service_btn button.vc_btn3:hover {
			    color: '. $service_3_button_text_hover_color .';
			    background: ' . $service_3_button_hover_color . ';
			}	

		';


		return $styles;
	}
}

function redux_service_load_external_custom_css() {
	global $zs_options;

	if ( isset( $zs_options['use_service_button_predefined_color'] ) && $zs_options['use_service_button_predefined_color'] ) {
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

function redux_service_custom_css_page() {
	global $zs_options;

	if ( isset( $zs_options['use_service_button_predefined_color'] ) && $zs_options['use_service_button_predefined_color'] ) {
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
