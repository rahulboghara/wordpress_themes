<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smart
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main blog_page">
		<div class="container">
			<div class="row">
				<div class="content-left col-xs-12 col-lg-9">
					<div class="row">
						<?php if ( have_posts() ) : ?>

							<header class="entry-header">
								<?php
								the_archive_title( '<h1 class="entry-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</header><!-- .page-header -->
							<ul class="category_ul">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();
								?>
								<li>
										<?php
											the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
										?>
								</li>
								<?php
							endwhile;
							?>
						</ul>
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
</div><!-- #primary -->

<?php
get_footer();
