<?php
/**
 * Filter functions for Mobile Section of Theme Options
 */

if ( ! function_exists ( 'redux_toggle_mobile_frontpage' ) ) {
    function redux_toggle_mobile_frontpage( $enable ) {
        global $zs_options;

        if ( ! isset( $zs_options['enable_mobile_frontpage'] ) ) {
            $zs_options['enable_mobile_frontpage'] = false;
        }

        if ( $zs_options['enable_mobile_frontpage'] ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if ( ! function_exists( 'redux_apply_mobile_frontpage_id' ) ) {
    function redux_apply_mobile_frontpage_id( $id ) {
        global $zs_options;

        if( ! empty( $zs_options['mobile_frontpage_id'] ) ) {
            $id = $zs_options['mobile_frontpage_id'];
        }

        return $id;
    }
}

if ( ! function_exists( 'redux_apply_handheld_header_logo' ) ) {
    function redux_apply_handheld_header_logo( $logo ) {
        global $zs_options;

        $logo_image_src = '';
        if ( ! empty( $zs_options['handheld_header_logo']['url'] ) ) {
            $logo_image_attr = $zs_options['handheld_header_logo'];
            $logo_image_src = $zs_options['handheld_header_logo']['url'];
        } elseif ( ! empty( $zs_options['site_header_logo']['url'] ) ) {
            $logo_image_attr = $zs_options['site_header_logo'];
            $logo_image_src = $zs_options['site_header_logo']['url'];
        }
        
        if ( ! empty( $logo_image_src ) ) {

            if ( is_ssl() ) {
                $logo_image_src = str_replace( 'http:', 'https:', $logo_image_src );
            }

            ob_start();
            ?>
            <div class="header-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo-link">
                    <img src="<?php echo esc_url( $logo_image_src ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="img-header-logo" width="<?php echo esc_attr( $logo_image_attr['width'] ); ?>" height="<?php echo esc_attr( $logo_image_attr['height'] ); ?>" />
                </a>
            </div>
            <?php
            $logo = ob_get_clean();
        }

        return $logo;
    }
}

if ( ! function_exists( 'redux_apply_handheld_header_style' ) ) {
    function redux_apply_handheld_header_style( $handheld_header_style ) {
        global $zs_options;

        if( isset( $zs_options['handheld_header_style'] ) ) {
            $handheld_header_style = $zs_options['handheld_header_style'];
        }

        return $handheld_header_style;
    }
}

if ( ! function_exists ( 'redux_toggle_handheld_header_v2_light_bg' ) ) {
    function redux_toggle_handheld_header_v2_light_bg( $enable ) {
        global $zs_options;

        if ( ! isset( $zs_options['handheld_header_v2_light_bg'] ) ) {
            $zs_options['handheld_header_v2_light_bg'] = false;
        }

        if ( $zs_options['handheld_header_v2_light_bg'] ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if( ! function_exists( 'redux_toggle_handheld_header_sticky' ) ) {
    function redux_toggle_handheld_header_sticky() {
        global $zs_options;

        if( isset( $zs_options['sticky_handheld_header'] ) && $zs_options['sticky_handheld_header'] == '1' ) {
            $sticky_header = true;
        } else {
            $sticky_header = false;
        }

        return $sticky_header;
    }
}

if ( ! function_exists( 'redux_apply_handheld_footer_logo' ) ) {
    function redux_apply_handheld_footer_logo( $logo ) {
        global $zs_options;

        if ( ! empty( $zs_options['handheld_footer_logo']['url'] ) ) {

            $logo_image_src = $zs_options['handheld_footer_logo']['url'];
            if ( is_ssl() ) {
                $logo_image_src = str_replace( 'http:', 'https:', $logo_image_src );
            }

            ob_start();
            ?>
            <div class="footer-logo">
                <img src="<?php echo esc_url( $logo_image_src ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="<?php echo esc_attr( $zs_options['handheld_footer_logo']['width'] ); ?>" height="<?php echo esc_attr( $zs_options['handheld_footer_logo']['height'] ); ?>" />
            </div>
            <?php
            $logo = ob_get_clean();
        }

        return $logo;
    }
}

if ( ! function_exists( 'redux_apply_handheld_footer_style' ) ) {
    function redux_apply_handheld_footer_style( $handheld_footer_style ) {
        global $zs_options;

        if( isset( $zs_options['handheld_footer_style'] ) ) {
            $handheld_footer_style = $zs_options['handheld_footer_style'];
        }

        return $handheld_footer_style;
    }
}

if ( ! function_exists ( 'redux_toggle_handheld_footer_light_bg' ) ) {
    function redux_toggle_handheld_footer_light_bg( $enable ) {
        global $zs_options;

        if ( ! isset( $zs_options['handheld_footer_light_bg'] ) ) {
            $zs_options['handheld_footer_light_bg'] = false;
        }

        if ( $zs_options['handheld_footer_light_bg'] ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}

if ( ! function_exists( 'redux_toggle_mobile_footer_bottom_widgets' ) ) {
    function redux_toggle_mobile_footer_bottom_widgets( $enable ) {
        global $zs_options;

        $zs_options['show_mobile_footer_bottom_widgets'] = isset( $zs_options['show_mobile_footer_bottom_widgets'] ) ? $zs_options['show_mobile_footer_bottom_widgets'] : true;

        if( $zs_options['show_mobile_footer_bottom_widgets'] ) {
            $enable = true;
        } else {
            $enable = false;
        }

        return $enable;
    }
}