<?php
/*
Plugin Name: ZS Vc Elements
Plugin URI: https://www.zitronesolutions.com/
Description: ZS VC elements is the core plugin that provides the different filters liker category , sub category filters etc for the woocommerce stores to make the development easy and perfect for the developers having the basic knowledge of woocommerce
.
Version: 1.0
Author: Zitrone Solutions
Author URI: https://www.zitronesolutions.com/
License: GPLv2

*/

// If this file is called directly, abort

if ( ! defined( 'ABSPATH' ) ) {
     die ('Silly human what are you doing here');
}


// Before VC Init

add_action( 'vc_before_init', 'vc_before_init_actions' );

function vc_before_init_actions() {

	include(plugin_dir_path( __FILE__ ) .'/product-categories-slider/product_categories_slider.php');
	include(plugin_dir_path( __FILE__ ) .'/product-category/product_category.php');

}

include(plugin_dir_path( __FILE__ ) .'/product-categories-slider/product_categories_function.php');
include(plugin_dir_path( __FILE__ ) .'/product-category/product_category_function.php');

add_action( 'wp_enqueue_scripts', 'vc_scripts',99 );



function vc_scripts() {

	wp_enqueue_script('zs-vc-owl-carousel', plugins_url( '', __FILE__ ) . '/public/owl.carousel.min.js', array(), '', true);
	wp_enqueue_script('zs-vc-custom', plugins_url( '', __FILE__ ) . '/public/js/custom.js', array(), '', true);
	wp_enqueue_script('zs-vc-slick', plugins_url( '', __FILE__ ) . '/public/js/slick.js', array(), '', true);


	wp_enqueue_style('zs-vc-owl-carousel', plugins_url( '', __FILE__ ) . '/public/owl.carousel.min.css', array(), '', 'all');
	wp_enqueue_style('zs-vc-custom', plugins_url( '', __FILE__ ) . '/public/css/custom.css', array(), '', 'all');
	wp_enqueue_style('zs-vc-slick', plugins_url( '', __FILE__ ) . '/public/css/slick.css', array(), '', 'all');

}