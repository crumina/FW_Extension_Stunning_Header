<?php

//Add prefixes to plugins tabs
add_filter( 'crumina_options_stunning_header_plugin_tab', '_filter_crumina_options_stunning_header_plugin_tab', 10, 2 );

function _filter_crumina_options_stunning_header_plugin_tab( $options, $tab ) {
    $filtered = array();
    
    foreach ( $options as $key => $option ) {
        if(isset($option['picker']) && is_string($option['picker'])){
            $option['picker'] = "{$tab}_{$option['picker']}";
        }
        $filtered["{$tab}_{$key}"] = $option;
    }
    
    return $filtered;
}

//Add options to metaboxes
add_filter( 'fw_post_options', '_filter_fw_ext_stunning_header_crumina_metabox', 999, 2 );
add_filter( 'fw_taxonomy_options', '_filter_fw_ext_stunning_header_crumina_metabox', 999, 2 );

function _filter_fw_ext_stunning_header_crumina_metabox( $options ) {
    $ext = fw_ext( 'stunning-header' );

    return array_merge( $options, $ext->get_options( 'metabox' ) );
}

//Add options to settings page
add_filter( 'fw_settings_options', '_filter_fw_ext_stunning_header_crumina_settings', 999, 1 );

function _filter_fw_ext_stunning_header_crumina_settings( $options ) {
    $ext = fw_ext( 'stunning-header' );

    return array_merge( $options, $ext->get_options( 'settings' ) );
}

//Add options to customizer
add_filter( 'fw_customizer_options', '_filter_fw_ext_stunning_header_crumina_customizer', 999, 1 );

function _filter_fw_ext_stunning_header_crumina_customizer( $options ) {
    $ext = fw_ext( 'stunning-header' );

    return array_merge( $options, $ext->get_options( 'customizer' ) );
}

//Render stunning header in page template
add_action( 'crumina_body_start', '_filter_fw_ext_stunning_header_render' );

function _filter_fw_ext_stunning_header_render() {
    $ext = fw_ext( 'stunning-header' );
    $ext->render();
}

