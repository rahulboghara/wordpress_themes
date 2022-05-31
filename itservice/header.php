<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itservice
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Advent+Pro:100,200,300,400,500,600,700&display=swap" rel="stylesheet"> 

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="firstPage">
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
					<?php   echo '<img src="'. get_stylesheet_directory_uri() . '/img/logo.svg' .'">'; ?>
				</a>
				<?php
			}
			?>
		</div>
		<div class="main_menu-toggle"><div class="menu-toggle"></div></div>
	</header><!-- #masthead -->
	<div id="page" class="page">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'itservice' ); ?></a>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-navigation',
			'menu_id'        => 'menu-navigation',
		) );
		?>
		<?php 
		$args = new WP_Query( array(
		      'post_type' => 'web_block',
		      'post_status' => 'publish',
		      'order' => 'ASC',
		    ));

		    if($args->have_posts()) {
		      while($args->have_posts()) { $args->the_post(); 
		      ?>
		      <div class="md-modal md-effect-15 pg-3" id="devel-modal-<?php echo esc_html( get_post_meta( get_the_ID(), 'web_block_number', true ) ); ?>">
		            <?php the_content(); ?>
		      </div>

		    <?php }
		  }
		 ?>	
		<?php 
			$args = new WP_Query( array(
			      'post_type' => 'gallery_portfolio',
		          'post_status' => 'publish',
		          'order' => 'ASC',
          		  'posts_per_page' => '-1'

			    ));

			    if($args->have_posts()) {
			    	$i = 1;
			      while($args->have_posts()) { $args->the_post(); 
			      ?>
			      <div class="md-modal md-effect-15 pg-4" id="gallery-modal-<?php echo $i; ?>">
			      	<div class="md-content custom-scroll">
			           <div class="mdl-content"><?php the_post_thumbnail('post-thumbnails'); ?></div>
			       </div>
			      </div>

			    <?php 
			    $i++;
			    }
			  }
			 ?>

		 <div class="md-overlay"></div>

		<div id="content" class="site-content">

