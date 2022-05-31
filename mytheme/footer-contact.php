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
			if (   is_active_sidebar( 'first-contact-footer-widget'  )
				&& is_active_sidebar( 'second-contact-footer-widget' )
				&& is_active_sidebar( 'third-contact-footer-widget'  )
				&& is_active_sidebar( 'forth-contact-footer-widget'  )){
			}
			?> 
			<aside class="footer-column col-xs-12">
				<div class="first col-xs-3 widget">
					<?php dynamic_sidebar( 'first-contact-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-xs-3 widget">
					<?php dynamic_sidebar( 'second-contact-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-xs-3 widget">
					<?php dynamic_sidebar( 'third-contact-footer-widget' ); ?>
				</div><!-- .third .widget -->

				<div class="forth col-xs-3 widget">
					<div class=”custom-form”>
						<?php if ( shortcode_exists( 'contact-form-7' ) ) { echo do_shortcode('[contact-form-7 id="214" title="Contact Form Footer"]'); } ?>
					</div>
				</div><!-- .forth .widget -->

			</aside><!-- #fatfooter -->
		</div>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="pull-left col-xs-8">
				<div class="footer-bottom-widget">
					<?php dynamic_sidebar( 'contact-footer-bottom-widget' ); ?>
				</div>
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
			</div>
			<div class="pull-right col-xs-4">
				<span class="footer-logo">
				<?php
					the_custom_logo();
				?>
			</span>
			</div>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
<a class="backtotop"><i class="fa fa-angle-up"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
