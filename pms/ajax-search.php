<?php 
$abs_path= __FILE__;
$get_path=explode('wp-content',$abs_path);
$path=$get_path[0].'wp-load.php';
include($path);

header("HTTP/1.1 200 OK");
?>
<div class="search_result">
<?php if(!empty($_POST['title']) || !empty($_POST['address']) || !empty($_POST['type'])) { ?>

<span>Search Results:-</span>
<?php if($_POST['title']) { ?>
  <span>Title: "<?php echo $_POST['title'];?>"<?php if(!empty($_POST['address']) || !empty($_POST['type'])) {echo ',';}  ?></span>
<?php } ?>
<?php if($_POST['address']) { ?>
  <span>Address: "<?php echo $_POST['address']; ?>"<?php if(!empty($_POST['type'])) {echo ',';} ?></span>
<?php } ?>
<?php if($_POST['type']) { ?>
  <span>Property Type: "<?php echo $_POST['type']; ?>"</span>
<?php } 

}else{
?>
<span>Search Results:- All Properties</span>

<?php

}
?>
</div>
<ul class="property_ul">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $title  = $_POST['title'];
    $address  = $_POST['address'];
    $type  = $_POST['type'];

    $meta_query[] = array(
      'key' => 'title',
      'value' => $title,
      'compare' => 'LIKE'
    );

    $meta_query[] = array(
      'key' => 'property_address',
      'value' => $address,
      'compare' => 'LIKE'
    );

    if(count($meta_query) > 1) {
      $meta_query['relation'] = 'AND';
    }

    $search = new WP_Query( array(
      'post_type' => 'property',
      'post_status' => 'publish',
      'meta_query'=> $meta_query,
      'paged' =>  $paged,
      'tax_query' => array(
            array(
                'taxonomy'  => 'property_type',
                'field'     => 'name',
                'terms'     => $type,
                'operator'  => 'AND')

                ),
    ));

    if($search->have_posts()) { 

      while($search->have_posts()) { $search->the_post(); 
      ?>
      <li id="post-<?php the_ID(); ?>" class= "property_li">
          <div class="property_inner">
          <div class="property_img">
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

          <div class="property_desc">
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
          </div>
          </div>

      </li>

    <?php }
  }else{
    ?>
          <div class="error-404 not-found">
        <div class="page-content">
          <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'No Property Found!', 'pms' ); ?></h1>
          </header><!-- .page-header -->
        </div><!-- .page-content -->
      </div><!-- .error-404 -->
    <?php
  }
  ?>
          <input type="text" id="total_pages" value="<?php echo esc_html($search->max_num_pages); ?>">
</ul>

<?php if ( $search->max_num_pages > $paged ) {
  ?>


 <button class="loadmore">More Properties</button>

 <?php } ?>



