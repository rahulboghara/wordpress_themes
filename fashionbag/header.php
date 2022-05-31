<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fashionbag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="fb-login_regi-form">
		<div class="fb-login-form">
			<form id="login" class="ajax-auth" action="login" method="post">
				<div class="fb-login-wap">
					<div class="fb-login-left">
						<div class="fb-login-left-desc">
							<h1>Login</h1>
							<p>Get access to your Orders, Wishlist and Recommendations.</p>
							<h6>New to site? <a id="pop_signup" href="">Create User Account</a></h6>
							<h6>New to site? <a href="<?php echo esc_url( home_url( '/my-account' ) ); ?>">Create Vendor Account</a></h6>
						</div>
					</div>
					<div class="fb-login-right">
						<div class="fb-login-right-inner">
						<p class="status"></p>  
						<?php wp_nonce_field('ajax-login-nonce', 'security'); ?> 
						<input id="username" type="text" class="required" name="username" placeholder="Enter Username">
						<input id="password" type="password" class="required" name="password" placeholder="Enter Password">
						<a class="text-link" id="pop_forgot" href="">Lost password?</a>
						<input class="submit_button" type="submit" value="LOGIN">
						<a class="close" href="">X</a>  
					</div>
					</div>  
				</div>
			</form>
		</div>
		<div class="fb-register-form">
			<form id="register" class="ajax-auth"  action="register" method="post">
				<div class="fb-login-wap">
					<div class="fb-login-left">
						<div class="fb-login-left-desc">
							<h1>Signup</h1>
							<p>Get access to your Orders, Wishlist and Recommendations.</p>
							<h6>Already have an account? <a id="pop_login"  href="">Login</a></h6>
						</div>
					</div>
					<div class="fb-login-right">
						<div class="fb-login-right-inner">
						<p class="status"></p>
						<?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
						<input id="signonname" type="text" name="signonname" class="required" placeholder="Enter Username">
						<input id="email" type="text" class="required email" name="email" placeholder="Enter Email Address">
						<input id="signonpassword" type="password" class="required" name="signonpassword" placeholder="Enter Password">
						<input type="password" id="password2" class="required" name="password2" placeholder="Enter Confirm Password">
						<input class="submit_button" type="submit" value="SIGNUP">
						<a class="close" href="">X</a> 
						</div>   
					</div>
				</div>
			</form>
		</div>
		<div class="fb-forgot-form">
			<form id="forgot_password" class="ajax-auth" action="forgot_password" method="post">
				<div class="fb-login-wap">
					<div class="fb-login-left">
						<div class="fb-login-left-desc">
							<h1>Forgot Password</h1>
							<p>Get access to your Orders, Wishlist and Recommendations.</p>
							<h6>Already have an account? <a id="pop_login"  href="">Login</a></h6>
						</div>
					</div>
					<div class="fb-login-right">
						<div class="fb-login-right-inner">
						<p class="status"></p> 
						<?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>  
					    <input id="user_login" type="text" class="required" name="user_login" placeholder="Username or E-mail">
					     <input class="submit_button" type="submit" value="SUBMIT"> 
						<a class="close" href="">X</a>  
					</div>
					</div>  
				</div>
			</form>
		</div>
	</div>
	<!-- Start: Loading spinner -->
	<div id="page-overlay" ><span class="loading_img"></span></div>
	<!-- End: Loading spinner -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fashionbag' ); ?></a>
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
											} ?>
										</div>
									</div>
									<div class="col-xs-6 header-middle-center">
										<div class="search-box">
											<?php dynamic_sidebar( 'header-area-widget' ); ?>
										</div>
									</div>
									<div class="col-xs-3 header-middle-right">
										<div class="header-contact-box">
											<?php dynamic_sidebar( 'header-contact-area-widget' ); ?>
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
									<div class="col-xs-8 header-bottom-left">
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
									<div class="col-xs-4 header-bottom-right">
										<div class="fb-shopping-cart">
											<?php global $woocommerce; ?>
											<?php ob_start();?>						
											<div id="shopping_cart" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'fashionbag'); ?>">
												<span class="fb-cart-icon">
													<div class="fb-cart-title"><?php esc_html_e( 'Cart', 'fashionbag' ); ?></div>
													<div class="fb-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
													<div class="fb-cart-total"><?php echo WC()->cart->get_cart_total(); ?></div>
												</span>
											</div>	
											<div id="shopping_cart_res" class="shopping_cart" title="<?php esc_html_e('View your shopping cart', 'fashionbag'); ?>">
												<span class="fb-cart-icon">
													<div class="fb-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
												</span>
											</div>	
											<?php dynamic_sidebar( 'header-cart-area-widget' ); ?>
										</div>
										<div class="fb-wishlist">
											<a href="<?php echo esc_url( home_url( '/wishlist' ) ); ?>" rel="wishlist">
												<i class="fa fa-heart-o" aria-hidden="true"></i>
												<?php
												if ( is_user_logged_in() ) {
													?>
													<div class="fb-wishlist-count"><?php echo YITH_WCWL()->count_products(); ?></div>
													<?php
												} else {
													?>
													<div class="fb-wishlist-count"><?php esc_html_e('0', 'fashionbag'); ?></div>
													<?php
												}
												?>
											</a>
										</div>
										<div class="fb-login">
											<?php if (is_user_logged_in()) { ?>
												<a class="fb-login-link" href="<?php echo esc_url( home_url( '/my-account' ) ); ?>" rel="home">
													<small>Hello,</small>
													<span><?php esc_html_e('My Account', 'fashionbag'); ?></span>
												</a>
											<?php } else { get_template_part('ajax', 'auth'); ?>    
											<a class="fb-login-link login_button" id="show_login" href="#" rel="home">
												<small>Hello,</small>
												<span><?php esc_html_e('My Account', 'fashionbag'); ?></span>
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


