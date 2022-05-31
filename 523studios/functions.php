<?php
/**
 * studios functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package studios
 */

if ( ! function_exists( 'studios_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function studios_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on studios, use a find and replace
		 * to change 'studios' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'studios', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-navigation' => esc_html__( 'Main Navigation', 'studios' ),
			'social-menu' => esc_html__( 'Social menu', 'studios' ),

		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'studios_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'studios_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function studios_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'studios_content_width', 640 );
}
add_action( 'after_setup_theme', 'studios_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function studios_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'studios' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'studios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Main Sidebar widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'studios' ),
		'id'            => 'main-sidebar-widget',
		'description'   => esc_html__( 'Add widgets here.', 'studios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="sidebar-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer instagram widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Instagram', 'studios' ),
		'id'            => 'instagram-widget',
		'description'   => esc_html__( 'Add widgets here.', 'studios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer bottom widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom', 'studios' ),
		'id'            => 'footer-bottom-widget',
		'description'   => esc_html__( 'Add widgets here.', 'studios' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'studios_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function studios_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);

	wp_enqueue_script( 'studios-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	


	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');


	wp_enqueue_style( 'studios-style', get_stylesheet_uri() );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'studios_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


if( ! function_exists( 'is_ocdi_activated' ) ) {
	/**
	 * Check if One Click Demo Import is activated
	 */
	function is_ocdi_activated() {
		return class_exists( 'OCDI_Plugin' ) ? true : false;
	}
}

require get_template_directory() . '/inc/init.php';


/*Add TGMPA library file */
require  trailingslashit(get_template_directory()).'studios-plugins-install.php' ;



if ( ! function_exists( 'post_pagination' ) ) :
   function post_pagination() {
		global $wp_query;
		$big = 12345678;
		$page_format = paginate_links( array(
		    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		    'format' => '?paged=%#%',
		    'current' => max( 1, get_query_var('paged') ),
		    'total' => $wp_query->max_num_pages,
		    'type'  => 'array',
		    'prev_text' => '<span>« Previous Page</span>',
			'next_text' => '<span>Next Page »</span>'
		) );
		if( is_array($page_format) ) {
		            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		            echo '<div><ul>';
		            foreach ( $page_format as $page ) {
		                    echo "<li>$page</li>";
		            }
		           echo '</ul></div>';
		}
   }
endif;



add_filter( 'tribe_events_community_required_fields', 'std_community_required_fields', 10, 1 );
function std_community_required_fields( $fields ) {
    if ( ! is_array( $fields ) ) {
        return $fields;
    }
    $fields[] = '_ecp_custom_2';
    $fields[] = '_ecp_custom_7'; 
    $fields[] = '_ecp_custom_9'; 
    $fields[] = '_ecp_custom_11'; 
    $fields[] = '_ecp_custom_13'; 
    $fields[] = '_ecp_custom_15'; 

    return $fields;
}


add_filter('tribe_community_events_form_errors', 'std_thank_you_message', 10, 2);
function std_thank_you_message( $messages ) {		

	if ( is_array( $messages ) ) {
		foreach ( $messages as $key => $message ) {
			if( $message['type'] === 'update' ) {				

				$messages[$key]['message'] = 'Thank you!';
			}
		}
	}

	return $messages;
}


// Receive the Request post that came from AJAX
add_action( 'wp_ajax_demo-pagination-load-posts', 'studio_demo_pagination_load_posts' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'studio_demo_pagination_load_posts' );
function studio_demo_pagination_load_posts() {
   
    global $wpdb;
    // Set default variables
    $msg = '';
   
    if(isset($_POST['page'])){
        // Sanitize the received page  
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 5;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;
       
        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";
       
        // Query the necessary posts
        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );
       
        // At the same time, count the number of queried posts
        $count = $wpdb->get_var($wpdb->prepare("
            SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );
       
        // Loop into all the posts
        foreach($all_blog_posts as $key => $post):
           
            // Set the desired output into a variable
            $msg .= '
            <article class = "post has-post-thumbnail">   

				<div class="post-img">	
					<div class="post-img-content">'. get_the_post_thumbnail($post->ID) .'</div>
					<h2 class="entry-title"><a href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></h2>
					<p class="entry-meta">'. get_the_date( 'F d, Y',$post->ID ) . '</p>
				</div>   
				<div class="post-desc">
								<div class="entry-content">
									<p>'. wp_trim_words($post->post_content, 60, '...' ) . '</p>
									<p><a class="read-more" href="'. get_permalink($post->ID) .'">Read <em>the</em> Post</a></p>
							</div>
						</div>
            </article>';
           
        endforeach;
       
        // Optional, wrap the output into a container
        $msg = "<div class='studio-content'>" . $msg . "</div><br class = 'clear' />";
       
        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
       
        // Pagination Buttons logic    
        $pag_container .= "
        <div class='studio-pagination'>
            <ul>";

        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $pag_container .= "<li p='$pre' class='active'>« Previous Page</li>";
        } else if ($previous_btn) {
            $pag_container .= "<li class='inactive'>« Previous Page</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)
                $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
            else
                $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }
       
        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            $pag_container .= "<li p='$nex' class='active'>Next Page »</li>";
        } else if ($next_btn) {
            $pag_container .= "<li class='inactive'>Next Page »</li>";
        }


        $pag_container = $pag_container . "
            </ul>
        </div>";
       
        // We echo the final output
        echo
        '<div class = "studio-pagination-content">' . $msg . '</div>' .
        '<div class = "studio-pagination-nav">' . $pag_container . '</div>';
       
    }
    // Always exit to avoid further execution
    exit();
}




/* Favicon fucntion */
if ( ! function_exists( 'studio_favicon' ) ) {
	function studio_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.png" />';
		}
	}
}
add_action('wp_head','studio_favicon');
add_action('admin_head','studio_favicon');
add_action('wp_head','studio_custom_css',15);



// Add menu and pages to WordPress admin area
add_action('admin_menu', 'studio_create_top_level_menu');

function studio_create_top_level_menu() {

    // This is the menu on the side
    add_menu_page(
      'How To Setup Site', 
      'How To Setup Site', 
      'manage_options', 
      'studio-how-to-use'
    );

    // This is the first page that is displayed when the menu is clicked
    add_submenu_page(
      'studio-how-to-use', 
      'studio How To Use Site',
      'studio How To Use Site', 
      'manage_options', 
      'studio-how-to-use', 
      'studio_details_page_callback'
     );

}

function studio_details_page_callback () {
    // This function is to display the hidden page (html and php)

    ?>
    <style type="text/css">
		    	.wrap h2 {
		    font-size: 19px;
		}
		.wrap .std-use-content-wrapper { 
		    padding: 25px;
		}
		.std-use-content-wrapper p {
		    font-size: 16px;
		    line-height: 27px;
		    margin: 0 auto 5px;
		}
		.std_support_wrapper{
		    margin-top: 20px;
		}
		.std_support_wrapper .wrap{
		    float: left;
		    margin-right: 20px;
		}
		.std_support_wrapper .wrap.wrap_left {
		    width: auto;
		}
		.std_support_wrapper .wrap.wrap_left .postbox h2{
		    margin: 0;
		    padding-bottom: 20px;
		    border-bottom: 1px solid #ededed;
		}
		.std_support_wrapper img{
		    max-width: 100%;
		    -webkit-box-shadow: 0px 0px 5px rgba(0,0,0,.4);
		    box-shadow: 0px 0px 5px rgba(0,0,0,.4);
		}



		@media (max-width: 782px) {
		    .std_support_wrapper .wrap.wrap_left {margin-right: 10px;}

		}   
    </style>
		<h1>
			<?php esc_html_e( 'How To Setup Site', 'studio' );?>
		</h1>
		<div class="std_support_wrapper">
    <div class="wrap wrap_left">
        <div class="postbox std-use-content-wrapper">
            <h3>Step 1:- Install And Active All Plugins</h3>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/install_plugin.png">
            <img src= "<?php echo get_template_directory_uri() ?>/img/install_plugin.png" alt="install_plugin" width='400px'>
            </a>
            <br>
            <br>

            <h3>Step 2:- Import Demo Data Content</h3>
            <br>
            <p>1. Go to <strong> Appearance </strong> and Select <strong>Import Demo Data</strong>.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/data_import.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/data_import.png" alt="data_import" width='400px'>
            </a>
            <br>
            <br>
            <br>
            <p>2. Click To <strong>Import Demo Data</strong>.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/import.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/import.png" alt="import" width='1100px'>
            </a>
            <br>
            <br>

            <h3>Step 3:- Import Events Default Settings</h3>
            <br>
            <p>1. Go to <strong> Events </strong> and Select <strong>Settings Import / Export</strong>.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/select_event.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/select_event.png" alt="select_event" width='400px'>
            </a>
            <br>
            <br>

            <p>2. Go to <strong>Import Settings</strong> section and <strong>Choose File</strong> Then Click <strong>Import</strong>.</p>
            <p><em>File Location :- your_theme_directory > wp-content > themes > 523studios > demo-data > event-settings.json</em></p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/select_import_file.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/select_import_file.png" alt="select_import_file" width='1100px'>
            </a>
            <br>
            <br>

            <h3>Step 4:- Set Request A Booking Button Link</h3>
            <br>
            <p>1. Go to <strong>Pages > All Pages</strong> in Admin Sidebar.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/select_page.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/select_page.png" alt="select_page" width='400px'>
            </a>
            <br>
            <br>
            <p>2. Edit <strong>Calendar</strong> Page.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/edit_page.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/edit_page.png" alt="edit_page" width='700px'>
            </a>
            <br>
            <br>
            <p>3. Hover On Request A Booking Button, then Click Pencil arrow in Button Editor Modal for the same check below image.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/edit_btn.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/edit_btn.png" alt="edit_btn" width='700px'>
            </a>
            <br>
            <br>
            <p>4. Under Settings Modal Click On <strong>Select URL</strong>.</p>
            <br>
            <p>5. Search For <strong>Booking</strong> Page under link to existing content section and select <strong>Booking</strong> Page and Click <strong>Set Link</strong> for the same check below image</p>

            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/set_btn_link.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/set_btn_link.png" alt="set_btn_link" width='400px'>
            </a>
            <br>
            <br>

            <h3>Step 5:- Setup Instagram Account</h3>
            <br>
            <p>1. Go to <strong>Instagram Feed</strong> in Admin Sidebar and click <strong>Connect an Instagram Account</strong> to add your Instagram Account.</p>
            <br>
            <a href="<?php echo get_template_directory_uri() ?>/img/instagram.png">
                <img src= "<?php echo get_template_directory_uri() ?>/img/instagram.png" alt="instagram" width='1100px'>
            </a>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

	<?php

}
