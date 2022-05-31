<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lms
 */

?>

</div><!-- #content -->
<?php
if ( is_user_logged_in() ) {
?>
<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<div class="row">
					<div class="social-menu">
						<?php dynamic_sidebar( 'footer-bottom-widget' ); ?>
					</div>

					<span class="col-xs-12">
						<div class="row">
							<div class="copyright">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_get_theme()->get('Name'); ?></a>
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( '@ 2019 All Rights Reserved.', 'lms' ) );
								?>
							</div>
						</div>
					</span>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
	<a id="scrollUp"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<?php
		}
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


