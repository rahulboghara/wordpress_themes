<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itservice
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="col-xs-4">	
		<div class="row">
	<?php itservice_post_thumbnail(); ?>
		</div>
	</div>
	
	<div class="col-xs-8">
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'itservice' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'itservice' ),
					'after'  => '</div>',
				) );

			}
		?>


	</div><!-- .entry-content -->

	<span class="entry-footer">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				itservice_posted_on();
				itservice_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php itservice_entry_footer(); ?>

	</span><!-- .entry-footer -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
