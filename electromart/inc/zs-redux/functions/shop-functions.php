<?php
/**
 * Filter functions for Shop Section of Theme Options
 */


if( ! function_exists( 'redux_apply_product_comparison_page_id' ) ) {
	function redux_apply_product_comparison_page_id( $compare_page_id ) {
		global $zs_options;

		if( isset( $zs_options['compare_page_id'] ) ) {
			$compare_page_id = $zs_options['compare_page_id'];
		}

		return $compare_page_id;
	}
}


if ( ! function_exists( 'redux_apply_shop_loop_products_columns' ) ) {
	function redux_apply_shop_loop_products_columns( $columns ) {
		global $zs_options;

		if( isset( $zs_options['product_columns'] ) ) {
			$columns = $zs_options['product_columns'];
		}

		return $columns;
	}
}

if ( ! function_exists( 'redux_apply_shop_loop_per_page' ) ) {
	function redux_apply_shop_loop_per_page( $per_page ) {
		global $zs_options;

		if( isset( $zs_options['products_per_page'] ) ) {
			$per_page = $zs_options['products_per_page'];
		}

		return $per_page;
	}
}

if ( ! function_exists( 'redux_set_shop_view_args' ) ) {
	function redux_set_shop_view_args( $shop_view_args ) {
		global $zs_options;

		if ( isset( $zs_options['product_archive_enabled_views'] ) ) {
			$shop_views = $zs_options['product_archive_enabled_views']['enabled'];

			if ( $shop_views ) {
				$new_shop_view_args = array();
				$count = 0;
				
				foreach( $shop_views as $key => $shop_view ) {
					
					if ( isset( $shop_view_args[ $key ] ) ) {
						$new_shop_view_args[ $key ] = $shop_view_args[ $key ];

						if ( 0 == $count ) {
							$new_shop_view_args[ $key ]['active'] = true;
						} else {
							$new_shop_view_args[ $key ]['active'] = false;
						}

						$count++;
					}
				}

				return $new_shop_view_args;
			}
		}

		return $shop_view_args;
	}
}

if ( ! function_exists( 'redux_apply_shop_layout' ) ) {
	function redux_apply_shop_layout( $shop_layout ) {
		global $zs_options;

		if( isset( $zs_options['shop_layout'] ) ) {
			$shop_layout = $zs_options['shop_layout'];
		}

		return $shop_layout;
	}
}

if ( ! function_exists( 'redux_apply_single_product_layout' ) ) {
	function redux_apply_single_product_layout( $single_product_layout ) {
		global $zs_options;

		if( isset( $zs_options['single_product_layout'] ) ) {
			$single_product_layout = $zs_options['single_product_layout'];
		}

		return $single_product_layout;
	}
}

if ( ! function_exists( 'redux_toggle_related_products_output' ) ) {
	function redux_toggle_related_products_output( $enable ) {
		global $zs_options;

		if ( ! isset( $zs_options['enable_related_products'] ) ) {
			$zs_options['enable_related_products'] = true;
		}

		if ( $zs_options['enable_related_products'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}

if ( ! function_exists( 'redux_apply_single_product_layout_style' ) ) {
	function redux_apply_single_product_layout_style( $single_product_style ) {
		global $zs_options;

		if( isset( $zs_options['single_product_style'] ) ) {
			$single_product_style = $zs_options['single_product_style'];
		}

		return $single_product_style;
	}
}


if ( ! function_exists( 'body_shop_class' ) ) {
function body_shop_class( $classes ) {
	global $zs_options;

	$shop_layout = apply_filters( 'zs_shop_layout');
	$single_product_layout = apply_filters( 'zs_single_product_layout');

	if ( is_shop() || is_product_category() || is_product_tag() || is_tax( get_object_taxonomies( 'product' ) ) ) {
		$classes[] = $shop_layout;
	}
	if ( is_singular( 'product' ) ){
		$classes[] = $single_product_layout;
	}
	return $classes;
	}

}
add_filter( 'body_class', 'body_shop_class' );