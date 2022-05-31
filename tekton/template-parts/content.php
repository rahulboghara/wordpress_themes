<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tekton
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) { ?>    
		<div class="post-img col-md-4 col-sm-4 col-xs-12">	
			<div class="post-img-content">	
				<?php tekton_post_thumbnail(); ?>
			</div>
		</div>
		<?php 
	}
	?>

	<?php if ( has_post_thumbnail() ) { ?>  
		<div class="post-desc col-md-8 col-sm-8 col-xs-12">
			<?php 
		}else{
			?>
			<div class="post-desc col-xs-12">
				<?php 
			}
			?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
			?>
			<div class="entry-content">
				<p><?php
				echo wp_trim_words( get_the_content(), 105, '...' );
				?>
			</p>
			<a class="read-more" href="<?php the_permalink(); ?>">Read More</a>

		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
