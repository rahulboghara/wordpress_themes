<?php

//Filters For autocomplete param:
//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_vc_product_categories_slider_ids_callback', 'zs_productCategoryCategoryAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_vc_product_categories_slider_ids_render', 'zs_productCategoryCategoryRenderByIdExact', 10, 1 );



function zs_productCategoryCategoryAutocompleteSuggester( $query, $slug = false ) {
		global $wpdb;
		$cat_id = (int) $query;
		$query = trim( $query );
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.term_id AS id, b.name as name, b.slug AS slug
						FROM {$wpdb->term_taxonomy} AS a
						INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
						WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )", $cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$result = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $slug ? $value['slug'] : $value['id'];
				$data['label'] = __( 'Id', 'zs' ) . ': ' . $value['id'] . ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . __( 'Name', 'zs' ) . ': ' . $value['name'] : '' ) . ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . __( 'Slug', 'zs' ) . ': ' . $value['slug'] : '' );
				$result[] = $data;
			}
		}

		return $result;
}
function zs_productCategoryCategoryRenderByIdExact( $query ) {
	global $wpdb;
	$query = $query['value'];
	$cat_id = (int) $query;
	$term = get_term( $cat_id, 'product_cat' );

	return zs_productCategoryTermOutput( $term );
}


function zs_productCategoryTermOutput( $term ) {
	global $wpdb;
		$term_slug = $term->slug;
		$term_title = $term->name;
		$term_id = $term->term_id;

		$term_slug_display = '';
		if ( ! empty( $term_slug ) ) {
			$term_slug_display = ' - ' . __( 'Sku', 'zs' ) . ': ' . $term_slug;
		}

		$term_title_display = '';
		if ( ! empty( $term_title ) ) {
			$term_title_display = ' - ' . __( 'Title', 'zs' ) . ': ' . $term_title;
		}

		$term_id_display = __( 'Id', 'zs' ) . ': ' . $term_id;

		$data = array();
		$data['value'] = $term_id;
		$data['label'] = $term_id_display . $term_title_display . $term_slug_display;

		return ! empty( $data ) ? $data : false;
}




?>