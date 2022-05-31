<?php
/**
 * Electromart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Electromart
 * @since 1.0.0
 */

/**
 * Electromart only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

if ( ! function_exists( 'electromart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function electromart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Electromart, use a find and replace
		 * to change 'electromart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'electromart', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1192, 832 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'menu-navigation' => esc_html__( 'Main Navigation', 'electromart' ),
			'offer-link' => esc_html__( 'Top Offer Link', 'electromart' ),
			'social-menu' => esc_html__( 'Social Menu', 'electromart' ),
			'top-link' => esc_html__( 'Top Link', 'electromart' ),
			'header-link' => esc_html__( 'Header Link', 'electromart' ),
			'category-menu' => esc_html__( 'Category Menu', 'electromart' ),

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
add_action( 'after_setup_theme', 'electromart_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function electromart_widgets_init() {
	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'electromart' ),
		'id'            => 'mein-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// default widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Main Sidebar', 'electromart' ),
		'id'            => 'shop-mein-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer first widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'electromart' ),
		'id'            => 'first-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	// footer Second widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'electromart' ),
		'id'            => 'second-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	// footer Third widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Third Footer Widget', 'electromart' ),
		'id'            => 'third-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Forth Footer Widget', 'electromart' ),
		'id'            => 'forth-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'five Footer Widget', 'electromart' ),
		'id'            => 'five-footer-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Widget', 'electromart' ),
		'id'            => 'footer-bottom-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="footer-title"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Area Widget', 'electromart' ),
		'id'            => 'header-area-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Cart Area Widget', 'electromart' ),
		'id'            => 'header-cart-area-widget',
		'description'   => esc_html__( 'Add Header Cart widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Category Area Widget', 'electromart' ),
		'id'            => 'header-category-area-widget',
		'description'   => esc_html__( 'Add Header Category widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Compare Area Widget', 'electromart' ),
		'id'            => 'header-compare-area-widget',
		'description'   => esc_html__( 'Add Header Compare widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar Widget', 'electromart' ),
		'id'            => 'blog-sidebar-widget',
		'description'   => esc_html__( 'Add widgets here.', 'electromart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'electromart_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width Content width.
 */
function electromart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'electromart_content_width', 640 );
}
add_action( 'after_setup_theme', 'electromart_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function electromart_scripts() {
	
	/**
	 * Enqueue scripts.
	 */

	wp_style_add_data( 'electromart-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script( 'electromart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'electromart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true );
	wp_enqueue_script( 'electromart', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	

	/**
	 * Enqueue styles.
	*/
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');
	wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', array(), '', 'all');

	wp_enqueue_style('woocommerce-layout', get_template_directory_uri() . '/css/woocommerce-layout.css', array(), '', 'all');
	wp_enqueue_style( 'electromart-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'electromart_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function electromart_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'electromart_skip_link_focus_fix' );

/**
 * Enqueue supplemental block editor styles.
 */
function electromart_editor_customizer_styles() {

	wp_enqueue_style( 'electromart-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );

	if ( 'custom' === get_theme_mod( 'primary_color' ) ) {
		// Include color patterns.
		require_once get_parent_theme_file_path( '/inc/color-patterns.php' );
		wp_add_inline_style( 'electromart-editor-customizer-styles', electromart_custom_colors_css() );
	}
}
add_action( 'enqueue_block_editor_assets', 'electromart_editor_customizer_styles' );

/**
 * Display custom color CSS in customizer and on frontend.
 */
function electromart_colors_css_wrap() {

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
		<?php echo electromart_custom_colors_css(); ?>
	</style>
	<?php
}
add_action( 'wp_head', 'electromart_colors_css_wrap' );

/**
 * SVG Icons class.
 */
require get_template_directory() . '/classes/class-electromart-svg-icons.php';

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/classes/class-electromart-walker-comment.php';

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



require get_template_directory() . '/inc/init.php';
/**
 * Customizer Woocommerce.
 */


require get_template_directory() . '/woocommerce/woocommerce-init.php';

add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );
 
function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['div.em-cart-count'] = '<div class="em-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    $fragments['div.header-cart-total'] = '<div class="header-cart-total">' . WC()->cart->get_cart_total() . '</div>';
    return $fragments;
    
}

function size_of_category_thumb($u)
{
    return array(700, 700,true);
}
add_filter('subcategory_archive_thumbnail_size', 'size_of_category_thumb');


add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
    if( $product->is_type('variable')){
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        // We keep the highest value
        $percentage = max($percentages) . '%<br>Off';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%<br>Off';
    }
    return '<span class="onsale">' . $percentage . '</span>';
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
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
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


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
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
function electromart_excerpt_length( $length ) {
    return 50;
}
add_filter( 'excerpt_length', 'electromart_excerpt_length');


function electromart_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'electromart') . '</a>';
}
add_filter( 'excerpt_more', 'electromart_excerpt_more' );


/* Favicon fucntion */
if ( ! function_exists( 'electromart_favicon' ) ) {
	function electromart_favicon() {
		if ( ! function_exists( 'has_favicon' ) || ! has_favicon() ) {
			echo '<link rel="favicon icon" type="image/png" href="'.get_template_directory_uri() .'/img/favicon.ico" />';
		}
	}
}
add_action('wp_head','electromart_favicon');
add_action('admin_head','electromart_favicon');
add_action('wp_head','electromart_custom_css',15);


/*Add TGMPA library file */
require  trailingslashit(get_template_directory()).'electromart-plugins-install.php' ;


function woocommerce_after_shop_loop_item_title_short_description() {
	global $product;
	if ( ! $product->get_short_description() ) return;
	?>
	<div class="woocommerce-product-details__short-description">
		<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ) ?>
	</div>
	<?php
}
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_after_shop_loop_item_title_short_description', 10);

