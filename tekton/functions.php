<?php
/**
 * tekton functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tekton
 */

if ( ! function_exists( 'tekton_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tekton_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tekton, use a find and replace
		 * to change 'tekton' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tekton', get_template_directory() . '/languages' );

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
			'menu-navigation' => esc_html__( 'Main Navigation', 'tekton' ),
			'top-menu' => esc_html__( 'Top Menu', 'tekton' ),

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
		add_theme_support( 'custom-background', apply_filters( 'tekton_custom_background_args', array(
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
add_action( 'after_setup_theme', 'tekton_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tekton_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tekton_content_width', 640 );
}
add_action( 'after_setup_theme', 'tekton_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tekton_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tekton' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'tekton' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'tekton' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'tekton' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// Footer Top Section Widget
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Section Widget', 'tekton' ),
		'id'            => 'footer-top-widget',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
	
	// top header widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Widget', 'tekton' ),
		'id'            => 'top-header-widget',
		'description'   => esc_html__( 'Add widgets here.', 'tekton' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="top-header-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'tekton_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tekton_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);

	wp_enqueue_script( 'tekton-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	


	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');


	wp_enqueue_style( 'tekton-style', get_stylesheet_uri() );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tekton_scripts' );


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
require  trailingslashit(get_template_directory()).'tekton-plugins-install.php' ;



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
		    'prev_text' => '<span>« Previous</span>',
			'next_text' => '<span>Next »</span>'
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

/* Favicon fucntion */
if ( ! function_exists( 'tekton_favicon' ) ) {
	function tekton_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.png" />';
		}
	}
}
add_action('wp_head','tekton_favicon');
add_action('admin_head','tekton_favicon');



//add SVG to allowed file uploads
define( 'ALLOW_UNFILTERED_UPLOADS', true );


/**
 * Add svg MIME type support
 *
 * @param $mimes
 *
 * @author tekton
 * @return mixed
 */
function tekton_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'tekton_mime_types' );

/**
 * Enqueue SVG javascript and stylesheet in admin
 * @author tekton
 */

function tekton_svg_enqueue_scripts( $hook ) {
	wp_enqueue_script( 'tekton-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
	wp_localize_script( 'tekton-svg-script', 'script_vars',
		array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'tekton_svg_enqueue_scripts' );


/**
 * Ajax get_attachment_url_media_library
 * @author tekton
 */
function tekton_get_attachment_url_media_library() {

	$url          = '';
	$attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
	if ( $attachmentID ) {
		$url = wp_get_attachment_url( $attachmentID );
	}

	echo $url;

	die();
}

add_action( 'wp_ajax_svg_get_attachment_url', 'tekton_get_attachment_url_media_library' );