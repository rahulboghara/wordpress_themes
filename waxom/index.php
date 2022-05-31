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
 * @package waxom
 */
if ( is_home() && ! is_front_page() ){
	get_header('blog');
}else{
	get_header();
}
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :
			?>
			<div class="container blog_page">
				<div class="row">
					<div class="col-xs-12 blog_content">
					<?php
					if ( is_home() && ! is_front_page() ) :
						?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

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

			/*the_posts_navigation();*/
			?>
			<?php
			global $wp_query; // you can remove this line if everything works for you
			 
			// don't display the button if there are not enough posts
			if (  $wp_query->max_num_pages > 1 )
				echo '<div class="zt_load"><button class="zt_loadmore">More posts</button></div>'; // you can use <a> as well
			?>
			
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
if ( is_home() && ! is_front_page() ){
	get_footer('blog');
}else{
	get_footer();
}

