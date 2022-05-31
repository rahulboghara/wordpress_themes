<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itservice
 */

?>

	<div class="wrapper">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'itservice' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

