<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moresby
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'moresby' ); ?></a>


		<header id="masthead" class="site-header">
			<div class="header-top">
				<div class="header-content">
					<div class="col-xs-3 header-top-left">
						<div class="row">
							<div class="site-branding">
								<?php
								global $zs_options; 
								if($zs_options['site_header_logo']['url']!='') { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<img src="<?php echo $zs_options['site_header_logo']['url']; ?>">
									</a>
									<?php 
								} else { 
									?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/logo.png' .'">'; ?></a>
									<?php }
									?>
								</div>
							</div>
						</div>
						<div class="col-xs-6 header-top-center">
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
						<div class="col-xs-3 header-top-right">
							<div class="row">
								<nav id="contact-manu">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'contact-menu',
										'menu_id'        => 'contact-menu',
									) );
									?>
								</nav><!-- #site-navigation -->
							</div>
						</div>
					</div><!-- .site-branding -->


				</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
