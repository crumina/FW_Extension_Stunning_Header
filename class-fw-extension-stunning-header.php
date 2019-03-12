<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

class FW_Extension_Stunning_Header extends FW_Extension {

    protected function _init() {
        
    }

    public function render() {
        $ext = fw_ext( 'stunning-header' );

        $visibility = $ext->get_option_final( 'header-stunning-visibility', 'yes' );

        if ( $visibility !== 'yes' ) {
            return;
        }

        $classes = apply_filters( 'fw_ext_stunning_header_container_classes', array( 'crumina-stunning-header' ) );

        $ctype_visibility = $ext->get_option_final( 'header-stunning-visibility', 'default', array( 'final-source' => 'current-type' ) );

        $picker = $ext->get_option_final( 'settings-header-stunning-content-picker', array() );

        $bg_image_default = 'url(' . get_template_directory_uri() . '/images/header-stunning-1.png)';

        $customize_content = $ext->get_option_final( 'header-stunning-customize/yes/header-stunning-customize-content', array() );
        $customize_styles  = $ext->get_option_final( 'header-stunning-customize/yes/header-stunning-customize-styles', array() );

        if ( fw_akg( 'customize', $customize_content, 'no' ) === 'yes' && $ctype_visibility !== 'default' ) {
            $bottom_image     = fw_akg( 'yes/header-stunning-content-popup/stunning_bottom_image/url', $customize_content, '' );
            $title_show       = fw_akg( 'yes/header-stunning-content-popup/stunning_title_show/show', $customize_content, 'yes' );
            $breadcrumbs_show = fw_akg( 'yes/header-stunning-content-popup/stunning_breadcrumbs_show', $customize_content, 'yes' );
            $title_text       = fw_akg( 'yes/header-stunning-content-popup/stunning_title_show/yes/title', $customize_content, '' );
            $text             = fw_akg( 'yes/header-stunning-content-popup/stunning_text', $customize_content, '' );
        } else {
            $bottom_image     = fw_akg( 'yes/stunning_bottom_image/url', $picker, '' );
            $title_show       = fw_akg( 'yes/stunning_title_show/show', $picker, 'yes' );
            $breadcrumbs_show = fw_akg( 'yes/stunning_breadcrumbs_show', $picker, 'yes' );
            $title_text       = fw_akg( 'yes/stunning_title_show/yes/title', $picker, '' );
            $text             = fw_akg( 'yes/stunning_text', $picker, '' );
        }

        if ( fw_akg( 'customize', $customize_styles, 'no' ) === 'yes' && $ctype_visibility !== 'default' ) {
            $text_align      = fw_akg( 'yes/header-stunning-styles-popup/stunning_text_align', $customize_styles, '' );
            $bg_animate      = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_animate', $customize_styles, 'yes' );
            $bg_animate_type = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_animate_picker/yes/stunning_bg_animate_type', $customize_styles, 'top-to-bottom' );
            $bg_image        = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_image/data/css/background-image', $customize_styles, $bg_image_default );
        } else {
            $text_align      = fw_get_db_customizer_option( 'stunning_text_align', '' );
            $bg_animate      = fw_get_db_customizer_option( 'stunning_bg_animate', 'yes' );
            $bg_animate_type = fw_get_db_customizer_option( 'stunning_bg_animate_picker/yes/stunning_bg_animate_type', 'top-to-bottom' );
            $bg_image        = fw_akg( 'data/css/background-image', fw_get_db_customizer_option( 'stunning_bg_image', '' ), $bg_image_default );
        }

        //Add addit classes for container
        if ( 'yes' === $bg_animate ) {
            $classes[] = 'crumina-stunning-header--with-animation';
        }

        $classes[] = $text_align;

        $this->get_view( 'stunning', compact( 'ext', 'bg_image', 'title_show', 'title_text', 'breadcrumbs_show', 'text', 'bottom_image', 'bg_animate', 'classes', 'bg_animate_type' ), false );
    }

    public function get_option( $option_id, $default_value = '', $source = 'settings', $atts = array() ) {
        $obj = get_queried_object();

        switch ( $source ) {
            case 'settings':
                return fw_get_db_settings_option( $option_id, $default_value );
            case 'customizer':
                return fw_get_db_customizer_option( $option_id, $default_value );
            case 'post':
                if ( isset( $atts[ 'ID' ] ) ) {
                    $atts[ 'ID' ] = (int) $atts[ 'ID' ];
                } else if ( isset( $obj->ID ) ) {
                    $atts[ 'ID' ] = $obj->ID;
                } else {
                    return $default_value;
                }
                return fw_get_db_post_option( $atts[ 'ID' ], $option_id, $default_value );
            case 'taxonomy':
                if ( isset( $atts[ 'term_id' ] ) ) {
                    $atts[ 'term_id' ] = (int) $atts[ 'term_id' ];
                } else if ( isset( $obj->term_id ) ) {
                    $atts[ 'term_id' ] = $obj->term_id;
                } else {
                    return $default_value;
                }

                if ( isset( $atts[ 'taxonomy' ] ) ) {
                    $atts[ 'taxonomy' ] = (string) $atts[ 'taxonomy' ];
                } else if ( isset( $obj->taxonomy ) ) {
                    $atts[ 'taxonomy' ] = $obj->taxonomy;
                } else {
                    return $default_value;
                }
                return fw_get_db_term_option( $atts[ 'term_id' ], $atts[ 'taxonomy' ], $option_id, $default_value );
            default:
                return $default_value;
        }
    }

    public function get_option_final( $option_id, $default_value = '', $atts = array( 'final-source' => 'settings' ) ) {
        $option = '';

        if ( is_singular() ) {
            $option = $this->get_option( $option_id, 'default', 'post' );
        } elseif ( is_archive() ) {
            $option = $this->get_option( $option_id, 'default', 'taxonomy' );
        }

        if ( empty( $option ) || ($option === 'default') ) {
            switch ( $atts[ 'final-source' ] ) {
                case 'customizer':
                    $source = 'customizer_option';
                    break;
                case 'current-type':
                    if ( is_singular() ) {
                        $source = 'post';
                    } elseif ( is_archive() ) {
                        $source = 'taxonomy';
                    } else {
                        $source = 'settings';
                    }
                    break;
                default:
                    $source = 'settings';
                    break;
            }

            $option = $this->get_option( $option_id, $default_value, $source );
        }

        return $option;
    }

    /**
     * @param string $name View file name (without .php) from <extension>/views directory
     * @param  array $view_variables Keys will be variables names within view
     * @param   bool $return In some cases, for memory saving reasons, you can disable the use of output buffering
     * @return string HTML
     */
    final public function get_view( $name, $view_variables = array(), $return = true ) {
        $full_path = $this->locate_path( '/views/' . $name . '.php' );

        if ( !$full_path ) {
            trigger_error( 'Extension view not found: ' . $name, E_USER_WARNING );
            return;
        }

        return fw_render_view( $full_path, $view_variables, $return );
    }

    public static function customizerScripts(){
        $ext = fw_ext( 'stunning-header' );
        wp_enqueue_style( 'crumina-stunning-header-customizer', $ext->locate_URI( '/static/css/stunning-header-customizer.css' ), array(), $ext->manifest->get_version() );
    }
    
}
