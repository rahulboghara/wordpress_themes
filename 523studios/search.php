<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package studios
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
			<div class="row">
				<div class="main-content">
		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<h1 class="entry-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'studios' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .entry-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
			<div class="post-pagination">
					<?php
					post_pagination();
					?>
				</div>
			<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
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
	</section><!-- #primary -->

<?php
get_footer();
