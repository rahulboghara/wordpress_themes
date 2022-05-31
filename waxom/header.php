<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package waxom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">


	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'waxom' ); ?></a>


		<header id="masthead" class="site-header">
			
			<div class="header-top">
				<div class="container">

					<div class="row">
						<div class="header-content">
						<div class="col-xs-4 header-top-left">
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
								}
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$waxom_description = get_bloginfo( 'description', 'display' );
							if ( $waxom_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $waxom_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>
					</div>
					</div>
					<div class="col-xs-8 header-top-right">
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
					  <div class="search-box">
					    <span class="search-toggle"><?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/search.png' .'">'; ?></span>
					  </div>
					</div>
				</div>
				</div>
			</div>
			</div><!-- .site-branding -->


		</div>
	</header><!-- #masthead -->
	 <div id="search-overlay" class="overlay">
    <div class="search_form">
      	<span class="search_close" href="#"><i class="fa fa-times"></i></span>
      <div class="search_content">
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
	<div id="content" class="site-content">
