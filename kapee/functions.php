<?php


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
 * kapee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage kapee
 * @since 1.0.0
 */

/**
 * kapee only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

class WC_kapee {

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
	 * Open the kapee wrapper.
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
	 * Close the kapee wrapper.
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
		return apply_filters( 'woocommerce_kapee_styles', $styles );
	}

	/**
	 * Tweak kapee features.
	 */
	public static function tweak_theme_features() {
		if ( is_woocommerce() ) {
			add_filter( 'twentynineteen_can_show_post_thumbnail', '__return_false' );
		}
	}

	/**
	 * Filters kapee custom colors CSS.
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

WC_kapee::init();

if ( ! function_exists( 'kapee_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kapee_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kapee, use a find and replace
		 * to change 'kapee' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kapee', get_template_directory() . '/languages' );

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
			'menu-navigation' => esc_html__( 'Main Navigation', 'kapee' ),
			'our-store' => esc_html__( 'Top Our Store', 'kapee' ),
			'top-link' => esc_html__( 'Top Link', 'kapee' ),
			'category-menu' => esc_html__( 'Category Menu', 'kapee' ),

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
add_action( 'after_setup_theme', 'kapee_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kapee_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'kapee' ),
		'id'            => 'main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Main Sidebar', 'kapee' ),
		'id'            => 'shop-main-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'kapee' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'kapee' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'kapee' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Forth Footer Widget', 'kapee' ),
		'id'            => 'forth-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Fifth Footer Widget', 'kapee' ),
		'id'            => 'five-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Widget', 'kapee' ),
		'id'            => 'footer-bottom-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Area Widget', 'kapee' ),
		'id'            => 'header-area-widget',
		'description'   => esc_html__( 'Add widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Cart Area Widget', 'kapee' ),
		'id'            => 'header-cart-area-widget',
		'description'   => esc_html__( 'Add Header Cart widgets here.', 'kapee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'kapee_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function kapee_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kapee_content_width', 640 );
}
add_action( 'after_setup_theme', 'kapee_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function kapee_scripts() {
	
	/**
	 * Enqueue scripts.
	 */

	wp_style_add_data( 'kapee-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
/*	wp_enqueue_script( 'kapee-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );*/

	wp_enqueue_script( 'kapee-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true );
	wp_enqueue_script( 'kapee', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	

	/**
	 * Enqueue styles.
	*/
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '', 'all');

	wp_enqueue_style( 'kapee-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kapee_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function kapee_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'kapee_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function kapee_editor_customizer_styles() {

	wp_enqueue_style( 'kapee-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'kapee-editor-customizer-styles', kapee_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'kapee_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function kapee_colors_css_wrap() {

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
		<?php echo kapee_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'kapee_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-kapee-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-kapee-walker-comment.php';

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
require  trailingslashit(get_template_directory()).'kapee-plugins-install.php' ;


add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.kp-cart-count'] = '<div class="kp-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
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
function kapee_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'kapee_excerpt_length');


function kapee_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'kapee') . '</a>';
}
add_filter( 'excerpt_more', 'kapee_excerpt_more' );


/* Favicon fucntion */
if ( ! function_exists( 'kapee_favicon' ) ) {
	function kapee_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.png" />';
		}
	}
}
add_action('wp_head','kapee_favicon');
add_action('admin_head','kapee_favicon');
add_action('wp_head','kapee_custom_css',15);


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



/*function kapee_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'kapee_add_woocommerce_support' );*/


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


add_filter( 'woocommerce_enqueue_styles', 'kp_dequeue_styles' );
function kp_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
