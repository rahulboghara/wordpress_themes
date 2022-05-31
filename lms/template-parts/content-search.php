<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lms
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="col-xs-12">
		<div class="row">
	<?php if ( has_post_thumbnail() ) :  ?>
		<div class="col-xs-4">	
			<div class="row">
				<?php lms_post_thumbnail(); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-xs-8">
		<?php }else{ ?>
			<div class="col-xs-12" style="padding-left: 0;padding-right: 0;">
			<?php } ?>  

			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			</header><!-- .entry-header -->
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<span class="entry-footer">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						lms_posted_on();
						lms_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				<?php lms_entry_footer(); ?>
			</span><!-- .entry-footer -->
		</div>
	</div>
	</div>
	</article><!-- #post-<?php the_ID(); ?> -->
