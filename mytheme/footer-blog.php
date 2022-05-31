<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<?php
			if (   is_active_sidebar( 'first-blog-footer-widget'  )
				&& is_active_sidebar( 'second-blog-footer-widget' )
				&& is_active_sidebar( 'third-blog-footer-widget'  )
				&& is_active_sidebar( 'forth-blog-footer-widget'  )){
			}
			?> 
			<aside class="footer-column col-xs-12">
				<div class="first col-xs-3 widget">
					<?php dynamic_sidebar( 'first-blog-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-xs-3 widget">
					<?php dynamic_sidebar( 'second-blog-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-xs-3 widget">
					<?php dynamic_sidebar( 'third-blog-footer-widget' ); ?>
				</div><!-- .third .widget -->

				<div class="forth col-xs-3 widget">
					<?php dynamic_sidebar( 'forth-blog-footer-widget' ); ?>
				</div><!-- .forth .widget -->

			</aside><!-- #fatfooter -->
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mytheme' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'powered by %s', 'mytheme' ), 'zitrone solutions' );
					?>
				</a>
				<span class="sep">    |    </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s By %2$s', 'mytheme' ), 'mytheme', '<a href="http://www.chirag.com">Chirag Sanghani</a>' );
				?>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
<a class="backtotop"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
