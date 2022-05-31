<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
	<?php if ( has_post_thumbnail() ) { ?>

		<div class="post_content_left">	
				<?php the_post_thumbnail('page_post_thumb'); ?>
		</div>
	<?php } ?>	
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="post_content_right">
	<?php } else { ?>	
		<div class="post_content_full">
	<?php } ?>	
	<div class="entry-content">
		<?php
		if ( is_home () || is_category() || is_archive() ) {
    		the_excerpt('');
		} else {
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'smart' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'smart' ),
					'after'  => '</div>',
				) );

			}
		?>


	</div><!-- .entry-content -->

	<span class="entry-footer">
		<span class="cat-links">
		<?php 
			global $post;
			$terms = wp_get_post_terms($post->ID, 'portfolio_category');
			if ($terms) {
			    $output = array();
			    foreach ($terms as $term) {
			        $output[] = '<a href="'. get_term_link( $term->slug, 'portfolio_category') .' " >' . $term->name . '</a>';
			    }
			    echo join( ', ', $output );
			}
		?>
		</span>
		<?php smart_entry_footer(); ?>

	</span><!-- .entry-footer -->
</div>


</article><!-- #post-<?php the_ID(); ?> -->
