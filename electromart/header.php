<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package electromart
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Start: Loading spinner -->
	<div id="page-overlay" ><span class="loading_img"></span></div>
	<!-- End: Loading spinner -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'electromart' ); ?></a>
		<header id="masthead" class="site-header">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 header-top-left">
							<div class="row">
								<div class="offer-link">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'offer-link',
										'menu_id'        => 'offer-link',
									) );
									?>
								</div>
							</div>
						</div>
						<div class="col-xs-8 header-top-right">
							<div class="row">

								<div class="top-link">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'top-link',
										'menu_id'        => 'top-link',
									) );
									?>
								</div>
								<div class="social-menu">
									<button class="menu-toggle"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>
									<?php zs_social_icons(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="header-middle-content">
							<div class="col-xs-3 header-middle-left">
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
/*								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$electromart_description = get_bloginfo( 'description', 'display' );
							if ( $electromart_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $electromart_description;?></p>
							<?php endif;*/ ?>
						</div>
					</div>
				</div>
				<div class="col-xs-9 header-middle-right">
					<div class="row">
						<div class="search-box">
							<?php dynamic_sidebar( 'header-area-widget' ); ?>
						</div>

						<div class="em-shopping-cart">
							<?php global $woocommerce; ?>
							<?php ob_start();?>						
							<div id="shopping_cart" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'electromart'); ?>">
								<span class="em-cart-icon">
									<div class="em-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
								</span>
								<div class="header-cart-total"><?php echo WC()->cart->get_cart_total(); ?></div>
							</div>	
							<div id="shopping_cart_res" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'electromart'); ?>">
								<span class="em-cart-icon">
									<div class="em-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
								</span>
							</div>	

							<?php dynamic_sidebar( 'header-cart-area-widget' ); ?>
						</div>
						<div class="em-compare yith-compare">
							<?php dynamic_sidebar( 'header-compare-area-widget' ); ?>
						</div>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'header-link',
							'menu_id'        => 'header-link',
						) );


						?>	
						<div class="em-login">
							<?php
							if ( is_user_logged_in() ) {
								?>
								<a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home"><?php esc_html_e('My Account', 'electromart'); ?></a>
								<div class="em-login-dropdown">
									<ul class="em-login-sub-menu">
										<li><a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home"><span>Dashboard</span></a></li>
										<li><a href="<?php echo esc_url( home_url( '/my-account/orders' ) ); ?>" rel="home"><span>Orders</span></a></li>
										<li><a href="<?php echo esc_url( home_url( '/my-account/downloads' ) ); ?>" rel="home"><span>Downloads</span></a></li>
										<li><a href="<?php echo esc_url( home_url( '/my-account/edit-address' ) ); ?>" rel="home"><span>Addresses</span></a></li>
										<li><a href="<?php echo esc_url( home_url( '/my-account/edit-account' ) ); ?>" rel="home"><span>Account details</span></a></li>
										<li><a href="<?php echo wp_logout_url( home_url( '/my-account/customer-logout' ) ); ?>" rel="home"><span>Logout</span></a></li>
									</ul>
								</div>
								<?php
							} else {
								?>
								<a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home"><?php esc_html_e('Login / Register', 'electromart'); ?></a>
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
<div class="header-bottom">
	<div class="container">
		<div class="row">
			<div class="header-bottom-content">
				<div class="col-xs-3 header-bottom-left">
					<div class="row">
						<div class="em-category-menu">
							<div class="category-toggle"><i class="fa fa-bars" aria-hidden="true"></i><span class="category-title"><?php esc_html_e( ' Browse Categories ', 'electromart' ); ?></span><i class="fa fa-angle-down" aria-hidden="true"></i></div>

							<div class="category-toggle-res"><i class="fa fa-bars" aria-hidden="true"></i><span class="category-title"><?php esc_html_e( 'Categories ', 'electromart' ); ?></span></div>
							<div class="category-content">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'category-menu',
								'menu_id'        => 'category-menu',
							) );
							?>
						</div>
						</div>
					</div>
				</div>
				<div class="col-xs-9 header-bottom-right">
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
		<?php
		if ( is_home() && ! is_front_page() ){
					?>
					<div class="container">
					<div class="row">
					<?php
				}
