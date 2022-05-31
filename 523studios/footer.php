<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studios
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="footer-instagram">
		<?php dynamic_sidebar( 'instagram-widget' ); ?>
	</div>
	<div class="site-info">
		<div class="container">
			<div class="row">
				<div class="bottom-social">
					<?php dynamic_sidebar( 'footer-bottom-widget' ); ?>
				</div><!-- .bottom .widget -->
				<div class="copyright">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */ 
					printf( esc_html__( 'Copyright © 2020 -', 'studios' ) );
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php $theme = wp_get_theme(); echo $theme->get( 'TextDomain' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
<a class="backtotop"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
