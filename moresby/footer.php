<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moresby
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="footer-top">
	<div class="container">
		<div class="row">
			
			<?php
			global $zs_options;

			$footer_widgets_columns = apply_filters( 'zs_footer_widgets_columns');

			$footer_widgets_columns1 = 1;
			$footer_widgets_columns2 = 2;
			$footer_widgets_columns3 = 3;
			$footer_widgets_columns4 = 4;
			$footer_widgets_columns5 = 5;
			$footer_widgets_columns6 = 6;

			if( isset( $zs_options['show_footer_widgets'] ) && $zs_options['show_footer_widgets'] ) {
				?>
				<aside class="footer-column columns-<?php echo esc_attr( $footer_widgets_columns); ?>">
					<?php
					if ( esc_attr( $footer_widgets_columns1) == esc_attr( $footer_widgets_columns)) {
						?>
						<div class="first col-12 widget">
							<?php dynamic_sidebar( 'first-footer-widget' ); ?>
						</div><!-- .first .widget -->
						<?php
					}
					?>
					<?php
					if ( esc_attr( $footer_widgets_columns2) == esc_attr( $footer_widgets_columns)) {
						?>
						<div class="first col-12 col-sm-6 widget">
							<?php dynamic_sidebar( 'first-footer-widget' ); ?>
						</div><!-- .first .widget -->

						<div class="second col-12 col-sm-6 widget">
							<?php dynamic_sidebar( 'second-footer-widget' ); ?>
						</div><!-- .second .widget -->
						<?php
					}
					?>
					<?php
					if ( esc_attr( $footer_widgets_columns3) == esc_attr( $footer_widgets_columns)) {
						?>
						<div class="first col-12 col-sm-3 col-lg-4 widget">
							<?php dynamic_sidebar( 'first-footer-widget' ); ?>
						</div><!-- .first .widget -->

						<div class="second col-12 col-sm-3 col-lg-4 widget">
							<?php dynamic_sidebar( 'second-footer-widget' ); ?>
						</div><!-- .second .widget -->
						<div class="third col-12 col-sm-3 col-lg-4 widget">
							<?php dynamic_sidebar( 'third-footer-widget' ); ?>
						</div><!-- .third .widget -->
						<?php
					}
					?>
					<?php
					if ( esc_attr( $footer_widgets_columns4) == esc_attr( $footer_widgets_columns)) {
						?>
						<div class="first col-12 col-sm-3 col-lg-3 widget">
							<?php dynamic_sidebar( 'first-footer-widget' ); ?>
						</div><!-- .first .widget -->

						<div class="second col-12 col-sm-3 col-lg-3 widget">
							<?php dynamic_sidebar( 'second-footer-widget' ); ?>
						</div><!-- .second .widget -->
						<div class="third col-12 col-sm-3 col-lg-3 widget">
							<?php dynamic_sidebar( 'third-footer-widget' ); ?>
						</div><!-- .third .widget -->
						<div class="forth col-12 col-sm-3 col-lg-3 widget">
							<?php dynamic_sidebar( 'forth-footer-widget' ); ?>
						</div><!-- .forth .widget -->
						<?php
					}
					?>
					<?php
					if ( esc_attr( $footer_widgets_columns5) == esc_attr( $footer_widgets_columns)) {
						?>
						<div class="first col-12 col-sm-6 col-lg-3 widget">
							<?php dynamic_sidebar( 'first-footer-widget' ); ?>
						</div><!-- .first .widget -->

						<div class="second col-12 col-sm-6 col-lg-3 widget">
							<?php dynamic_sidebar( 'second-footer-widget' ); ?>
						</div><!-- .second .widget -->
						<div class="third col-12 col-sm-4 col-lg-2 widget">
							<?php dynamic_sidebar( 'third-footer-widget' ); ?>
						</div><!-- .third .widget -->
						<div class="forth col-12 col-sm-4 col-lg-2 widget">
							<?php dynamic_sidebar( 'forth-footer-widget' ); ?>
						</div><!-- .forth .widget -->
						<div class="five col-12 col-sm-4 col-lg-2 widget">
							<?php dynamic_sidebar( 'five-footer-widget' ); ?>
						</div><!-- .five .widget -->
						<?php
					}
					?>
				</aside><!-- #fatfooter -->
				<?php
			}
			?>
		</div>
	</div>
</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="social-menu">
					<?php zs_social_icons(); ?>
				</div>
				<?php
				$footer_copyright_text 	= apply_filters( 'zs_footer_copyright_text');
				if ( apply_filters( 'zs_footer_copyright', true ) ) : ?>
					<span class="col-xs-12">
						<div class="row">
							<div class="copyright">
								<?php echo wp_kses_post( $footer_copyright_text ); ?>
							</div>
						</div>
					</span>
					<?php
				endif;
				?>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
