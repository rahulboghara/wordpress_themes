<?php

//Filters For autocomplete param:
//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_vc_product_category_category_callback', 'zs_productCategoryAutocompleteSuggesterBySlug', 10, 1 ); 
add_filter( 'vc_autocomplete_vc_product_category_category_render', 'zs_productCategoryRenderByIdExact', 10, 1 );


function zs_productCategoryAutocompleteSuggester( $query, $slug = false ) {
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
				$data['label'] = __( 'Id', 'js_composer' ) . ': ' . $value['id'] . ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . __( 'Name', 'js_composer' ) . ': ' . $value['name'] : '' ) . ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . __( 'Slug', 'js_composer' ) . ': ' . $value['slug'] : '' );
				$result[] = $data;
			}
		}

		return $result;
}

function zs_productCategoryAutocompleteSuggesterBySlug( $query ) {
	global $wpdb;
		$result = $this->zs_productCategoryAutocompleteSuggester( $query, true );

		return $result;
	}


function zs_productCategoryRenderByIdExact( $query ) {
	global $wpdb;
	$query = $query['value'];
	$query = trim( $query );
	$term = get_term_by( 'slug', $query, 'product_cat' );

	return $this->zs_productCategoryTermOP( $term );
}


function zs_productCategoryTermOP( $term ) {
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