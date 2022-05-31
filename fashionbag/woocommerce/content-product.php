<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="content-inner">
		<div class="product-image">	<a href="<?php the_permalink(); ?>">
			<?php

			$args = array(
				'post_type' => 'product',
				'meta_key' => '_featured'
			);

			$featured_query = new WP_Query( $args );
			/*$product = get_product( $featured_query->post->ID );*/
				
			if ($featured_query == true){
				?>
				<span class="featured"><?php esc_html_e( 'Featured', 'fashionbag' ); ?></span>
				<?php
			}
			

				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</a>
			<?php do_action( 'woocommerce_after_shop_loop_item' );	?>
				
				<div class="wishlist_button">
				<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
				</div>

			</div><div class="product-desc-wrapper">
				<div class="product-category">
				<?php
				$terms = get_the_terms( get_the_ID(), 'product_cat' );

				foreach ($terms as $term) {

				    echo '<span itemprop="name">'.$term->name.'</span>';
				}
				?>
				</div>
				<div class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

		        <?php
		            global $product;
		            $seller = get_post_field( 'post_author', $product->get_id());
		 			$author     = get_user_by( 'id', $seller );

		            $store_info = dokan_get_store_info( $author->ID );
		            if ( !empty( $store_info['store_name'] ) ) { ?>
		            	<div class="sold-by"> 
		            		<span class="sold-by-label">Sold By : </span> 
		                     <?php printf( '<a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_info['store_name']); ?>
		                    </div>
		            <?php 
		        } 

    
						/**
						 * woocommerce_after_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10 
						 */
						 do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
				<div class="product-button"></div>
		</div>
		</div>	
</li>
