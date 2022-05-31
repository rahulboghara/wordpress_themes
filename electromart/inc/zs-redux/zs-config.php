<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "zs_options";

    // This line is only for altering the demo. Can be easily removed.
/*    $opt_name = apply_filters( 'zs_store/opt_name', $opt_name );*/

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'ZS Redux', 'zs' ),
        'page_title'           => __( 'ZS Redux', 'zs' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 60,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'zs' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'zs' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'zs' ),
    );


    // Panel Intro text -> before the form
        $args['intro_text'] = __( '<p>ZS Ridux Options</p>', 'zs' );



    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'zs' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'zs' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'zs' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'zs' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'zs' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START General
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'General', 'zs' ),
    'icon'      => 'fa fa-dot-circle-o',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Scroll To Top', 'zs' ),
            'id'        => 'scrollup',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'zs'),
            'off'       => esc_html__('Disabled', 'zs'),
            'default'   => 1,
        ),
        array(
            'title'     => esc_html__( 'Register Image Size', 'zs' ),
            'subtitle'  => esc_html__( 'Enable and regenerate thumbnails to enable theme registered image sizes.', 'zs' ),
            'id'        => 'reg_image_size',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'zs'),
            'off'       => esc_html__('Disabled', 'zs'),
            'default'   => 0,
        ),
    )
    ) );

    // -> START Shop
    Redux::setSection( $opt_name, array(
'title'     => esc_html__( 'Shop', 'zs' ),
    'icon'      => 'fa fa-shopping-cart',
    'fields'    => array(
        array(
            'title'     => esc_html__( 'General', 'zs' ),
            'id'        => 'shop_general_info_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'id'        => 'compare_page_id',
            'title'     => __( 'Shop Comparison Page', 'zs' ),
            'subtitle'  => __( 'Choose a page that will be the product compare page for shop.', 'zs' ),
            'type'      => 'select',
            'data'      => 'pages',
        ),

        array(
            'id'        => 'shop_general_info_end',
            'type'      => 'section',
            'indent'    => false
        ),
        
        array(
            'title'     => esc_html__( 'Shop/Catalog Pages', 'zs' ),
            'id'        => 'product_archive_page_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'id'        => 'product_archive_enabled_views',
            'type'      => 'sorter',
            'title'     => esc_html__( 'Product archive views', 'zs' ),
            'subtitle'  => esc_html__( 'Please drag and arrange the views. Top most view will be the default view', 'zs' ),
            'options'   => array(
                'enabled' => array(
                    'grid'            => esc_html__( 'Grid', 'zs' ),
                    'list-view'       => esc_html__( 'List', 'zs' )
                ),
                'disabled' => array()
            )
        ),

        array(
            'title'     => esc_html__('Shop Page Layout', 'zs'),
            'subtitle'  => esc_html__('Select the layout for the Shop Listing.', 'zs'),
            'id'        => 'shop_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'          => esc_html__( 'Full Width', 'zs' ),
                'left-sidebar'        => esc_html__( 'Left Sidebar', 'zs' ),
                'right-sidebar'       => esc_html__( 'Right Sidebar', 'zs' ),
            ),
            'default'   => 'left-sidebar',
        ),
        array(
            'title'     => esc_html__('Number of Products Columns', 'zs'),
            'subtitle'  => esc_html__('Drag the slider to set the number of columns for displaying products in shop and catalog pages.', 'zs' ),
            'id'        => 'product_columns',
            'min'       => '2',
            'step'      => '1',
            'max'       => '6',
            'type'      => 'slider',
            'default'   => '3',
        ),
        array(
            'title'     => esc_html__('Number of Products Per Page', 'zs'),
            'subtitle'  => esc_html__('Drag the slider to set the number of products per page to be listed on the shop page and catalog pages.', 'zs' ),
            'id'        => 'products_per_page',
            'min'       => '3',
            'step'      => '1',
            'max'       => '48',
            'type'      => 'slider',
            'default'   => '15',
        ),
        array(
            'id'        => 'product_archive_page_end',
            'type'      => 'section',
            'indent'    => false
        ),
        array(
            'title'     => esc_html__( 'Single Product Page', 'zs' ),
            'id'        => 'product_single_page_start',
            'type'      => 'section',
            'indent'    => true
        ),
        array(
            'title'     => esc_html__('Single Product Layout', 'zs'),
            'subtitle'  => esc_html__('Select the layout for the Single Product.', 'zs'),
            'id'        => 'single_product_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'          => esc_html__( 'Full Width', 'zs' ),
                'left-sidebar'        => esc_html__( 'Left Sidebar', 'zs' ),
                'right-sidebar'       => esc_html__( 'Right Sidebar', 'zs' ),
            ),
            'default'   => 'left-sidebar',
        ),

        array(
            'id'        => 'enable_related_products',
            'title'     => esc_html__( 'Enable Related Products', 'zs' ),
            'type'      => 'switch',
            'default'   => 1,
        ),

        array(
            'id'        => 'product_single_page_end',
            'type'      => 'section',
            'indent'    => false
        ),
    )
    ) );

    // -> START Header
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'Header', 'zs' ),
    'icon'      => 'fa fa-arrow-circle-o-up',
    'desc'      => esc_html__( 'Options related to the header section. The header has including Sticky Header, Upload  Your Logo, etc.', 'zs' ),
    'fields'    => array(
        array(
            'title'     => esc_html__( 'Masthead', 'zs' ),
            'id'        => 'masthead_start',
            'type'      => 'section',
            'indent'    => true
        ),

        array(
            'title'     => esc_html__( 'Sticky Header', 'zs' ),
            'id'        => 'sticky_header',
            'type'      => 'switch',
            'on'        => esc_html__('Enabled', 'zs'),
            'off'       => esc_html__('Disabled', 'zs'),
            'default'   => 0,
        ),

        array(
            'title'     => esc_html__( 'Your Logo', 'zs' ),
            'subtitle'  => esc_html__( 'Upload your header logo image.', 'zs' ),
            'id'        => 'site_header_logo',
            'type'      => 'media',
        ),


        array(
            'id'        => 'masthead_end',
            'type'      => 'section',
            'indent'    => false
        ),
    )
    ) );


    // -> START Footer
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'Footer', 'zs' ),
    'desc'      => esc_html__( 'Options related to the footer section. The Footer has : Footer Widgets, Footer Credit Block', 'zs' ),
    'icon'      => 'fa fa-arrow-circle-o-down',
    'fields'    => array(
        array(
            'id'        => 'footer_widgets_start',
            'type'      => 'section',
            'title'     => esc_html__( 'Footer Widgets', 'zs' ),
            'subtitle'  => esc_html__( 'Options related to Footer Widgets. Please add widgets in Appearance > Widgets > Footer Widgets widget area. If the widget area is empty without any widgets, the theme loads default widgets.', 'zs' ),
            'indent'    => true,
        ),

        array(
            'title'     => esc_html__( 'Show Footer Widgets ?', 'zs' ),
            'id'        => 'show_footer_widgets',
            'type'      => 'switch',
            'default'   => 1,
        ),

        array(
            'title'     => esc_html__('Number of columns in Footer Widgets block', 'zs'),
            'id'        => 'footer_widgets_columns',
            'min'       => '1',
            'step'      => '1',
            'max'       => '5',
            'type'      => 'slider',
            'default'   => '5',
        ),

        array(
            'id'        => 'footer_widgets_end',
            'type'      => 'section',
            'indent'    => false
        ),

        array(
            'id'        => 'footer_credit_block_start',
            'type'      => 'section',
            'indent'    => true,
            'title'     => esc_html__( 'Footer Credit Block', 'zs' ),
            'subtitle'  => esc_html__( 'The Footer Credit Block is available bottom of Footer.', 'zs' ),
        ),

        array(
            'id'        => 'footer_credit_block_enable',
            'type'      => 'switch',
            'title'     => esc_html__( 'Enable Footer Credit Block ?', 'zs' ),
            'default'   => 1,
        ),

        array(
            'id'        => 'footer_credit',
            'type'      => 'textarea',
            'title'     => esc_html__( 'Footer Credit', 'zs' ),
            'default'   => '<a href="' . esc_url( home_url( '/' ) ) . '">' .  get_bloginfo( 'name' ) . '</a> &copy; 2019 All Rights Reserved',
            'required'  => array( 'footer_credit_block_enable', 'equals', 1 ),
        ),

        array(
            'id'        => 'footer_credit_block_end',
            'type'      => 'section',
            'indent'    => false
        ),
    )
    ) );

    // -> START Blog
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'Blog', 'zs' ),
    'icon'      => 'fa fa-list-alt',
    'fields'    => array(
        array(
            'title'     => esc_html__('Blog Page View', 'zs'),
            'subtitle'  => esc_html__('Select the view for the Blog Listing.', 'zs'),
            'id'        => 'blog_view',
            'type'      => 'select',
            'options'   => array(
                'blog-default'      => esc_html__( 'Normal', 'zs' ),
                'blog-grid'         => esc_html__( 'Grid', 'zs' ),
                'blog-list'         => esc_html__( 'List', 'zs' ),
            ),
            'default'   => 'blog-default',
        ),

        array(
            'title'     => esc_html__('Blog Page Layout', 'zs'),
            'subtitle'  => esc_html__('Select the layout for the Blog Listing.', 'zs'),
            'id'        => 'blog_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'          => esc_html__( 'Full Width', 'zs' ),
                'left-sidebar'        => esc_html__( 'Left Sidebar', 'zs' ),
                'right-sidebar'       => esc_html__( 'Right Sidebar', 'zs' ),
            ),
            'default'   => 'right-sidebar',
        ),

        array(
            'title'     => esc_html__( 'Enable Placeholder Image', 'zs' ),
            'id'        => 'post_placeholder_img',
            'on'        => esc_html__('Yes', 'zs'),
            'off'       => esc_html__('No', 'zs'),
            'type'      => 'switch',
            'default'   => TRUE,
        ),

        array(
            'title'     => esc_html__('Single Post Layout', 'zs'),
            'subtitle'  => esc_html__('Select the layout for the Single Post.', 'zs'),
            'id'        => 'single_post_layout',
            'type'      => 'select',
            'options'   => array(
                'full-width'          => esc_html__( 'Full Width', 'zs' ),
                'left-sidebar'        => esc_html__( 'Left Sidebar', 'zs' ),
                'right-sidebar'       => esc_html__( 'Right Sidebar', 'zs' ),
            ),
            'default'   => 'full-width',
        ),
    )
    ) );

    // -> START Social Media
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__('Social Media', 'zs'),
    'icon'      => 'fa fa-share-square-o',
    'desc'      => esc_html__('Please type in your complete social network URL: EX :- https://www.yoursiteurl.com', 'zs' ),
    'fields'    => array(
        array(
            'title'     => esc_html__('Facebook', 'zs'),
            'id'        => 'facebook',
            'type'      => 'text',
            'icon'      => 'fa fa-facebook',
        ),

        array(
            'title'     => esc_html__('Twitter', 'zs'),
            'id'        => 'twitter',
            'type'      => 'text',
            'icon'      => 'fa fa-twitter',
        ),

        array(
            'title'     => esc_html__('Whatsapp Mobile', 'zs'),
            'id'        => 'whatsapp-mobile',
            'type'      => 'text',
            'icon'      => 'fa fa-whatsapp',
        ),

        array(
            'title'     => esc_html__('Whatsapp Desktop', 'zs'),
            'id'        => 'whatsapp-desktop',
            'type'      => 'text',
            'icon'      => 'fa fa-whatsapp',
        ),

        array(
            'title'     => esc_html__('Google+', 'zs'),
            'id'        => 'googleplus',
            'type'      => 'text',
            'icon'      => 'fa fa-google-plus',
        ),

        array(
            'title'     => esc_html__('Pinterest', 'zs'),
            'id'        => 'pinterest',
            'type'      => 'text',
            'icon'      => 'fa fa-pinterest',
        ),

        array(
            'title'     => esc_html__('LinkedIn', 'zs'),
            'id'        => 'linkedin',
            'type'      => 'text',
            'icon'      => 'fa fa-linkedin',
        ),

        array(
            'title'     => esc_html__('Tumblr', 'zs'),
            'id'        => 'tumblr',
            'type'      => 'text',
            'icon'      => 'fa fa-tumblr',
        ),

        array(
            'title'     => esc_html__('Instagram', 'zs'),
            'id'        => 'instagram',
            'type'      => 'text',
            'icon'      => 'fa fa-instagram',
        ),

        array(
            'title'     => esc_html__('Youtube', 'zs'),
            'id'        => 'youtube',
            'type'      => 'text',
            'icon'      => 'fa fa-youtube',
        ),

        array(
            'title'     => esc_html__('Vimeo', 'zs'),
            'id'        => 'vimeo',
            'type'      => 'text',
            'icon'      => 'fa fa-vimeo-square',
        ),

        array(
            'title'     => esc_html__('Dribbble', 'zs'),
            'id'        => 'dribbble',
            'type'      => 'text',
            'icon'      => 'fa fa-dribbble',
        ),

        array(
            'title'     => esc_html__('Stumble Upon', 'zs'),
            'id'        => 'stumbleupon',
            'type'      => 'text',
            'icon'      => 'fa fa-stumpleupon',
        ),

        array(
            'title'     => esc_html__('Sound Cloud', 'zs'),
            'id'        => 'soundcloud',
            'type'      => 'text',
            'icon'      => 'fa fa-soundcloud',
        ),

        array(
            'title'     => esc_html__('Vine', 'zs'),
            'id'        => 'vine',
            'type'      => 'text',
            'icon'      => 'fa fa-vine',
        ),

        array(
            'title'     => esc_html__('VKontakte', 'zs'),
            'id'        => 'vk',
            'type'      => 'text',
            'icon'      => 'fa fa-vk',
        ),

        array(
            'title'     => esc_html__('Telegram', 'zs'),
            'id'        => 'telegram',
            'type'      => 'text',
            'icon'      => 'fa fa-telegram',
        ),

        array(
            'id'        => 'show_footer_rss_icon',
            'type'      => 'switch',
            'title'     => esc_html__( 'RSS', 'zs' ),
            'desc'      => esc_html__( 'On Enabling Rss icon.', 'zs' ),
            'default'   => 1,
        ),
    ),
    ) );

    // -> START Styling

/*    $custom_css_page_link = '<a href="' . esc_url( add_query_arg( array( 'page' => 'custom-primary-color-css-page' ) ), admin_url( 'themes.php' ) ) . '">' . esc_html__( 'Custom Primary CSS', 'zs' ) . '</a>';*/

    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'Styling', 'zs' ),
    'icon'      => 'fa fa-edit',
    'fields'    => array(
        array(
            'id'        => 'styling_general_info_start',
            'type'      => 'section',
            'title'     => esc_html__( 'General', 'zs' ),
            'subtitle'  => esc_html__( 'General Theme Style Settings', 'zs' ),
            'indent'    => TRUE,
        ),

        array(
            'title'     => esc_html__( 'Use a predefined color scheme', 'zs' ),
            'on'        => esc_html__('Yes', 'zs'),
            'off'       => esc_html__('No', 'zs'),
            'type'      => 'switch',
            'default'   => 1,
            'id'        => 'use_predefined_color'
        ),

        array(
            'title'     => esc_html__( 'Main Theme Color', 'zs' ),
            'subtitle'  => esc_html__( 'The main color of the site.', 'zs' ),
            'id'        => 'main_color',
            'type'      => 'select',
            'options'   => array(
                'default_theme_color'         => esc_html__( 'Default Theme color', 'zs' ),
            ),
            'default'   => 'default_theme_color',
            'required'  => array( 'use_predefined_color', 'equals', 1 ),
        ),

          array(
            'id'        => 'custom_color_start',
            'type'      => 'section',
            'title'     => esc_html__( 'Custom Color', 'zs' ),
            'indent'    => TRUE,
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),


        array(
            'id'          => 'custom_primary_color',
            'title'       => esc_html__( 'Primary Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#83b735',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),
        
        array(
            'id'          => 'custom_primary_text_color',
            'title'       => esc_html__( 'Primary Text Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#fff',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        array(
            'id'          => 'custom_primary_text_hover_color',
            'title'       => esc_html__( 'Primary Text Hover Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#000',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        array(
            'id'          => 'custom_button_color',
            'title'       => esc_html__( 'Button Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#83b735',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        array(
            'id'          => 'custom_button_text_color',
            'title'       => esc_html__( 'Button Text Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#fff',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        array(
            'id'          => 'custom_button_hover_color',
            'title'       => esc_html__( 'Button Hover Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#000',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),
        

        array(
            'id'          => 'custom_button_text_hover_color',
            'title'       => esc_html__( 'Button Text Hover Color', 'zs' ),
            'type'        => 'color',
            'transparent' => false,
            'default'     => '#fff',
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),

        array(
            'id'        => 'custom_color_end',
            'type'      => 'section',
            'indent'    => FALSE,
            'required'    => array( 'use_predefined_color', 'equals', 0 ),
        ),
        array(
            'id'        => 'styling_general_info_end',
            'type'      => 'section',
            'indent'    => FALSE,
        ),
    )
    ) );


    // -> START Typography
    Redux::setSection( $opt_name, array(
    'title'     => esc_html__( 'Typography', 'zs' ),
    'icon'      => 'fa fa-font',
    'fields'    => array(
        array(
            'title'         => esc_html__( 'Use default font scheme ?', 'zs' ),
            'on'            => esc_html__('Yes', 'zs'),
            'off'           => esc_html__('No', 'zs'),
            'type'          => 'switch',
            'default'       => TRUE,
            'id'            => 'use_predefined_font',
        ),

        array(
            'title'         => esc_html__( 'Title Font Family', 'zs' ),
            'type'          => 'typography',
            'id'            => 'zs_title_font',
            'text-align'    => FALSE,
            'font-style'    => FALSE,
            'font-size'     => FALSE,
            'line-height'   => FALSE,
            'color'         => FALSE,
            'default'       => array(
                'font-family'   => 'Roboto Slab',
                'subsets'       => 'latin',
                'style'         => '400',
            ),
            'required'      => array( 'use_predefined_font', 'equals', FALSE ),
        ),

        array(
            'title'         => esc_html__( 'Content Font Family', 'zs' ),
            'type'          => 'typography',
            'id'            => 'zs_content_font',
            'text-align'    => FALSE,
            'font-style'    => FALSE,
            'font-size'     => FALSE,
            'line-height'   => FALSE,
            'color'         => FALSE,
            'default'       => array(
                'font-family'   => 'Lato',
                'subsets'       => 'latin',
                'style'         => '400',
            ),
            'required'      => array( 'use_predefined_font', 'equals', FALSE ),
        ),
    )
    ) );

    // -> START Custom Code
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Custom Code', 'zs' ),
        'icon'      => 'fa fa-code',
        'fields'    => array(
            array(
                'title'         => esc_html__('Custom CSS', 'zs'),
                'subtitle'      => esc_html__('Paste your custom CSS code here.', 'zs'),
                'id'            => 'custom_css',
                'type'          => 'ace_editor',
                'mode'          => 'css',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'zs' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'zs' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'zs' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'zs' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'zs' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'zs' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'zs' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'zs' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

