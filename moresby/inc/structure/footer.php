<?php
/**
 * Template functions used in footer
 */

if ( ! function_exists( 'zs_footer_widgets' ) ) {
	/**
	 * Displays Footer Widgets
	 */
	function zs_footer_widgets() {
		if( apply_filters( 'zs_footer_widgets', true  ) ) {
			?>
			<div class="footer-widgets">
				<div class="container">
					<div class="row">
					<?php
						if ( is_active_sidebar( 'footer-widgets' ) ) {

							dynamic_sidebar( 'footer-widgets' );

						} else {

							$footer_widget_args = apply_filters( 'zs_footer_widget_args', array(
								'before_widget' => '<div class="col-lg-4 col-md-4 col-xs-12"><aside class="widget clearfix"><div class="body">',
								'after_widget'  => '</div></aside></div>',
								'before_title'  => '<h4 class="widget-title">',
								'after_title'   => '</h4>',
								'widget_id'     => '',
							) );

							do_action( 'zs_default_footer_widgets', $footer_widget_args );
						}
					?>
					</div>
				</div>
			</div>
			<?php
		}
	}
}


if ( ! function_exists( 'zs_display_footer_bottom_widgets' ) ) {
	/**
	 * Displays footer bottome widgets
	 */
	function zs_display_footer_bottom_widgets() {
		if ( apply_filters( 'zs_show_footer_bottom_widgets', true ) ) {
			if ( is_active_sidebar( 'footer-bottom-widgets' ) ) {
				dynamic_sidebar( 'footer-bottom-widgets' );
			} else {
				if ( apply_filters( 'zs_show_default_footer_bottom_widgets', true ) ) {
					$footer_bottom_widget_args = apply_filters( 'zs_footer_bottom_widget_args', array(
						'before_widget' => '<div class="columns"><aside class="widget clearfix"><div class="body">',
						'after_widget'  => '</div></aside></div>',
						'before_title'  => '<h4 class="widget-title">',
						'after_title'   => '</h4>',
						'widget_id'     => '',
					) );
					do_action( 'zs_default_footer_bottom_widgets', $footer_bottom_widget_args );
				}
			}
		}
	}
}



if ( ! function_exists( 'zs_copyright_bar' ) ) {
	/**
	 * Displays the copyright bar
	 */
	function zs_copyright_bar() {

		$website_title_with_url 	= sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ) );
		$footer_copyright_text 		= apply_filters( 'zs_footer_copyright_text', sprintf( __( '&copy; %s - All Rights Reserved', 'zs' ), $website_title_with_url ) );
		$credit_card_icons 			= apply_filters( 'zs_footer_credit_card_icons', '' );

		if ( apply_filters( 'zs_enable_footer_credit_block', true ) ) : ?>

		<div class="copyright-bar">
			<div class="container">
				<div class="pull-left flip copyright"><?php echo wp_kses_post( $footer_copyright_text ); ?></div>
			</div>
		</div><?php

		endif;
	}
}

