<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pms
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
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'pms' ); ?></h1>
					</header><!-- .page-header -->
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div>
	</div>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
