<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-xs-12">
		<div class="row">
	<?php if ( has_post_thumbnail() ) :  ?>
		<div class="col-xs-12 full-post-img">	
			<div class="row">
				<?php studios_post_thumbnail(); ?>
			</div>
		</div>
	<?php endif; ?>
			<div class="col-xs-12 full-post-desc" style="padding-left: 0;padding-right: 0;">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		</div>
	</div>
	</div>
	</article><!-- #post-<?php the_ID(); ?> -->
