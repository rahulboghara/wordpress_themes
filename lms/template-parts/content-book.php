<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lms
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-img">
  <a href="<?php echo get_permalink($post->ID); ?>">	
			<?php
              if ( has_post_thumbnail() ) {
              the_post_thumbnail('book-size'); // add post thumbnail
              }else{ ?>
              <img src="<?php bloginfo('template_directory'); ?>/img/default.png" alt="<?php the_title(); ?>" />
              <?php 
                } 
              ?>
            </a>
	</div>
	
	<div class="post-desc">
	<div class="entry-content">
			<div class="book_content"><strong>Title: </strong><span><?php the_title(); ?></span></div>
            <div class="book_content"><strong>Book Id: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_id', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Author: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_author', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Book Category: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_cat', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Published On: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_pb_date', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Description: </strong>
			<span><?php the_content(); ?></span>
			</div>
		

	</div><!-- .entry-content -->

</div>
</article><!-- #post-<?php the_ID(); ?> -->

