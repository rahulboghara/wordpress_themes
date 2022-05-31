<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package studios
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arvo:400,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'studios' ); ?></a>

		<div class="top-nav">
		<div class="container">
				<div class="row">
					<div class="col-xs-10 top-content-left">
						<div class="row">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-navigation',
								'menu_id'        => 'menu-navigation',
							) );
							?>
						</nav><!-- #site-navigation -->
					</div>
					</div>
					<div class="col-xs-2 top-content-right">
						<div class="row">
							<nav id="social-manu">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'social-menu',
									'menu_id'        => 'social-menu',
								) );
								?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<header id="masthead" class="site-header">
				<div class="container">
					<div class="row">
						<div class="header-content">
									<div class="site-branding">
										<?php
										$custom_logo_id = get_theme_mod( 'custom_logo' );
										$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
										if ( has_custom_logo() ) {
											?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
												<?php
												echo '<img src="'. esc_url( $logo[0] ) .'">';?></a>
												<?php

											} else {
												?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/logo.png' .'">'; ?></a>
													<?php
												}
												?>
											</div>
										</div>
									</div>
						</div><!-- .site-branding -->

				</header><!-- #masthead -->

				<div id="content" class="site-content">
