<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package moresby
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
	<?php moresby_post_thumbnail(); ?>
		</div>
	</div>
	
	<div class="post-desc col-xs-12">
		<div class="row">
	

	<div class="entry-content">
		<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moresby' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moresby' ),
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
				moresby_posted_on();
				moresby_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php moresby_entry_footer(); ?>

	</span><!-- .entry-footer -->
</div>
</div>
</article><!-- #post-<?php the_ID(); ?> -->

<div class="row navigation-post">
<?php
$prev_post = get_previous_post();
if($prev_post) {
   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
   echo "\t" . '<div class="col-xs-6 pull-left text-left"><span>&laquo; Previous post</span><br><a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" "><strong>&quot;'. $prev_title . '&quot;</strong></a></div>' . "\n";
}

$next_post = get_next_post();
if($next_post) {
   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
   echo "\t" . '<div class="col-xs-6 pull-right text-right"><span>Next post &raquo;</span><br><a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" "><strong>&quot;'. $next_title . '&quot;</strong></a></div>' . "\n";
}
?>
</div>

