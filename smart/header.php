<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package smart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Start: Loading spinner -->
	<div id="page-overlay" ><span class="loading_img"></span></div>
	<!-- End: Loading spinner -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'smart' ); ?></a>


		<header id="masthead" class="site-header">
			
			<div class="header-top">
				<div class="container">

					<div class="row">
						<div class="header-content">
						<div class="col-sm-4 header-top-left">
							<div class="row">
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
								} ?> 
						</div>
					</div>
					</div>
					<div class="col-sm-8 header-top-right">
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
			</div><!-- .site-branding -->


		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
