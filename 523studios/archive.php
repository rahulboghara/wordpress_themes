<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package studios
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="main-content">
					<?php if ( have_posts() ) : ?>

						<header class="entry-header">
							<?php
							the_archive_title( '<h1 class="entry-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

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
</div><!-- #primary -->

<?php
get_footer();
