<?php
/**
 * Filter functions for Custom Code Section of Theme Options
 */

if ( ! function_exists( 'redux_apply_custom_css' ) ) {
	function redux_apply_custom_css() {
		global $zs_options;

		if( isset( $zs_options['custom_css'] ) && trim( $zs_options['custom_css'] ) != '' ) {
			?>
			<style type="text/css">
			<?php echo ( $zs_options['custom_css'] ); ?>
			</style>
			<?php
		}
	}
}