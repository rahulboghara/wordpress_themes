<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating">
			<?php 

			if ( $average >= 3 ){
				?>
				<div class="zs-star-rating"><div class="rating-wrap good"><span class="rating"><?php echo floatval($average) ?></span> <i class="fa fa-star" aria-hidden="true"></i> </div>
				<?php if ( comments_open() ) : ?>
				<div class="rating-counts"><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php echo $review_count ?>)</a></div>
				<?php endif ?>
				</div>
				<?php
			}elseif ($average >= 2) {
				?>
				<div class="zs-star-rating"><div class="rating-wrap poor"><span class="rating"><?php echo floatval($average) ?></span> <i class="fa fa-star" aria-hidden="true"></i> </div>
				<?php if ( comments_open() ) : ?>
				<div class="rating-counts"><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php echo $review_count ?>)</a></div>
				<?php endif ?>
				</div>
				<?php
			}
			elseif ($average >= 1) {
				?>
				<div class="zs-star-rating"><div class="rating-wrap bad"><span class="rating"><?php echo floatval($average) ?></span> <i class="fa fa-star" aria-hidden="true"></i> </div>
				<?php if ( comments_open() ) : ?>
				<div class="rating-counts"><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php echo $review_count ?>)</a></div>
				<?php endif ?>
				</div>
				<?php
			} 
	?>


		
	</div>

<?php endif; ?>
