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
				<div class="product-hover"></div>
			</div><div class="product-desc-wrapper">
				<div class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="product-category">
				<?php
				$terms = get_the_terms( get_the_ID(), 'product_cat' );

				foreach ($terms as $term) {

				    echo '<span itemprop="name">'.$term->name.'</span>';
				}
				?>
				</div>
		<?php
				/**
				 * woocommerce_after_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10 
				 */
				 do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		
		</div>
		</div>	
</li>
