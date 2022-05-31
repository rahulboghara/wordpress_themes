<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tekton
 */

?>

</div><!-- #content -->
<div class="footer-help-section">
		<?php dynamic_sidebar( 'footer-top-widget' ); ?>
</div>
<footer id="colophon" class="site-footer">
	<div class="footer-top">
	<div class="container">
		<div class="row">
			<aside class="footer-column">
				<div class="first col-md-4 col-sm-4 col-xs-12 widget">
					<?php dynamic_sidebar( 'first-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-md-4 col-sm-4 col-xs-12 widget">
					<?php dynamic_sidebar( 'second-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-md-4 col-sm-4 col-xs-12 widget">
					<?php dynamic_sidebar( 'third-footer-widget' ); ?>
				</div><!-- .third .widget -->
			</aside>
		</div>
	</div>
</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
					<span class="copyright">
						<?php
						printf( esc_html__( 'Copyright 2018 Construct Smart Inspection Services | All rights Reserved | Powered by : ', 'tekton' ) );
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_get_theme()->get('Name'); ?></a>
					</span>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
<a class="backtotop"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
