<?php

$ext = fw_ext( 'stunning-header' );

if ( !is_admin() ) {
    wp_enqueue_style( 'crumina-stunning-header', $ext->locate_URI( '/static/css/stunning-header.css' ), array(), $ext->manifest->get_version() );
    wp_enqueue_script( 'crumina-stunning-header', $ext->locate_URI( '/static/js/stunning-header.js' ), array( 'jquery' ), $ext->manifest->get_version() );

    // Stuning header
    $css                              = '';
    $header_stunning_visibility       = $ext->get_option_final( 'header-stunning-visibility', 'default', array( 'final-source' => 'current-type' ) );
    $header_stunning_customize_styles = $ext->get_option_final( 'header-stunning-customize/yes/header-stunning-customize-styles', array() );

    if ( fw_akg( 'customize', $header_stunning_customize_styles, 'no' ) === 'yes' && $header_stunning_visibility !== 'default' ) {
        $sh_text_color     = fw_akg( 'yes/header-stunning-styles-popup/stunning_text_color', $header_stunning_customize_styles, '#fff' );
        $sh_padding_top    = fw_akg( 'yes/header-stunning-styles-popup/stunning_padding_top', $header_stunning_customize_styles, '125px' );
        $sh_padding_bottom = fw_akg( 'yes/header-stunning-styles-popup/stunning_padding_bottom', $header_stunning_customize_styles, '125px' );
        $sh_bg_cover       = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_cover_picker/no/stunning_bg_cover', $header_stunning_customize_styles, 'no' );
        $sh_bg_color       = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_color', $header_stunning_customize_styles, '#FF5E3A' );
        $sh_bg_image       = fw_akg( 'yes/header-stunning-styles-popup/stunning_bg_image/data/css/background-image', $header_stunning_customize_styles, 'url(' . get_template_directory_uri() . '/images/header-stunning-1.png)' );
    } else {
        $sh_text_color     = fw_get_db_customizer_option( 'stunning_text_color', '#fff' );
        $sh_padding_top    = fw_get_db_customizer_option( 'stunning_padding_top', '125px' );
        $sh_padding_bottom = fw_get_db_customizer_option( 'stunning_padding_bottom', '125px' );
        $sh_bg_cover       = fw_get_db_customizer_option( 'stunning_bg_cover_picker/no/stunning_bg_cover', 'no' );
        $sh_bg_color       = fw_get_db_customizer_option( 'stunning_bg_color', '#FF5E3A' );
        $sh_bg_image       = fw_akg( 'data/css/background-image', fw_get_db_customizer_option( 'stunning_bg_image', '' ), 'url(' . get_template_directory_uri() . '/images/header-stunning-1.png)' );
    }

    if ( $sh_text_color ) {
        $css .= "#stunning-header {color:{$sh_text_color};}";
        $css .= "#stunning-header .stunning-header-content-wrap {color:{$sh_text_color};}";
        $css .= "#stunning-header .stunning-header-content-wrap * {color:{$sh_text_color};}";
    }

    if ( $sh_padding_top ) {
        $css .= "#stunning-header {padding-top:{$sh_padding_top};}";
    }

    if ( $sh_padding_bottom ) {
        $css .= "#stunning-header {padding-bottom:{$sh_padding_bottom};}";
    }

    if ( 'yes' === $sh_bg_cover ) {
        $css .= "#stunning-header .crumina-heading-background {background-size: cover;}";
    }

    if ( $sh_bg_image && $sh_bg_image !== 'none' ) {
        $css .= "#stunning-header .crumina-heading-background {background-image: " . $sh_bg_image . ";}";
    }

    if ( $sh_bg_color ) {
        $css .= "#stunning-header {background-color:{$sh_bg_color};}";
    }

    wp_add_inline_style( 'crumina-stunning-header', $css );
}