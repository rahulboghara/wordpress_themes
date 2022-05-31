<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mytheme
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

<body id="contact-page" <?php body_class(); ?>>
	
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mytheme' ); ?></a>


		<header id="masthead" class="site-header">
			<div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
			<div class="header-top col-xs-12">
				<div class="container">

					<div class="row">
						<div class="col-xs-4">
							<div class="site-branding">
								<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {
								        echo '<img src="'. esc_url( $logo[0] ) .'">';
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
							$mytheme_description = get_bloginfo( 'description', 'display' );
							if ( $mytheme_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $mytheme_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-xs-8">
						<?php get_search_form(); ?>
						<div class="social-menu">
							<button class="social-toggle"><span>Follow Us</span></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'social-menu',
								'menu_id'        => 'social-menu-items',
							) );
							?>
						</div>
					</div>
				</div>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<div class="container">

					<div class="row">
						<button class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'contact-menu',
							'menu_id'        => 'contact-menu',
						) );
						?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
		<div class="container">
			<div class="row">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
		</div>
	</div>
	<div id="content" class="site-content">
