<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smart
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			?>
			<div class="container blog_page">
				<div class="row">
					<div class="content-left col-xs-12 col-lg-9">
						<div class="row">
							<?php
							if ( is_home() && ! is_front_page() ) :
								?>
							<header class="entry-header">
								<h1 class="entry-title"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;
						?>
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
/*
the_posts_navigation();*/

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
</div>
</div>
<?php
else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

