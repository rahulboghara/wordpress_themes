<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package smart
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="content-left col-xs-12 col-lg-9">
					<div class="row">
			<section class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'smart' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'smart' ); ?></p>

					<?php
					get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</div>
			<div id="main-sidebar" class="content-right col-xs-12 col-sm-push-2 col-md-push-0 col-lg-3">
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
