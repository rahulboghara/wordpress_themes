<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="blog-inner">

	<div class="col-xs-12">	
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

<div class="col-xs-12" style="margin-top: 15px;">
	<div class="row">
	<header class="entry-header">
		<?php
		if ( is_sticky() && is_home() && ! is_paged() ) {
			printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'electromart' ) );
		}
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
		if ( is_home () || is_category() || is_archive() ) {
    		the_excerpt('');
		} else {
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'electromart' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'electromart' ),
					'after'  => '</div>',
				) );

			}
		?>
	</div><!-- .entry-content -->

	<span class="entry-footer">
		<?php electromart_entry_footer(); ?>
	</span><!-- .entry-footer -->
</div>
</div>
</div>
</article><!-- #post-${ID} -->

