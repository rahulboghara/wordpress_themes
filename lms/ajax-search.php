<?php 
$abs_path= __FILE__;
$get_path=explode('wp-content',$abs_path);
$path=$get_path[0].'wp-load.php';
include($path);

header("HTTP/1.1 200 OK");
?>
<div class="search_result">
<?php if(!empty($_POST['title']) || !empty($_POST['author']) || !empty($_POST['cat']) || !empty($_POST['date'])) { ?>

<span>Search Results:-</span>
<?php if($_POST['title']) { ?>
  <span>Title: "<?php echo $_POST['title'];?>"<?php if(!empty($_POST['author']) || !empty($_POST['cat']) || !empty($_POST['date'])) {echo ',';}  ?></span>
<?php } ?>
<?php if($_POST['author']) { ?>
  <span>Author: "<?php echo $_POST['author']; ?>"<?php if(!empty($_POST['cat']) || !empty($_POST['date'])) {echo ',';} ?></span>
<?php } ?>
<?php if($_POST['cat']) { ?>
  <span>Category: "<?php echo $_POST['cat']; ?>"<?php if(!empty($_POST['date'])) {echo ',';}  ?></span>
<?php } ?>
<?php if($_POST['date']) { ?>
  <span>Published On: "<?php echo $_POST['date']; ?>"</span>
<?php }

}else{
?>
<span>Search Results:- All Books</span>

<?php

}
?>
</div>
<ul class="book_ul">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $title  = $_POST['title'];
    $author  = $_POST['author'];
    $cat  = $_POST['cat'];
    $date  = $_POST['date'];

    $meta_query[] = array(
      'key' => 'title',
      'value' => $title,
      'compare' => 'LIKE'
    );

    $meta_query[] = array(
      'key' => 'book_author',
      'value' => $author,
      'compare' => 'LIKE'
    );

    $meta_query[] = array(
      'key'       => 'book_pb_date',
      'value'     => $date,
      'compare'   => 'LIKE',
    );


    if(count($meta_query) > 1) {
      $meta_query['relation'] = 'AND';
    }

    $search = new WP_Query( array(
      'post_type' => 'book',
      'post_status' => 'publish',
      'meta_query'=> $meta_query,
      'paged' =>  $paged,
      'tax_query' => array(
            array(
                'taxonomy'  => 'book_category',
                'field'     => 'name',
                'terms'     => $cat,
                'operator'  => 'AND')

                ),
    ));

    if($search->have_posts()) { 

      while($search->have_posts()) { $search->the_post(); 
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

      </li>

    <?php }
  }else{
    ?>
          <div class="error-404 not-found">
        <div class="page-content">
          <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'No Books Found!', 'lms' ); ?></h1>
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


 <button class="loadmore">More Books</button>

 <?php } ?>



