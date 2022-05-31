<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-img">	
		<div class="post-img-content">	
			<?php studios_post_thumbnail(); ?>
		</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title">', '</h2>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<p class="entry-meta"><?php echo get_the_date( 'F d, Y' ); ?></p>
	</div>

	<div class="post-desc">
		<div class="entry-content">
			<p><?php
			echo wp_trim_words( get_the_content(), 60, '...' );
			?>
		</p>
		<p><a class="read-more" href="<?php the_permalink(); ?>">Read <em>the</em> Post</a></p>

	</div><!-- .entry-content -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
