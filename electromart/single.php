<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

get_header();
	
?>
	<div class="container">
					<div class="row">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( ! is_home() && ! is_front_page() ){
					?>
					<div class="container">
					<div class="row">
					<?php
				}
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'single' );

				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation(
						array(
							/* translators: %s: parent post link */
							'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'electromart' ), '%title' ),
						)
					);
				}

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End of the loop.
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
	global $zs_options;
	$single_post_layout = $zs_options['single_post_layout'];
		if( $single_post_layout != 'full-width' && $single_post_layout = 'left-sidebar' && $single_post_layout != 'right-sidebar' ) {
				?>
				<section id="primary_sidebar" class="sidebar">
					<?php dynamic_sidebar( 'blog-sidebar-widget' ); ?>
				</section>
				<?php
			}

			if( $single_post_layout != 'full-width' && $single_post_layout = 'left-sidebar' && $single_post_layout != 'right-sidebar' ) {
				?>
				<section id="primary_sidebar" class="sidebar">
					<?php dynamic_sidebar( 'blog-sidebar-widget' ); ?>
				</section>
				<?php
			}
			?>
</div>
</div>
<?php
get_footer();
