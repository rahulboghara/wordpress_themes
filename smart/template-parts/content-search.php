<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smart
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<span class="entry-footer">
				<?php smart_entry_footer(); ?>
			</span><!-- .entry-footer -->
		</div>
		
	</article><!-- #post-<?php the_ID(); ?> -->
