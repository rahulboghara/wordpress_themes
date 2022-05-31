<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				if ( ! is_home() && ! is_front_page() ){
					?>
					<div class="container">
					<div class="row">
					<?php
				}
				?>
		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="entry-title">
					<?php _e( 'Search results for:', 'fashionbag' ); ?>
				</h1>
				<div class="page-description"><?php echo get_search_query(); ?></div>
			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'search' );

				// End the loop.
			endwhile;

			// Previous/next page navigation.
			fashionbag_the_posts_navigation();

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		if ( ! is_home() && ! is_front_page() ){
					?>
					</div>
					</div>
					<?php
			}
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
