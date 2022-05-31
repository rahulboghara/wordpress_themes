<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

if ( is_active_sidebar( 'mein-sidebar' ) ) : ?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'electromart' ); ?>">
		<?php
		if ( is_active_sidebar( 'mein-sidebar' ) ) {
			?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'mein-sidebar' ); ?>
					</div>
				<?php
		}
		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
