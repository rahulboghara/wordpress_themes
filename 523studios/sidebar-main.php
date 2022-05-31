<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studios
 */

if ( ! is_active_sidebar( 'main-sidebar-widget' ) ) {
    return;
}
?>

<?php dynamic_sidebar( 'main-sidebar-widget' ); ?>
