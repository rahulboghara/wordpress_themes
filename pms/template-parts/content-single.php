<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pms
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

	<div class="post-img col-xs-12">	
		<div class="row">
	<?php pms_post_thumbnail(); ?>
		</div>
	</div>
	
	<div class="post-desc col-xs-12">
		<div class="row">
	

	<div class="entry-content">
		<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pms' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pms' ),
					'after'  => '</div>',
				) );

			
		?>


	</div><!-- .entry-content -->

	<span class="entry-footer">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				pms_posted_on();
				pms_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php pms_entry_footer(); ?>

	</span><!-- .entry-footer -->
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->



