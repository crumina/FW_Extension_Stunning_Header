<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = array(
    'stunning-header' => array(
        'title'    => esc_html__( 'Stunning header', 'crumina' ),
        'type'     => 'tab',
        'priority' => 'high',
        'options'  => array(
            'general'     => array(
                'title'    => esc_html__( 'General', 'crumina' ),
                'type'     => 'tab',
                'priority' => 'high',
                'options'  => apply_filters( 'crumina_options_stunning_header_plugin_tab', $ext->get_options( 'partials/settings-tab' ), 'general' ),
            ),
            'woocommerce' => array(
                'title'    => esc_html__( 'WooCommerce', 'crumina' ),
                'type'     => 'tab',
                'priority' => 'high',
                'options'  => apply_filters( 'crumina_options_stunning_header_plugin_tab', $ext->get_options( 'partials/settings-tab' ), 'woocommerce' ),
            ),
            'buddypress'  => array(
                'title'    => esc_html__( 'BuddyPress', 'crumina' ),
                'type'     => 'tab',
                'priority' => 'high',
                'options'  => apply_filters( 'crumina_options_stunning_header_plugin_tab', $ext->get_options( 'partials/settings-tab' ), 'buddypress' ),
            ),
            'events'      => array(
                'title'    => esc_html__( 'Events', 'crumina' ),
                'type'     => 'tab',
                'priority' => 'high',
                'options'  => apply_filters( 'crumina_options_stunning_header_plugin_tab', $ext->get_options( 'partials/settings-tab' ), 'events' ),
            ),
        ),
    ),
);
