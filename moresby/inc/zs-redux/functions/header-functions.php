<?php
/**
 * Filter functions for Header Section of Theme Options
 */

if ( ! function_exists ( 'redux_toggle_live_search' ) ) {
	function redux_toggle_live_search( $enable ) {
		global $zs_options;

		if ( ! isset( $zs_options['header_live_search'] ) ) {
			$zs_options['header_live_search'] = true;
		}

		if ( $zs_options['header_live_search'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}	
}


if ( ! function_exists( 'redux_apply_navbar_search_placeholder' ) ) {
	function redux_apply_navbar_search_placeholder( $placeholder ) {
		global $zs_options;

		if ( ! isset( $zs_options['header_navbar_search_placeholder'] ) ) {
			$zs_options['header_navbar_search_placeholder'] = esc_html__( 'Search for products', 'zs' );
		}

		return $zs_options['header_navbar_search_placeholder'];
	}
}

if ( ! function_exists( 'redux_toggle_header_search_dropdown' ) ) {
	function redux_toggle_header_search_dropdown( $enable ) {
		global $zs_options;

		if ( ! isset( $zs_options['enable_header_navbar_search_dropdown'] ) ) {
			$zs_options['enable_header_navbar_search_dropdown'] = true;
		}

		if ( $zs_options['enable_header_navbar_search_dropdown'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if( ! function_exists( 'redux_modify_search_dropdown_categories_args' ) ) {
	function redux_modify_search_dropdown_categories_args( $args ) {
		global $zs_options;

		if ( ! isset( $zs_options['header_navbar_search_dropdown_categories'] ) ) {
			$zs_options['header_navbar_search_dropdown_categories'] = 'show_only_top_level';
		}

		if ( $zs_options['header_navbar_search_dropdown_categories'] == 'show_only_top_level' ) {
			$args[ 'hierarchical' ] = 1;
			$args[ 'depth' ] 		= 1;
		} else {
			$args[ 'hierarchical']  = 1;
		}

		return $args;
	}
}

if ( ! function_exists( 'redux_apply_navbar_search_dropdown_text' ) ) {
	function redux_apply_navbar_search_dropdown_text( $title ) {
		global $zs_options;

		if ( ! isset( $zs_options['header_navbar_search_dropdown_text'] ) ) {
			$zs_options['header_navbar_search_dropdown_text'] = esc_html__( 'All Categories', 'zs' );
		}

		return $zs_options['header_navbar_search_dropdown_text'];
	}
}


if( ! function_exists( 'redux_toggle_sticky_header' ) ) {
	function redux_toggle_sticky_header() {
		global $zs_options;

		if( isset( $zs_options['sticky_header'] ) && $zs_options['sticky_header'] == '1' ) {
			$sticky_header = true;
		} else {
			$sticky_header = false;
		}

		return $sticky_header;
	}
}
