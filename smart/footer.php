<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package smart
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="row">
			<div class="footer-content">
			<aside class="footer-column ">
				<div class="first col-sm-4 widget">
					<?php dynamic_sidebar( 'first-footer-widget' ); ?>
				</div><!-- .first .widget -->

				<div class="second col-sm-4 widget">
					<?php dynamic_sidebar( 'second-footer-widget' ); ?>
				</div><!-- .second .widget -->

				<div class="third col-sm-4 widget">
					<?php dynamic_sidebar( 'third-footer-widget' ); ?>
				</div><!-- .third .widget -->

				<div class="forth col-sm-4 widget">
					<?php dynamic_sidebar( 'forth-footer-widget' ); ?>
				</div><!-- .forth .widget -->
			</aside><!-- #fatfooter -->
		</div>
		</div>
	</div>
</footer><!-- #colophon -->
<a class="backtotop"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
