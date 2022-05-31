<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package waxom
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<?php
			if (   is_active_sidebar( 'first-footer-widget'  )
				&& is_active_sidebar( 'second-footer-widget' )
				&& is_active_sidebar( 'third-footer-widget'  )){
			}
			?> 
			<aside class="footer-column col-xs-12">
				<div class="first col-xs-3 widget">
					<?php dynamic_sidebar( 'first-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-xs-3 widget">
					<?php dynamic_sidebar( 'second-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-xs-3 widget">
					<?php dynamic_sidebar( 'third-footer-widget' ); ?>
				</div><!-- .third .widget -->

				<div class="forth col-xs-3 widget">
					<?php dynamic_sidebar( 'forth-footer-widget' ); ?>
				</div><!-- .forth .widget -->
			</aside><!-- #fatfooter -->
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<span class="pull-left col-xs-8">
					<div class="row">
				<span class="copyright">
				<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Copyright @ 2019', 'waxom' ) );
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Waxom</a>
				</span>
				<div class="bottom widget">
					<?php dynamic_sidebar( 'footer-bottom-widget' ); ?>
				</div><!-- .bottom .widget -->
			</div>
				</span>
				<span class="pull-right col-xs-4">
					<div class="row">
						<span class="devloped_by">
				<!-- <span class="sep"> | </span> -->
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Developed By %1$s', 'waxom' ),'<a href="https://www.zitronesolutions.com" target=_blank >Zitrone Solutions</a>' );
				?>
			</span>
			</div>
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
