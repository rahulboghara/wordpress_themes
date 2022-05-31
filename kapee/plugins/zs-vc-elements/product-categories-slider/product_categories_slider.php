<?php

/*

Element Description: Zs Product Categories Slider

*/

 

// Element Class 

class vcProductCategoriesSlider extends WPBakeryShortCode {

     

    // Element Init

    function __construct() {

        add_action( 'init', array( $this, 'vc_product_categories_slider_mapping' ) );

        add_shortcode( 'vc_product_categories_slider', array( $this, 'vc_product_categories_slider_html' ) );

    }



        // Element Mapping

        public function vc_product_categories_slider_mapping() {



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

            'name' => __( 'Zs Product categories Slider', 'zs' ),

            'base' => 'vc_product_categories_slider',

            'icon' => plugin_dir_url( __DIR__ ). "/public/img/icon.png",

            'category' => __( 'Zs Element', 'zs' ),

            'description' => __( 'Display product categories Slider', 'zs' ),

            'params' => array(

                array(

                    'type' => 'textfield',

                    'heading' => esc_html__( 'Categories title', 'zs' ),

                    'param_name' => 'title',

                ),



                array(

                    'type' => 'textfield',

                    'heading' => esc_html__( 'Number', 'zs' ),

                    'param_name' => 'number',

                    'description' => __( 'Enter the number of categories to display for this element.', 'zs' ),

                    'save_always' => true,

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => esc_html__( 'Order by', 'zs' ),

                    'param_name' => 'orderby',

                    'value' => $order_by_values,

                    'save_always' => true,

                    'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'zs' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                ),

                array(

                    'type' => 'dropdown',

                    'heading' => esc_html__( 'Sort order', 'zs' ),

                    'param_name' => 'order',

                    'value' => $order_way_values,

                    'save_always' => true,

                    'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'zs' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' ),

                ),

                array(

                    'type' => 'autocomplete',

                    'heading' => esc_html__( 'Categories', 'zs' ),

                    'param_name' => 'ids',

                    'settings' => array(

                        'multiple' => true,

                        'sortable' => true,

                    ),

                    'save_always' => true,

                    'description' => __( 'List of product categories', 'zs' ),

                ),



                array(

                    'type' => 'checkbox',

                    'heading' => esc_html__( 'Show Title', 'zs' ),

                    'param_name' => 'show_title',

                    'description' => __( 'If "YES" Show Each categorie Title', 'zs' ),

                    'value' => array( __( 'Yes', 'zs' ) => 'yes' ),

                    'std' => 'yes',

                    'save_always' => true,

                ),





                array(

                    'type' => 'textfield',

                    'heading' => esc_html__( 'Slides per view', 'zs' ),

                    'param_name' => 'slides_per_view',

                    'default' => '3',

                    'description' => __( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode.', 'zs' ),

                    'save_always' => true,

                ),



                array(

                    'type' => 'checkbox',

                    'heading' => esc_html__( 'Hide prev/next buttons', 'zs' ),

                    'param_name' => 'hide_prev_next_buttons',

                    'description' => __( 'If "YES" prev/next control will be removed', 'zs' ),

                    'value' => array( __( 'Yes', 'zs' ) => 'yes' ),

                    'std' => 'no',

                    'save_always' => true,

                ),

                array(

                    'type' => 'checkbox',

                    'heading' => esc_html__( 'Slider loop', 'zs' ),

                    'param_name' => 'loop',

                    'description' => __( 'Enables loop mode.', 'zs' ),

                    'value' => array( __( 'Yes', 'zs' ) => 'yes' ),

                    'std' => 'no',

                    'save_always' => true,

                ),

                

            )

        ) );                             

                

        }





    



        // Element HTML

        public function vc_product_categories_slider_html( $atts ) {

             $extra_class = $carousel_classes = '';

            // Params extraction

            extract(

                shortcode_atts(

                    array(

                        'title' => '',

                        'number'     => '3',

                        'orderby'    => '',

                        'order'      => 'ASC',

                        'ids'        => '',

                        'slides_per_view'      => '3',

                        'hide_prev_next_buttons' => 'no',

                        'loop' => 'no',

                        'show_title' => 'yes'

                    ), 

                    $atts

                )

            );

             

             if ( isset( $ids ) ) {

                $ids = explode( ',', $ids );

                $ids = array_map( 'trim', $ids );

            } else {

                $ids = array();

            }



            $hide_prev_next_buttons = ( $hide_prev_next_buttons == 'yes') ? 'false' : 'true';

            $loop = ( $loop == 'yes') ? 'true' : 'false';

            $show_title = ( $show_title == 'yes') ? 'yes' : 'no';



            $args = array(

                'orderby' => $orderby,

                'order'      => $order,

                'include'    => $ids,

                'pad_counts' => true,

                'hide_empty' => false,

                'show_uncategorized' => false,

                'child_of'   => $parent

            );



            $product_categories = get_terms( 'product_cat', $args );



            if ( '' !== $parent ) {

                $product_categories = wp_list_filter( $product_categories, array( 'parent' => $parent ) );

            }

            if ( $number ) {

                $product_categories = array_slice( $product_categories, 0, $number );

            }



            $carousel_id = 'product_categories-' . rand( 100, 999 );



            ob_start();



            if ( $product_categories ) {

                    $carousel_classes .= ' categories-style-';

                    if ( ! empty( $title ) ) {

                        ?>

                        <div class="pcs-category-heading"><?php echo esc_attr( $title );?></div>

                         <?php

                        }



                    ?>  

                    <div id="<?php echo esc_attr( $carousel_id ); ?>" class="owl-carousel products woocommerce zs-carousel-container">

                            <?php foreach ( $product_categories as $category ): ?>

                                <?php

                                ?>

                               <div <?php wc_product_cat_class( $classes, $category ); ?>>

                                    <div class="pcs-wrap">

                                        <a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>">

                                        <div class="pcs-image-wrap">

                                            <div class="pcs-category-image">

                                                <?php

                                                    /**

                                                     * woocommerce_before_subcategory_title hook

                                                     *

                                                     * @hooked wc_category_thumb_double_size - 10

                                                     */

                                                    do_action( 'woocommerce_before_subcategory_title', $category );

                                                ?>

                                            </div>

                                        </div>

                                        <?php

                                        if ( $show_title == 'yes' ) {

                                            ?>

                                        <div class="pcs-title-wrap">

                                            <div class="pcs-category-title"><?php echo esc_html( $category->name ); ?></div>

                                        </div>

                                        <?php

                                        }

                                        ?>

                                        </a>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                    </div> <!-- end #<?php echo esc_html( $carousel_id ); ?> -->

                    <script rel="text/javascript">

                        jQuery(document).ready(function(){

                            jQuery('#<?php echo esc_attr( $carousel_id ); ?>').owlCarousel({

                                loop: <?php echo esc_attr($loop); ?>,

                                items : <?php echo esc_attr($slides_per_view); ?>,

                                nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                dots: false,

                                navText: [" <i class='fa fa-angle-left' aria-hidden='true'></i>", "<i class='fa fa-angle-right' aria-hidden='true'></i>"],

                                navClass: ['owl-prev', 'owl-next'],

                                responsiveClass:true,

                                responsive:{

                                    0:{

                                        items:3,

                                        nav:true

                                    },

                                    480:{

                                        items:4,

                                        nav:true

                                    },

                                    600:{

                                        items:5,

                                        nav:true

                                    },

                                    768:{

                                        items:5,

                                        nav:true

                                    },

                                    992:{

                                        items:7,

                                        nav:true

                                    },

                                    1230:{

                                        loop: <?php echo esc_attr($loop); ?>,

                                        items : <?php echo esc_attr($slides_per_view); ?>,

                                        nav: <?php echo esc_attr($hide_prev_next_buttons); ?>,

                                    }

                                }

                            });



                            });

                        </script>

                    <?php

                }



                return ob_get_clean();

            }





             

} // End Element Class

 

// Element Class Init

new vcProductCategoriesSlider();  

?>