<?php
/**
 * Redux Framworks hooks
 *
 * @package zs/ReduxFramework
 */
add_action( 'init', 									 'redux_remove_demo_mode' );
add_action( 'redux/page/zs_options/enqueue', 		     'redux_queue_font_awesome' );

//General Filters
add_filter( 'zs_enable_scrollup',						 'redux_toggle_scrollup',						10 );
add_filter( 'zs_register_image_sizes',					 'redux_toggle_register_image_size',			10 );
add_filter( 'zs_load_child_theme',                 		 'redux_toggle_zs_child_style',                 10 );
add_filter( 'zs_home_sidebar_margin_top',         		 'redux_apply_home_sidebar_margin_top',         10 );



// Shop Filters

add_filter( 'zs_shop_views_args',                  		'redux_set_shop_view_args',                     10 );
add_filter( 'zs_shop_layout',							'redux_apply_shop_layout',						10 );
add_filter( 'zs_shop_loop_products_columns',			'redux_apply_shop_loop_products_columns',		10 );
add_filter( 'loop_shop_per_page',					'redux_apply_shop_loop_per_page',				10 );
add_filter( 'zs_single_product_layout',					'redux_apply_single_product_layout',			10 );
add_filter( 'zs_single_product_layout_style',			'redux_apply_single_product_layout_style',		10 );
add_filter( 'zs_enable_related_products',         		'redux_toggle_related_products_output',         10 );
add_filter( 'zs_product_comparison_page_id',			'redux_apply_product_comparison_page_id',		10 );

add_action( 'woocommerce_before_shop_loop',              'zs_shop_view_switcher' , 30);

// Header Filters
add_filter( 'zs_navbar_search_placeholder',        'redux_apply_navbar_search_placeholder',        10 );
add_filter( 'zs_enable_search_categories_filter',  'redux_toggle_header_search_dropdown',          10 );
add_filter( 'zs_search_categories_filter_args',    'redux_modify_search_dropdown_categories_args', 10 );
add_filter( 'zs_navbar_search_dropdown_text',      'redux_apply_navbar_search_dropdown_text',      10 );
add_filter( 'zs_enable_sticky_header',				'redux_toggle_sticky_header',					10 );
add_filter( 'zs_enable_live_search',				'redux_toggle_live_search',                     10 );


// Blog Filters
add_filter( 'zs_blog_style',						'redux_apply_blog_page_view',					10 );
add_filter( 'zs_blog_layout',						'redux_apply_blog_page_layout',					10 );
add_filter( 'zs_single_post_layout',				'redux_apply_single_post_layout',				10 );
add_filter( 'zs_loop_post_placeholder_img',		'redux_toggle_post_placeholder_img',			10 );


// Style Filters
add_filter( 'zs_use_predefined_colors',			         'redux_toggle_use_predefined_colors',			 10 );
add_action( 'zs_primary_color',					         'redux_apply_primary_color', 					 10 );
add_action( 'wp_head',									 'redux_apply_custom_color_css',                 100);
add_action( 'wp_enqueue_scripts',                        'redux_load_external_custom_css',               20 );
add_filter( 'zs_should_add_custom_css_page',             'redux_toggle_custom_css_page',                 10 );

// Typography Filters
add_filter( 'zs_load_default_fonts',					 'redux_has_google_fonts',						10 );
add_action( 'wp_head',									 'redux_apply_custom_fonts',					100 );

// Custom Code Filters
add_action( 'wp_head',									 'redux_apply_custom_css', 						200 );