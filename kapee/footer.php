<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage kapee
 * @since 1.0.0
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<aside class="footer-column">
				<div class="first col-12 col-sm-6 col-lg-3 widget">
					<?php dynamic_sidebar( 'first-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-12 col-sm-4 col-lg-2 widget">
					<?php dynamic_sidebar( 'second-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-12 col-sm-4 col-lg-2 widget">
					<?php dynamic_sidebar( 'third-footer-widget' ); ?>
				</div><!-- .third .widget -->

				<div class="forth col-12 col-sm-4 col-lg-2 widget">
					<?php dynamic_sidebar( 'forth-footer-widget' ); ?>
				</div><!-- .forth .widget -->
				<div class="five col-12 col-sm-6 col-lg-3 widget">
					<?php dynamic_sidebar( 'five-footer-widget' ); ?>
				</div><!-- .five .widget -->
			</aside><!-- #fatfooter -->
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<span class="pull-left col-xs-6">
					<span class="copyright">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_get_theme()->get('Name'); ?></a>
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( '@ 2019 All Rights Reserved.', 'kapee' ) );
						?>
					</span>
				</span>
				<span class="pull-right col-xs-6">
					<div class="footer-bottom widget">
						<?php dynamic_sidebar( 'footer-bottom-widget' ); ?>
					</div><!-- .five .widget -->
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
