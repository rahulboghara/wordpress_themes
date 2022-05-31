<?php
/**
 * Filter functions for Navigation Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_dropdown_trigger' ) ) {
	function redux_apply_dropdown_trigger( $trigger, $theme_location ) {
		global $zs_options;

		if( isset( $zs_options[$theme_location . '_dropdown_trigger'] ) ) {
			$trigger = $zs_options[$theme_location . '_dropdown_trigger'];
		}

		return $trigger;
	}
}