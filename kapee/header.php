<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kapee
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
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kapee' ); ?></a>
		<header id="masthead" class="site-header">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 header-top-left">
							<div class="our-store">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'our-store',
									'menu_id'        => 'our-store',
								) );
								?>
							</div>
						</div>
						<div class="col-xs-8 header-top-right">
							<div class="top-link">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'top-link',
									'menu_id'        => 'top-link',
								) );
								?>
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
/*								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$kapee_description = get_bloginfo( 'description', 'display' );
							if ( $kapee_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $kapee_description;?></p>
							<?php endif;*/ ?>
						</div>
					</div>
					<div class="col-xs-6 header-middle-center">
						<div class="search-box">
							<?php dynamic_sidebar( 'header-area-widget' ); ?>
						</div>
					</div>
					<div class="col-xs-3 header-middle-right">
						<div class="kp-shopping-cart">
							<?php global $woocommerce; ?>
							<?php ob_start();?>						
							<div id="shopping_cart" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'kapee'); ?>">
								<span class="kp-cart-icon">
									<div class="kp-cart-title"><?php esc_html_e( 'Cart', 'kapee' ); ?></div>
									<div class="kp-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
									<div class="kp-cart-items"><?php esc_html_e( 'items', 'kapee' ); ?></div>
								</span>
							</div>	
							<div id="shopping_cart_res" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'kapee'); ?>">
								<span class="kp-cart-icon">
									<div class="kp-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
								</span>
							</div>	
							<?php dynamic_sidebar( 'header-cart-area-widget' ); ?>
						</div>
						<div class="kp-wishlist">
							<a href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>" rel="wishlist">
							<i class="fa fa-heart-o" aria-hidden="true"></i>
							<?php
							if ( is_user_logged_in() ) {
								?>
							<div class="kp-wishlist-count"><?php echo YITH_WCWL()->count_products(); ?></div>
							<?php
							} else {
								?>
								<div class="kp-wishlist-count"><?php esc_html_e('0', 'kapee'); ?></div>
								<?php
							}
							?>
							</a>
						</div>
						<div class="kp-login">
							<?php
							if ( is_user_logged_in() ) {
								?>
								<a class="kp-login-link" href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home">
									<small>Hello,</small>
									<span><?php esc_html_e('My Account', 'kapee'); ?></span>
								</a>

								<div class="kp-login-dropdown">
									<ul class="kp-login-sub-menu">
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
								<a class="kp-login-link" href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home">
									<small>Hello,</small>
									<span><?php esc_html_e('Login / Register', 'kapee'); ?></span>
								</a>
								<?php
							}
							?>
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
						<div class="kp-category-menu">
							<div class="category-toggle"><span class="category-title"><?php esc_html_e( 'Shop By Department', 'kapee' ); ?></span><i class="fa fa-bars" aria-hidden="true"></i></div>

							<div class="category-toggle-res"><i class="fa fa-bars" aria-hidden="true"></i><span class="category-title"><?php esc_html_e( 'Categories ', 'kapee' ); ?></span></div>
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
					<div class="col-xs-9 header-bottom-right">
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
		</div><!-- .site-branding -->
	</div>
</header><!-- #masthead -->
	<?php 
	if ( ! is_front_page() ){
		?>
	<header class="woocommerce-products-header">
		<div class="container">
	<?php 
		if (is_shop() || is_product_category()){
		?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php
		}else{
		 the_title( '<h1 class="woocommerce-products-header__title page-title">', '</h1>' );
		}
	do_action( 'woocommerce_before_main_content_breadcrumb' );
	?>
</div>
</header>
<?php
	}
?>

<div id="content" class="site-content">


