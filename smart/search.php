<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package smart
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
			<div class="row">
		<?php if ( have_posts() ) : ?>
			<div class="content-left col-xs-12 col-lg-9">
						<div class="row">
			<header class="entry-header">
				<h1 class="entry-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'smart' ), '<span>' . get_search_query() . '</span>' );
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

			wpbeginner_numeric_posts_nav(); 
			?>
		</div>
		</div>	
		<div id="main-sidebar" class="content-right col-xs-12 col-sm-push-2 col-md-push-0 col-lg-3">
		<div class="row">
			<div class="main-sidebar">
				<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</div>
		</div>
		</div>
		<?php	
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
