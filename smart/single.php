<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package smart
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main single-blog">
		<div class="container">
			<div class="row">
				<div class="content-left col-sm-12 col-lg-9">
					<div class="row">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

/*			the_post_navigation();*/

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
		</div>
			<div id="main-sidebar" class="content-right col-sm-12  col-sm-push-2 col-md-push-0 col-lg-3">
		<div class="row">
				<div class="main-sidebar">
					<?php dynamic_sidebar( 'main-sidebar' ); ?>
				</div>
	</div>
</div>
</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
