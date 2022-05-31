<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pms
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Start: Loading spinner -->
	<div id="page-overlay" ><span class="loading_img"></span></div>
	<!-- End: Loading spinner -->
	<div id="page" class="site">
		<?php
		if ( is_user_logged_in() ) {
			?>
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pms' ); ?></a>



			<header id="masthead" class="site-header">
				<div class="header-top">
					<div class="header-content">
						<div class="container">
							<div class="row">
								<div class="col-xs-8 header-top-left">
									<div class="row">
										<div class="site-branding">
											<?php
											$custom_logo_id = get_theme_mod( 'custom_logo' );
											$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
											if ( has_custom_logo() ) {
												?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<?php
													echo '<img src="'. esc_url( $logo[0] ) .'">';?>

												</a>
												<?php

											} else {
												?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/logo.png' .'">'; ?>

												</a>
												<?php
											}
											?>
										</div>
									</div>
								</div>
								<div class="col-xs-4 header-top-right">
									<div class="row">
										<div class="pms-login">
											<?php
											if ( is_user_logged_in() ) {
												?>
												<a href="<?php echo wp_logout_url( home_url() ); ?>" alt="<?php esc_attr_e( 'Logout', 'pms' ); ?>"><button class="button"><?php _e( 'Logout', 'pms' ); ?></button>
												</a>
												<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- .site-branding -->
				</div>
			</header><!-- #masthead -->
			<?php
		}
		?>
		<div id="content" class="site-content">
