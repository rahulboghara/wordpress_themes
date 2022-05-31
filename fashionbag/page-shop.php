<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage fashionbag
 * @since 1.0.0
 */

get_header();
?>
		<section id="primary" class="content-area">
			<main id="main" class="site-main">
						<?php

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}

			endwhile; // End of the loop.
			?>
</main><!-- #main -->
</section><!-- #primary -->
<section id="primary_sidebar" class="sidebar">
			<?php
			dynamic_sidebar( 'shop-mein-sidebar' );
			?>
</section><!-- #primary_sidebar -->
<?php
get_footer();
