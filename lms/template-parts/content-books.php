<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lms
 */

?>

      <li id="post-<?php the_ID(); ?>" class= "book_li">
          <div class="book_inner">
          <div class="book_img">
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

          <div class="book_desc">
            <div class="book_content"><strong>Title: </strong><span><?php the_title(); ?></span></div>
            <div class="book_content"><strong>Book Id: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_id', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Author: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_author', true ) ); ?></span>
            </div>
            <div class="book_content"><strong>Book Category: </strong>
            <span><?php 
                $terms = get_the_terms( get_the_ID(), 'book_category' );

                $count= count($terms);
                if ($count > 1) {
                foreach ($terms as $term) {
                      echo $term->name . '<span>,</span> ' ;
                  }
                }else{
                  foreach ($terms as $term) {
                      echo $term->name ;
                  }
                }
                ?> 
                </span>
            </div>
            <div class="book_content"><strong>Published On: </strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'book_pb_date', true ) ); ?></span>
            </div>
          </div>
          </div>
          <div><?php echo esc_html($load_posts->max_num_pages); ?></div>
      </li>

