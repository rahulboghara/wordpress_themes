<?php

/*

Element Description: Zs Product Category

*/



// Element Class 

class ZSProductCategory extends WPBakeryShortCode {



    // Element Init

    function __construct() {

        add_action( 'init', array( $this, 'vc_product_category_mapping' ) );

        add_shortcode( 'vc_product_category', array( $this, 'vc_product_category_html' ) );

    }



        // Element Mapping

    public function vc_product_category_mapping() {

        $args = array(

            'type' => 'post',

            'child_of' => 0,

            'parent' => '0',

            'orderby' => 'name',

            'order' => 'ASC',

            'hide_empty' => false,

            'hierarchical' => 1,

            'exclude' => '',

            'include' => '',

            'per_page' => '',

            'taxonomy' => 'product_cat',

            'pad_counts' => false,



        );



        $categories = get_categories( $args );



        $product_category_dropdown = array();



        $this->zs_getCategoryChildsFull( 0, $categories, 0, $product_category_dropdown );



        $order_by_values = array(

            '',

            esc_html__( 'Date', 'zs' ) => 'date',

            esc_html__( 'ID', 'zs' ) => 'ID',

            esc_html__( 'Author', 'zs' ) => 'author',

            esc_html__( 'Title', 'zs' ) => 'title',

            esc_html__( 'Modified', 'zs' ) => 'modified',

            esc_html__( 'Comment count', 'zs' ) => 'comment_count',

            esc_html__( 'Menu order', 'zs' ) => 'menu_order',

            esc_html__( 'As IDs or slugs provided order', 'zs' ) => 'include',

        );



        $order_way_values = array(

            '',

            esc_html__( 'Descending', 'zs' ) => 'DESC',

            esc_html__( 'Ascending', 'zs' ) => 'ASC',

        );



        vc_map( array(

            'name' => __( 'Zs Product category', 'zs' ),

            'base' => 'vc_product_category',

            'icon' =>plugin_dir_url( __DIR__ ). "/public/img/icon.png",

            'category' => __( 'Zs Element', 'zs' ),

            'description' => __( 'Display product category', 'zs' ),

            'params' => array(

                array(

                    'type' => 'textfield',

                    'heading' => esc_html__( 'Category title', 'zs' ),

                    'param_name' => 'title',

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => __( 'Display slider type', 'zs' ),

                    'param_name' => 'display_type',

                    'value' => array(

                        __( 'Display Product Slider', 'zs' ) => 'display_product',

                        __( 'Display Category Slider', 'zs' ) => 'display_category',

                    ),

                    'save_always' => true,

                    'description' => __( 'Select Display type.', 'zs' ),

                ),

                array(

                    'type' => 'textfield',

                    'heading' => __( 'Per page', 'zs' ),

                    'value' => 12,

                    'save_always' => true,

                    'param_name' => 'per_page',

                    'description' => __( 'How much items per page to show', 'zs' ),

                ),

                array(

                    'type' => 'textfield',

                    'heading' => __( 'Columns', 'zs' ),

                    'value' => 3,

                    'save_always' => true,

                    'param_name' => 'columns',

                    'description' => __( 'How much columns Slider', 'zs' ),

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => __( 'Order by', 'zs' ),

                    'param_name' => 'orderby',

                    'value' => $order_by_values,

                    'std' => 'menu_order title',

                            // Default WC value

                    'save_always' => true,

                    'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'zs' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => __( 'Sort order', 'zs' ),

                    'param_name' => 'order',

                    'value' => $order_way_values,

                    'std' => 'ASC',

                            // default WC value

                    'save_always' => true,

                    'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'zs' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => __( 'Category', 'zs' ),

                    'value' => $product_category_dropdown,

                    'param_name' => 'category',

                    'save_always' => true,

                    'description' => __( 'Product category list', 'zs' ),

                ),



                array(

                    'type' => 'checkbox',

                    'heading' => esc_html__( 'Show Banner', 'zs' ),

                    'param_name' => 'show_banner',

                    'description' => __( 'If "YES" Show Banner', 'zs' ),

                    'value' => array( __( 'Yes', 'zs' ) => 'yes' ),

                    'std' => 'yes',

                    'save_always' => true,

                ),



                array(

                    'type' => 'dropdown',

                    'heading' => __( 'Banner type', 'zs' ),

                    'param_name' => 'banner_type',

                    'value' => array(

                        __( 'Banner slider', 'zs' ) => 'banner_slider',

                        __( 'Banner grid', 'zs' ) => 'banner_grid',

                    ),

                    'save_always' => true,

                    'description' => __( 'Select Banner type.', 'zs' ),

                    'dependency' => array(

                        'element' => 'show_banner',

                        'value' => 'yes',

                    ),

                ),



                array(

                  "type" => "attach_images",

                  "class" => "",

                  "heading" => __( "Banner Images", "zs" ),

                  "param_name" => "images",

                  "value" => '',

                  "description" => __( "Select Slider Banner Images", "zs" ),

                  'save_always' => true,

                  'dependency' => array(

                    'element' => 'banner_type',

                    'value' => 'banner_slider',

                ),

              ),

                array(

                  "type" => "attach_image",

                  "class" => "",

                  "heading" => __( "Banner Image", "zs" ),

                  "param_name" => "image",

                  "value" => '',

                  "description" => __( "Select Grid Banner Image", "zs" ),

                  'save_always' => true,

                  'dependency' => array(

                    'element' => 'banner_type',

                    'value' => 'banner_grid',

                ),

              ),



                array(

                    'type' => 'textfield',

                    'heading' => __( 'Image size', 'zs' ),

                    'param_name' => 'img_size',

                    'value' => 'thumbnail',

                    'description' => __( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'zs' ),

                    'save_always' => true,

                    'dependency' => array(

                        'element' => 'show_banner',

                        'value' => 'yes',

                    ),

                ),



                array(

                    'type' => 'textfield',

                    'heading' => __( 'Element ID', 'zs' ),

                    'param_name' => 'pc_id',

                    'description' => __( 'Enter element ID', 'zs' ),

                ),





            )

) );                             



}



function zs_getCategoryChildsFull( $parent_id, $array, $level, &$dropdown ) {

    global $wpdb;

    $keys = array_keys( $array );

    $i = 0;

    while ( $i < count( $array ) ) {

        $key = $keys[ $i ];

        $item = $array[ $key ];

        $i ++;

        if ( $item->category_parent == $parent_id ) {

            $name = str_repeat( '- ', $level ) . $item->name;

            $value = $item->slug;

            $dropdown[] = array(

                'label' => $name . '(' . $item->term_id . ')',

                'value' => $value,

            );

            unset( $array[ $key ] );

            $array = $this->zs_getCategoryChildsFull( $item->term_id, $array, $level + 1, $dropdown );

            $keys = array_keys( $array );

            $i = 0;

        }

    }



    return $array;

}



function zs_getSliderWidth( $size ) {

    global $_wp_additional_image_sizes;

    $width = '100%';

    if ( in_array( $size, get_intermediate_image_sizes() ) ) {

        if ( in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {

            $width = get_option( $size . '_size_w' ) . 'px';

        } else {

            if ( isset( $_wp_additional_image_sizes ) && isset( $_wp_additional_image_sizes[ $size ] ) ) {

                $width = $_wp_additional_image_sizes[ $size ]['width'] . 'px';

            }

        }

    } else {

        preg_match_all( '/\d+/', $size, $matches );

        if ( count( $matches[0] ) > 1 ) {

            $width = $matches[0][0] . 'px';

        }

    }



    return $width;

}



// Element HTML

public function vc_product_category_html( $atts ) {

    // Params extraction



    extract(

        shortcode_atts(

            array(

                'title' => '',

                'per_page'     => '12',

                'orderby'    => '',

                'order'      => 'ASC',

                'columns'      => '12',

                'hide_prev_next_buttons' => 'no',

                'loop' => 'no',

                'show_banner' => 'yes',

                'banner_type' => '',

                'display_type' => 'display_product',

                'images' => '',

                'image' => '',

                'img_size' => 'thumbnail',

                'pc_id' => '',

                'category'       => $category

            ), 

            $atts

        )

    );



    $category_id = get_term_by( 'name', $category, 'product_cat' );



    $args = array(

        'post_type' => 'product',

        'post_status'   => 'publish',

        'orderby' => $orderby,

        'order'      => $order,

        'pad_counts' => true,

        'hide_empty' => false,

        'show_uncategorized' => false,

        'hierarchical'  => true,

        'category'       => $category,

        'parent'       => $category_id->term_id,

        'taxonomy' => 'product_cat'

    );





    $product_category = get_categories($args);



    $product_args = array(

        'type'          => 'product',

        'post_status'   => 'publish',

        'pad_counts'    => false,

        'hierarchical'  => true,

        'hide_empty' => false,

        'tax_query'                => array(

            array(

                'taxonomy' => 'product_cat',

                'field' => 'slug',

                'terms' => $category_id->slug      

            )

        ),

    );



    $hide_prev_next_buttons = ( $hide_prev_next_buttons == 'yes') ? 'false' : 'true';

    $loop = ( $loop == 'yes') ? 'true' : 'false';

    $show_banner = ( $show_banner == 'yes') ? 'yes' : 'no';





    if ( ! empty( $pc_id ) ) {

        $product_category_id =  esc_attr( $pc_id ) ;

    }else{

        $product_category_id = 'product_category_box-' . rand( 100, 999 );

    }



    $banner_carousel_id = 'banner_carousel-' . rand( 100, 999 );

    $banner_grid_id = 'banner_grid-' . rand( 100, 999 );



    if ( '' === $images ) {

        $images = '-1,-2,-3';

    }



    $images = explode( ',', $images );

    $j = -1;



    if ( '' === $image ) {

        $image = '-1,-2,-3';

    }



    $image = explode( ',', $image );

    $j = -1;

    $slider_width = $this->zs_getSliderWidth( $img_size );



    ob_start();



    if ( $product_category || $product_args) {

        ?>

        <div id="<?php echo esc_attr( $product_category_id ); ?>" class="products-category-box woocommerce columns-1 banner-product-category">

            <div class="product_category_inner">

                <div class="pc-category_list-content col-md-12 col-md-3 col-lg-2">

                    <?php

                    if ( ! empty( $title ) ) {

                        ?>

                        <div class="pc-category-title">

                            <h3 class="pc-category-heading"><?php echo esc_attr( $title );?></h3>

                        </div>

                        <?php

                    }

                    ?> 

                    <ul class="pc-sub-category">

                        <?php

                        $i = 0;

                        ?>

                        <li><a id="<?php echo esc_attr($category_id->slug); ?>" class="product-<?php echo esc_attr($category_id->slug); ?><?php if ($i == 0) {echo " active";} ?>" data-name="<?php echo esc_attr($category_id->name); ?>" href="#"><?php echo esc_html($category_id->name); ?></a>

                        </li>



                        <?php

                        foreach ($product_category as $cat) {

                            ?>

                            <li><a id="<?php echo esc_attr($cat->slug); ?>" class="product-<?php echo esc_attr($cat->slug); ?><?php if ($i == 0) {echo " active";} ?>" data-name="<?php echo esc_attr($cat->name); ?>" href="#"><?php echo esc_html($cat->name); ?></a>

                            </li>

                            <?php

                            $i++;

                        }

                        ?>

                    </ul>

                </div>



                <div class="pc-category-content col-md-12 col-md-9 col-lg-10">

                    <div class="row">

                        <?php

                        if ($show_banner == 'yes') {

                            ?> 

                            <div class="pc-banner-section col-md-12 col-md-5">

                                <?php

                                if ($banner_type == 'banner_slider') {

                                    ?> 

                                    <div id="<?php echo esc_attr($banner_carousel_id) ?>" style="width: <?php echo esc_attr($slider_width) ?>;" class="owl-carousel pc_banner_carousel">

                                        <?php foreach ( $images as $attach_id ) :  ?>

                                            <?php

                                            $j ++;

                                            if ( $attach_id > 0 ) {

                                                $post_thumbnail = wpb_getImageBySize( array(

                                                    'attach_id' => $attach_id,

                                                    'thumb_size' => $img_size,

                                                ) );

                                            } else {

                                                $post_thumbnail = array();

                                                $post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';

                                                $post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );

                                            }

                                            $thumbnail = $post_thumbnail['thumbnail'];

                                            ?>

                                            <div class="pc_banner_inner">

                                                <?php echo $thumbnail; ?>

                                            </div>

                                        <?php endforeach ?>

                                    </div>

                                    <script rel="text/javascript">



                                        jQuery(document).ready(function(){

                                            jQuery('#<?php echo esc_attr($banner_carousel_id) ?>').owlCarousel({

                                                loop: true,

                                                items : 1,

                                                nav: false,

                                                dots: true,

                                                autoplay: true,

                                            });

                                        });

                                    </script>

                                    <?php

                                }

                                if ($banner_type == 'banner_grid'){

                                    ?>

                                    <div id="<?php echo esc_attr($banner_grid_id) ?>" class="pc_banner_grid">

                                        <div class="pc_banner_grid_inner">

                                            <?php foreach ( $image as $attach_id ) :  ?>

                                                <?php

                                                $j ++;

                                                if ( $image > 0 ) {

                                                    $post_thumbnail = wpb_getImageBySize( array(

                                                        'attach_id' => $attach_id,

                                                        'thumb_size' => $img_size,

                                                    ) );

                                                } else {

                                                    $post_thumbnail = array();

                                                    $post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';

                                                    $post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );

                                                }

                                                $thumbnail = $post_thumbnail['thumbnail'];

                                                ?>

                                                <div class="pc_banner_grid_content">

                                                    <?php echo $thumbnail; ?>

                                                </div>

                                            <?php endforeach ?>

                                        </div>

                                    </div>

                                    <?php

                                }

                                ?>

                            </div>

                            <?php

                        }

                        ?>

                        <div class="pc-category-section col-md-12 <?php if ($show_banner == 'yes') {?> col-md-7 <?php }?>">

                            <div class="row">

                                <?php

                                if ($display_type == 'display_product'){

                                $i = 0;

                                ?>

                                <div class="pc_product_cat<?php if ($i == 0) { echo " active";} ?>" id="product-<?php echo esc_attr($category_id->slug); ?>">

                                    <div class="woocommerce columns-4 ">

                                        <ul class="products columns-4 owl-carousel">

                                            <?php

                                            $query = New WP_Query( $product_args );

                                            if( $query->have_posts()) {

                                             while( $query->have_posts() ) : $query->the_post();

                                                wc_get_template_part( 'content', 'product' );

                                            endwhile;

                                        }

                                        wp_reset_query();  

                                        ?>

                                    </ul>

                                </div>

                                <script rel="text/javascript">

                                    jQuery(document).ready(function() {

                                        var lis = jQuery("#product-<?php echo esc_attr($category_id->slug); ?> ul.products li.product");

                                        for(var i = 0; i < lis.length; i+=2) {

                                          lis.slice(i, i+2)

                                          .wrapAll("<div class='itme_group'></div>");

                                      }

                                  });

                                    jQuery(document).ready(function($) {

                                        "use strict";

                                        jQuery("#product-<?php echo esc_attr($category_id->slug); ?> ul.products").addClass("owl-carousel");

                                    });

                                    jQuery(document).ready(function(){

                                        jQuery('#product-<?php echo esc_attr($category_id->slug); ?> ul.products').owlCarousel({

                                            loop: <?php echo esc_attr($loop); ?>,

                                            items : <?php echo esc_attr($columns); ?>,

                                            nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                            dots: false,

                                            navText: [" <i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],

                                            navClass: ['owl-prev', 'owl-next'],

                                            responsive:{

                                                0:{

                                                    items:1,

                                                    nav:true

                                                },

                                                380:{

                                                    items:2,

                                                    nav:true

                                                },

                                                600:{

                                                    items:3,

                                                    nav:true

                                                },

                                                768:{

                                                    items:3,

                                                    nav:true

                                                },

                                                992:{

                                                    items:3,

                                                    nav:true

                                                },

                                                1230:{

                                                    loop: <?php echo esc_attr($loop); ?>,

                                                    items : <?php echo esc_attr($columns); ?>,

                                                    nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                                }

                                            }

                                        });

                                    });

                                </script>

                            </div>

                            <?php 



                            foreach ($product_category as $cat) {

                                ?>

                                <div class="pc_product_cat" id="product-<?php echo esc_attr($cat->slug); ?>">

                                    <?php

                                    echo do_shortcode('[product_category category="' . esc_attr($cat->slug) . '" per_page=' . $per_page . ' orderby="'.$orderby.'" order="' . $order . '"]');

                                    ?>



                                    <script rel="text/javascript">

                                        jQuery(document).ready(function() {

                                            var lis = jQuery("#product-<?php echo esc_attr($cat->slug); ?> ul.products li.product");

                                            for(var i = 0; i < lis.length; i+=2) {

                                              lis.slice(i, i+2)

                                              .wrapAll("<div class='itme_group'></div>");

                                          }

                                      });

                                        jQuery(document).ready(function($) {

                                            "use strict";

                                            jQuery("#product-<?php echo esc_attr($cat->slug); ?> ul.products").addClass("owl-carousel");

                                        });

                                        jQuery(document).ready(function(){

                                            jQuery('#product-<?php echo esc_attr($cat->slug); ?> ul.products').owlCarousel({

                                                loop: <?php echo esc_attr($loop); ?>,

                                                items : <?php echo esc_attr($columns); ?>,

                                                nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                                dots: false,

                                                navText: [" <i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],

                                                navClass: ['owl-prev', 'owl-next'],

                                                responsive:{

                                                0:{

                                                    items:1,

                                                    nav:true

                                                },

                                                380:{

                                                        items:2,

                                                        nav:true

                                                },

                                                600:{

                                                    items:3,

                                                    nav:true

                                                },

                                                768:{

                                                    items:3,

                                                    nav:true

                                                },

                                                992:{

                                                    items:3,

                                                    nav:true

                                                },

                                                1230:{

                                                    loop: <?php echo esc_attr($loop); ?>,

                                                    items : <?php echo esc_attr($columns); ?>,

                                                    nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                                }

                                            }

                                            });

                                        });

                                    </script>

                                </div>

                                <?php $i++;

                            }

                        }



                        if ($display_type == 'display_category'){

                            ?>

                            <div class="pc_cat_section" id="pc_cat-<?php echo esc_attr($category_id->slug); ?>">

                                <div <?php wc_product_cat_class( $classes, $category ); ?>>

                            <?php

                            foreach ( $product_category as $category ){

                                ?>

                               

                                    <div class="pc-category-wrap">

                                        <a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>">



                                            <div class="pc-category-image">

                                                <?php

                                                    /**

                                                     * woocommerce_before_subcategory_title hook

                                                     *

                                                     * @hooked wc_category_thumb_double_size - 10

                                                     */

                                                    do_action( 'woocommerce_before_subcategory_title', $category );

                                                ?>

                                            </div>

                                        <div class="pc-title-wrap">

                                            <div class="pc-cat-title"><?php echo esc_html( $category->name ); ?></div>



                                                <div class="pc-category-count"><?php echo sprintf( _n( '%s product', '%s products', $category->count, 'woodmart' ), $category->count ); ?></div>

                                            <?php 

                                                /**

                                                 * woocommerce_after_subcategory_title hook

                                                 */

                                                do_action( 'woocommerce_after_subcategory_title', $category );

                                            ?>

                                        </div>

                                        </a>

                                </div>

                            

                        

                        <?php 

                        }

                        ?>



                        </div>

                        <script rel="text/javascript">

                                        jQuery(document).ready(function() {

                                            var lis = jQuery("#pc_cat-<?php echo esc_attr($category_id->slug); ?> .product .pc-category-wrap");

                                            for(var i = 0; i < lis.length; i+=2) {

                                              lis.slice(i, i+2)

                                              .wrapAll("<div class='itme_group'></div>");

                                          }

                                      });

                                        jQuery(document).ready(function($) {

                                            "use strict";

                                            jQuery("#pc_cat-<?php echo esc_attr($category_id->slug); ?> .product").addClass("owl-carousel");

                                        });

                                        jQuery(document).ready(function(){

                                            jQuery('#pc_cat-<?php echo esc_attr($category_id->slug); ?> .product').owlCarousel({

                                                loop: <?php echo esc_attr($loop); ?>,

                                                items : <?php echo esc_attr($columns); ?>,

                                                nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                                dots: false,

                                                navText: [" <i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],

                                                navClass: ['owl-prev', 'owl-next'],

                                                responsive:{

                                                    0:{

                                                        items:1,

                                                        nav:true

                                                    },

                                                    380:{

                                                        items:2,

                                                        nav:true

                                                    },

                                                    600:{

                                                        items:3,

                                                        nav:true

                                                    },

                                                    768:{

                                                        items:3,

                                                        nav:true

                                                    },

                                                    992:{

                                                        items:3,

                                                        nav:true

                                                    },

                                                    1230:{

                                                        loop: <?php echo esc_attr($loop); ?>,

                                                        items : <?php echo esc_attr($columns); ?>,

                                                        nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                                    }

                                                }

                                            });

                                        });

                                    </script>

                        </div>

                        <?php

                        }

                        ?> 



                    </div>

                </div>

            </div> <!-- end #<?php echo esc_html( $carousel_id ); ?> -->

            <script rel="text/javascript">

                jQuery(document).ready(function($) {

                    "use strict";



                    jQuery("#<?php echo esc_attr( $product_category_id ); ?> .pc-sub-category a").click(function (event) {



                        event.preventDefault();

                        var my_id = jQuery(this).attr("id");

                        jQuery(".pc-sub-category a").removeClass("active");

                        jQuery(this).addClass("active");



                        jQuery("#<?php echo esc_attr( $product_category_id ); ?> .pc-category-content .pc_product_cat").fadeOut(0);

                        jQuery("#<?php echo esc_attr( $product_category_id ); ?> .pc-category-content .pc_product_cat").removeClass("active");



                        jQuery("#<?php echo esc_attr( $product_category_id ); ?> #product-" + my_id).fadeIn();

                        jQuery("#<?php echo esc_attr( $product_category_id ); ?> #product-" + my_id).addClass("active");







                    });





                });





            </script>

        </div>

    </div>

</div>

    <?php



}



return ob_get_clean();

}









} // End Element Class



// Element Class Init

new ZSProductCategory();  

?>