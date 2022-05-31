<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package studios
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" style="margin-top: 30px;">
		<div class="container">
			<div class="row">
				<div class="main-content">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>
	</div>
	<div class="sidebar-content">
			<?php
			get_sidebar('main');
			?>
		</div>
</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
