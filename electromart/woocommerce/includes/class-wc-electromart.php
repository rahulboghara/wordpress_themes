<?php
/**
 * Electromart support.
 *
 * @since   3.5.X
 * @package WooCommerce/Classes
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_Electromart class.
 */
class WC_Electromart {

	/**
	 * Theme init.
	 */
	public static function init() {

		// Change WooCommerce wrappers.
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

		add_action( 'woocommerce_before_main_content', array( __CLASS__, 'output_content_wrapper' ), 10 );
		add_action( 'woocommerce_after_main_content', array( __CLASS__, 'output_content_wrapper_end' ), 10 );

		// This theme doesn't have a traditional sidebar.
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		// Enqueue theme compatibility styles.
		add_filter( 'woocommerce_enqueue_styles', array( __CLASS__, 'enqueue_styles' ) );

		// Register theme features.
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 300,
			'single_image_width'    => 700,
		) );


	}

	/**
	 * Open the Electromart wrapper.
	 */
	public static function output_content_wrapper() {
		echo '<div class="container">';
		echo '<div class="row">';
		echo '<section id="primary" class="content-area primary-content-area">';
		echo '<main id="main" class="site-main">';
		
	}

	/**
	 * Close the Electromart wrapper.
	 */

	public static function output_content_wrapper_end() {
		
		echo '</main>';
		echo '</section>';

		global $zs_options;
		$shop_layout = apply_filters( 'zs_shop_layout');
		$single_product_layout = apply_filters( 'zs_single_product_layout');

		if ( is_shop() || is_product_category() || is_product_tag() || is_tax( get_object_taxonomies( 'product' ) ) ) {
			if( $shop_layout != 'full-width' && $shop_layout != 'left-sidebar' && $shop_layout = 'right-sidebar' ) {

				echo '<section id="primary_sidebar" class="sidebar shop-right-sidebar">';
					dynamic_sidebar( 'shop-mein-sidebar' );
				echo '</section>';
			}
			if( $shop_layout != 'full-width' && $shop_layout = 'left-sidebar' && $shop_layout != 'right-sidebar' ) {

				echo '<section id="primary_sidebar" class="sidebar shop-left-sidebar">';
					dynamic_sidebar( 'shop-mein-sidebar' );
				echo '</section>';
			}
		}
		if ( is_singular( 'product' ) ){
			if( $single_product_layout != 'full-width' && $single_product_layout != 'left-sidebar' && $single_product_layout = 'right-sidebar' ) {

				echo '<section id="primary_sidebar" class="sidebar shop-right-sidebar">';
					dynamic_sidebar( 'shop-mein-sidebar' );
				echo '</section>';
			}
			if( $single_product_layout != 'full-width' && $single_product_layout = 'left-sidebar' && $single_product_layout != 'right-sidebar' ) {

				echo '<section id="primary_sidebar" class="sidebar shop-left-sidebar">';
					dynamic_sidebar( 'shop-mein-sidebar' );
				echo '</section>';
			}
		}
		echo '</div>';
		echo '</div>';
	}

	/**
	 * Enqueue CSS for this theme.
	 *
	 * @param  array $styles Array of registered styles.
	 * @return array
	 */
	public static function enqueue_styles( $styles ) {
		unset( $styles['woocommerce-general'] );
		unset( $styles['woocommerce-layout'] );	
		return apply_filters( 'woocommerce_electromart_styles', $styles );
	}

}

WC_Electromart::init();
