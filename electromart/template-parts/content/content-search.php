<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<div class="col-xs-12 search_page">
	<div class="row">
	<div class="col-xs-4">	
		<div class="row">
			<?php 
			if ( ! has_post_thumbnail() ){
				global $zs_options;
				if (apply_filters( 'zs_loop_post_placeholder_img', true )) {
					$image = get_template_directory_uri() .'/img/placeholder.png'; 
					$url = esc_url( get_permalink() );
   			 		echo '<figure class="post-thumbnail"><a href="'.$url.'"><img src="'.$image.'" alt="" /></a></figure>';
				}	
			} else{
   			 	electromart_post_thumbnail(); 
   			 }
   			?>
		</div>
	</div>
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'electromart' ) );
		}
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php electromart_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</div>
</div>
</article><!-- #post-${ID} -->
