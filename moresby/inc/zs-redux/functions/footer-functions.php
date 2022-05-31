<?php
/**
 * Filter functions for Footer Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_footer_widgets_columns' ) ) {
	function redux_apply_footer_widgets_columns( $columns ) {
		global $zs_options;

		if ( !isset( $zs_options['footer_widgets_columns'] ) || empty( $zs_options['footer_widgets_columns'] ) || ! is_numeric( $zs_options['footer_widgets_columns'] ) ) {
			$zs_options['footer_widgets_columns'] = 5;
		}

		return absint( $zs_options['footer_widgets_columns'] );
	}
}

add_filter( 'zs_footer_widgets_columns','redux_apply_footer_widgets_columns', 10 );


if ( ! function_exists( 'redux_apply_footer_copyright_text' ) ) {
	function redux_apply_footer_copyright_text( $text ) {
		global $zs_options;

		if( isset( $zs_options['footer_credit'] ) ) {
			$text = $zs_options['footer_credit'];
		}

		return $text;
	}
}


if ( ! function_exists( 'redux_apply_social_networks' ) ) {
	function redux_apply_social_networks( $social_icons ) {
		global $zs_options;

		$social_icons = array(
			'facebook' 		=> array(
				'label'		=> esc_html__( 'Facebook', 'zs' ),
				'icon'		=> 'fa fa-facebook',
				'icon_hh'	=> 'fa fa-facebook',
				'id'		=> 'facebook_link',
			),
			'twitter' 		=> array(
				'label'		=> esc_html__( 'Twitter', 'zs' ),
				'icon'		=> 'fa fa-twitter',
				'icon_hh'	=> 'fa fa-twitter-square',
				'id'		=> 'twitter_link',
			),
			'whatsapp-mobile' 	=> array(
				'label'		=> esc_html__( 'Whatsapp Mobile', 'zs' ),
				'icon'		=> 'fa fa-whatsapp mobile',
				'id'		=> 'whatsapp_mobile_link',
			),
			'whatsapp-desktop' 	=> array(
				'label'		=> esc_html__( 'Whatsapp Desktop', 'zs' ),
				'icon'		=> 'fa fa-whatsapp desktop',
				'id'		=> 'whatsapp_desktop_link',
			),
			'pinterest' 	=> array(
				'label'		=> esc_html__( 'Pinterest', 'zs' ),
				'icon'		=> 'fa fa-pinterest',
				'id'		=> 'pinterest_link',
			),
			'linkedin' 		=> array(
				'label'		=> esc_html__( 'LinkedIn', 'zs' ),
				'icon'		=> 'fa fa-linkedin',
				'icon_hh'	=> 'fa fa-linkedin-square',
				'id'		=> 'linkedin_link',
			),
			'googleplus' 	=> array(
				'label'		=> esc_html__( 'Google+', 'zs' ),
				'icon'		=> 'fa fa-google-plus',
				'icon_hh'	=> 'fa fa-google-plus-square',
				'id'		=> 'googleplus_link',
			),
			'tumblr' 		=> array(
				'label'		=> esc_html__( 'Tumblr', 'zs' ),
				'icon'		=> 'fa fa-tumblr',
				'icon_hh'	=> 'fa fa-tumblr-square',
				'id'		=> 'tumblr_link'
			),
			'instagram' 	=> array(
				'label'		=> esc_html__( 'Instagram', 'zs' ),
				'icon'		=> 'fa fa-instagram',
				'id'		=> 'instagram_link'
			),
			'youtube'		=> array(
				'label'		=> esc_html__( 'Youtube', 'zs' ),
				'icon'		=> 'fa fa-youtube',
				'icon_hh'	=> 'fa fa-youtube',
				'id'		=> 'youtube_link'
			),
			'vimeo'			=> array(
				'label'		=> esc_html__( 'Vimeo', 'zs' ),
				'icon'		=> 'fa fa-vimeo-square',
				'id'		=> 'vimeo_link'
			),
			'dribbble' 		=> array(
				'label'		=> esc_html__( 'Dribbble', 'zs' ),
				'icon'		=> 'fa fa-dribbble',
				'id'		=> 'dribbble_link',
			),
			'stumbleupon' 	=> array(
				'label'		=> esc_html__( 'StumbleUpon', 'zs' ),
				'icon'		=> 'fa fa-stumbleupon',
				'icon_hh'	=> 'fa fa-stumbleupon-circle',
				'id'		=> 'stumble_upon_link'
			),
			'soundcloud'	=> array(
				'label'		=> esc_html__('Sound Cloud', 'zs'),
				'icon'		=> 'fa fa-soundcloud',
				'id'		=> 'soundcloud',
			),
			'vine'			=> array(
				'label'		=> esc_html__('Vine', 'zs'),
				'icon'		=> 'fa fa-vine',
				'id'		=> 'vine',
			),
			'vk'			=> array(
				'label'		=> esc_html__('VKontakte', 'zs'),
				'icon'		=> 'fa fa-vk',
				'id'		=> 'vk',
			),
			'telegram'      => array(
				'label' 	=> esc_html__('Telegram', 'zs'),
				'id'    	=> 'telegram_link',
				'icon'  	=> 'fa fa-telegram',
			),
			'rss'			=> array(
				'label'		=> __( 'RSS', 'zs' ),
				'icon'		=> 'fa fa-rss',
				'id'		=> 'rss_link',
			)
		);

		foreach( $social_icons as $key => $social_icon ) {
			if( ! empty( $zs_options[$key] ) ) {
				$social_icons[$key]['link'] = $zs_options[$key];
			}
		}

		if( isset( $zs_options['show_footer_rss_icon'] ) && $zs_options['show_footer_rss_icon'] ) {
			$social_icons['rss']['link'] = get_bloginfo( 'rss2_url' );
		}

		return $social_icons;
	}
}

add_filter( 'zs_footer_copyright_text', 'redux_apply_footer_copyright_text', 10 );

if ( ! function_exists( 'redux_apply_footer_copyright_text' ) ) {
	function redux_apply_footer_copyright_text( $text ) {
		global $zs_options;

		if( isset( $zs_options['footer_credit'] ) ) {
			$text = $zs_options['footer_credit'];
		}

		return $text;
	}
}


if ( ! function_exists( 'redux_toggle_footer_credit_block' ) ) {
	function redux_toggle_footer_credit_block( $enable ) {
		global $zs_options;

		$zs_options['footer_credit_block_enable'] = isset( $zs_options['footer_credit_block_enable'] ) ? $zs_options['footer_credit_block_enable'] : true;

		if( $zs_options['footer_credit_block_enable'] ) {
			$enable = true;
		} else {
			$enable = false;
		}

		return $enable;
	}
}


add_filter( 'zs_footer_copyright','redux_toggle_footer_credit_block', 10 );



