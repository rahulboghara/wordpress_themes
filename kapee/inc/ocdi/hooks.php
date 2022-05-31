<?php

add_filter( 'pt-ocdi/import_files', 'kp_ocdi_import_files' );

add_action( 'pt-ocdi/after_import', 'kp_ocdi_after_import_setup' );

add_action( 'pt-ocdi/before_widgets_import', 'kp_ocdi_before_widgets_import' );


global $wpdb;
$zz = $wpdb->query( $wpdb->prepare( "UPDATE wp_woocommerce_attribute_taxonomies  SET attribute_type = 'colorpicker'  WHERE attribute_id = '1'" ));
$zz = $wpdb->query( $wpdb->prepare( "UPDATE wp_woocommerce_attribute_taxonomies  SET attribute_type = 'label'  WHERE attribute_id = '2'" ));