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
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

get_header();
			global $zs_options;
			$blog_style_view = $zs_options['blog_view'];
			$blog_layout = $zs_options['blog_layout'];
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( is_home() && ! is_front_page() ){
					?>
					<div class="container">
					<div class="row">
					<?php
				}
		if ( have_posts() ) {

			if( $blog_style_view = 'blog-list' && $blog_style_view != 'blog-grid' && $blog_style_view != 'blog-default' ) {
	
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content/content', 'list'  );
				}

				// Previous/next page navigation.
				electromart_the_posts_navigation();
			}


			if( $blog_style_view != 'blog-list' && $blog_style_view != 'blog-grid' && $blog_style_view = 'blog-default' ) {
	
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content/content' );
				}

				// Previous/next page navigation.
				electromart_the_posts_navigation();
			}

			if( $blog_style_view != 'blog-list' && $blog_style_view = 'blog-grid' && $blog_style_view != 'blog-default' ) {
				?>
				<div class="blog-outer-content">
				<?php
				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content/content', 'grid'  );
				}

				// Previous/next page navigation.
				electromart_the_posts_navigation();
				?>
				</div>
				<?php
			}


			
		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		if ( is_home() && ! is_front_page() ){
					?>
					</div>
					</div>
					<?php
			}
		?>


		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php
	if( $blog_layout != 'full-width' && $blog_layout = 'left-sidebar' && $blog_layout != 'right-sidebar' ) {
				?>
				<section id="primary_sidebar" class="sidebar">
					<?php dynamic_sidebar( 'blog-sidebar-widget' ); ?>
				</section>
				<?php
			}

			if( $blog_layout != 'full-width' && $blog_layout != 'left-sidebar' && $blog_layout = 'right-sidebar' ) {
				?>
				<section id="primary_sidebar" class="sidebar">
					<?php dynamic_sidebar( 'blog-sidebar-widget' ); ?>
				</section>
				<?php
			}

get_footer();
