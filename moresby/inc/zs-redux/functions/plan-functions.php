<?php
/**
 * Filter functions for Styling Section of Theme Options
 */

if ( ! function_exists( 'redux_plan_use_predefined_colors' ) ) {
	function redux_plan_use_predefined_colors( $enable ) {
		global $zs_options;

		if ( isset( $zs_options['use_button_predefined_color'] ) && $zs_options['use_button_predefined_color'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_plan_primary_color' ) ) {
	function redux_plan_primary_color( $color ) {
		global $zs_options;

		if ( isset( $zs_options['plan_main_color'] ) ) {
			$color = $zs_options['plan_main_color'];
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

if ( ! function_exists( 'redux_plan_custom_color_css' ) ) {
	function redux_plan_custom_color_css() {
		global $zs_options;

		if ( isset( $zs_options['use_button_predefined_color'] ) && $zs_options['use_button_predefined_color'] ) {
			return;
		}

		$how_to_include = isset( $zs_options['include_custom_color'] ) ? $zs_options['include_custom_color'] : '1';

		if ( $how_to_include != '1' ) {
			return;
		}

		?><style type="text/css"><?php echo redux_plan_get_custom_color_css(); ?></style><?php
	}
}

if ( ! function_exists( 'redux_plan_get_custom_color_css' ) ) {
	function redux_plan_get_custom_color_css() {
		global $zs_options;

		$plan_1_button_color      = isset( $zs_options['plan_1_button_color'] ) ? $zs_options['plan_1_button_color'] : '#e41b2b';

		$plan_1_button_text_color      = isset( $zs_options['plan_1_button_text_color'] ) ? $zs_options['plan_1_button_text_color'] : '#fff';

		$plan_1_button_hover_color      = isset( $zs_options['plan_1_button_hover_color'] ) ? $zs_options['plan_1_button_hover_color'] : '#274397';

		$plan_1_button_text_hover_color = isset( $zs_options['plan_1_button_text_hover_color'] ) ? $zs_options['plan_1_button_text_hover_color'] : '#fff';


		$plan_2_button_color      = isset( $zs_options['plan_2_button_color'] ) ? $zs_options['plan_2_button_color'] : '#36ae44';

		$plan_2_button_text_color      = isset( $zs_options['plan_2_button_text_color'] ) ? $zs_options['plan_2_button_text_color'] : '#fff';

		$plan_2_button_hover_color      = isset( $zs_options['plan_2_button_hover_color'] ) ? $zs_options['plan_2_button_hover_color'] : '#274397';

		$plan_2_button_text_hover_color = isset( $zs_options['plan_2_button_text_hover_color'] ) ? $zs_options['plan_2_button_text_hover_color'] : '#fff';


		$plan_3_button_color      = isset( $zs_options['plan_3_button_color'] ) ? $zs_options['plan_3_button_color'] : '#01adef';

		$plan_3_button_text_color      = isset( $zs_options['plan_3_button_text_color'] ) ? $zs_options['plan_3_button_text_color'] : '#fff';

		$plan_3_button_hover_color      = isset( $zs_options['plan_3_button_hover_color'] ) ? $zs_options['plan_3_button_hover_color'] : '#274397';

		$plan_3_button_text_hover_color = isset( $zs_options['plan_3_button_text_hover_color'] ) ? $zs_options['plan_3_button_text_hover_color'] : '#fff';

		$styles 	        = '
			.mrb_plan_1 #mrb_plan_btn button.vc_btn3 {
			    color: '. $plan_1_button_text_color .';
			    background: ' . $plan_1_button_color . ';
			}
			.mrb_plan_2 #mrb_plan_btn button.vc_btn3 {
			    color: '. $plan_2_button_text_color .';
			    background: ' . $plan_2_button_color . ';
			}
			.mrb_plan_3 #mrb_plan_btn button.vc_btn3 {
			    color: '. $plan_3_button_text_color .';
			    background: ' . $plan_3_button_color . ';
			}	

			.mrb_plan_1 #mrb_plan_btn button.vc_btn3:hover {
			    color: '. $plan_1_button_text_hover_color .';
			    background: ' . $plan_1_button_hover_color . ';
			}
			.mrb_plan_2 #mrb_plan_btn button.vc_btn3:hover {
			    color: '. $plan_2_button_text_hover_color .';
			    background: ' . $plan_2_button_hover_color . ';
			}
			.mrb_plan_3 #mrb_plan_btn button.vc_btn3:hover {
			    color: '. $plan_3_button_text_hover_color .';
			    background: ' . $plan_3_button_hover_color . ';
			}	

		';


		return $styles;
	}
}

function redux_plan_load_external_custom_css() {
	global $zs_options;

	if ( isset( $zs_options['use_button_predefined_color'] ) && $zs_options['use_button_predefined_color'] ) {
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

function redux_plan_custom_css_page() {
	global $zs_options;

	if ( isset( $zs_options['use_button_predefined_color'] ) && $zs_options['use_button_predefined_color'] ) {
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
