<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage fashionbag
 * @since 1.0.0
 */

if ( is_active_sidebar( 'main-sidebar' ) ) : ?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'fashionbag' ); ?>">
		<?php
		if ( is_active_sidebar( 'main-sidebar' ) ) {
			?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'main-sidebar' ); ?>
					</div>
				<?php
		}
		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
