
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search this website', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
	<input class="search-form-submit" type="submit" value="GO">
</form>