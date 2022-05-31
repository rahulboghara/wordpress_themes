<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
					<div class="row">
			<div class="error-404 not-found">
				<div class="page-content">
					<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'electromart' ); ?></h1>
					</header><!-- .page-header -->
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'electromart' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div>
	</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
