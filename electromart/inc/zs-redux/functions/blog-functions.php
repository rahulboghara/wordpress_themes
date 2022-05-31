<?php
/**
 * Filter functions for Blog Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_blog_page_view' ) ) {
	function redux_apply_blog_page_view( $blog_view ) {
		global $zs_options;

		if( isset( $zs_options['blog_view'] ) ) {
			$blog_view = $zs_options['blog_view'];
		}

		return $blog_view;
	}
}

if ( ! function_exists( 'redux_apply_blog_page_layout' ) ) {
	function redux_apply_blog_page_layout( $blog_layout ) {
		global $zs_options;

		if( isset( $zs_options['blog_layout'] ) ) {
			$blog_layout = $zs_options['blog_layout'];
		}

		return $blog_layout;
	}
}

if ( ! function_exists( 'redux_toggle_post_placeholder_img' ) ) {
	function redux_toggle_post_placeholder_img( $enable_placeholder_img ) {
		global $zs_options;

		if( isset( $zs_options['post_placeholder_img'] ) ) {
			$enable_placeholder_img = $zs_options['post_placeholder_img'];
		}

		return $enable_placeholder_img;
	}
}

if ( ! function_exists( 'redux_apply_single_post_layout' ) ) {
	function redux_apply_single_post_layout( $single_post_layout ) {
		global $zs_options;

		if( isset( $zs_options['single_post_layout'] ) ) {
			$single_post_layout = $zs_options['single_post_layout'];
		}

		return $single_post_layout;
	}
}



// add category nicenames in body and post class

if ( ! function_exists( 'body_blog_class' ) ) {
function body_blog_class( $classes ) {
	global $zs_options;

	$blog_style1 = $zs_options['blog_view'];
	$blog_layout1 = $zs_options['blog_layout'];

	if( is_home()) {
		$classes[] = $blog_style1;
	}
	if( is_home() || is_singular( 'post' )) {
		$classes[] = $blog_layout1;
	}
	return $classes;
	}
}
add_filter( 'body_class', 'body_blog_class' );

