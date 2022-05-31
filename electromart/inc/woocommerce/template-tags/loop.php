<?php
/**
 * Template Tags used in product loop
 */

if ( ! function_exists( 'zs_template_loop_header_open' ) ) {
    function zs_template_loop_header_open() {
        ?><div class="product-loop-header"><?php
    }
}

if ( ! function_exists( 'zs_template_loop_body_open' ) ) {
    function zs_template_loop_body_open() {
        ?><div class="product-loop-body"><?php
    }
}

if ( ! function_exists( 'zs_template_loop_footer_open' ) ) {
    function zs_template_loop_footer_open() {
        ?><div class="product-loop-footer"><?php
    }
}

if ( ! function_exists( 'zs_template_loop_header_close' ) ) {
    function zs_template_loop_header_close() {
        ?></div><!-- /.product-loop-header --><?php
    }
}

if ( ! function_exists( 'zs_template_loop_body_close' ) ) {
    function zs_template_loop_body_close() {
        ?></div><!-- /.product-loop-body --><?php
    }
}

if ( ! function_exists( 'zs_template_loop_footer_close' ) ) {
    function zs_template_loop_footer_close() {
        ?></div><!-- /.product-loop-footer --><?php
    }
}

if ( ! function_exists( 'zs_wrap_flex_div_open' ) ) {
    function zs_wrap_flex_div_open() {
        ?><div class="flex-div"><?php
    }
}

if ( ! function_exists( 'zs_wrap_flex_div_close' ) ) {
    function zs_wrap_flex_div_close() {
        ?></div><!-- /.flex-div --><?php
    }
}