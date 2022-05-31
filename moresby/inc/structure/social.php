<?php
if ( ! function_exists( 'zs_social_icons' ) ) {
	/**
	 * Displays social icons at the 
	 */
	function zs_social_icons() {
		$allowed_protocols  = wp_parse_args( array( 'whatsapp' ), wp_allowed_protocols() );
		$social_networks 		= apply_filters( 'zs_set_social_networks', redux_apply_social_networks() );
		$social_links_output 	= '';
		$social_link_html		= apply_filters( 'zs_social_link_html', '<a class="%1$s" target="_blank" href="%2$s"></a>' );

		foreach ( $social_networks as $social_network ) {
			if ( isset( $social_network[ 'link' ] ) && !empty( $social_network[ 'link' ] ) ) {
				$social_links_output .= sprintf( '<li>' . $social_link_html . '</li>', $social_network[ 'icon' ], $social_network[ 'link' ] );
			}
		}
			ob_start();
			?>
			<div class="zs-social-icons">
				<ul id="social-menu">
					<?php echo wp_kses( $social_links_output, 'post', $allowed_protocols ); ?>
				</ul>
			</div>
			<?php
			echo apply_filters( 'zs_social_links_html', ob_get_clean() );

	}
}