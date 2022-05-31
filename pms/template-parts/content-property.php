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

	<div class="post-img">
  <a href="<?php echo get_permalink($post->ID); ?>">	
			<?php
              if ( has_post_thumbnail() ) {
              the_post_thumbnail('property-size'); // add post thumbnail
              }else{ ?>
              <img src="<?php bloginfo('template_directory'); ?>/img/default.png" alt="<?php the_title(); ?>" />
              <?php 
                } 
              ?>
            </a>
	</div>
	
	<div class="post-desc">
	<div class="entry-content">
			<div class="property_content"><strong>Property Name: </strong><span><?php the_title(); ?></span></div>
            <div class="property_content"><strong>Property Type: </strong>
            <span><?php 
                $terms = get_the_terms( get_the_ID(), 'property_type' );

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
            <div class="property_content"><strong>Property Address:</strong>
            <span><?php echo esc_html( get_post_meta( get_the_ID(), 'property_address', true ) ); ?></span>
            </div>
		

	</div><!-- .entry-content -->

</div>
</article><!-- #post-<?php the_ID(); ?> -->

