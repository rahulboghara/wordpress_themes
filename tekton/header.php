<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tekton
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tekton' ); ?></a>

		<header id="masthead" class="site-header">
			
			<div class="top-nav">
				<div class="container">
					<div class="row">
						<div class="top-content col-md-8 col-sm-8 col-xs-12">
							<button class="top-menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'top-menu',
								'menu_id'        => 'top-menu',
							) );
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="header-content">
				<div class="container">
					<div class="row">
						<div class="site-branding col-md-3 col-sm-3 col-xs-12">
							<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							if ( has_custom_logo() ) {
								?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php
									echo '<img src="'. esc_url( $logo[0] ) .'">';?></a>
									<?php

								} 
								else 
								{
									?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/logo.jpg' .'">'; ?>

									</a>
									<?php
								}
								?>
							</div>
							<div class="header-top-services col-md-9 col-sm-9 col-xs-12">
								<div class="row">
								<?php dynamic_sidebar( 'top-header-widget' ); ?>
							</div>
							</div>
						</div>
					</div>
				</div>

				<div class="header-bottom">
					<div class="container">
							<div class="col-xs-12 header-bottom-content">
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
					</div>
				</div>

			</header><!-- #masthead -->

			<?php if ( is_home() || is_single()) { ?>    
				<div class="breadcrumb">	
					<div class="container">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</div>
				</div>
				<?php 
			}
			?>
			<div id="content" class="site-content">
