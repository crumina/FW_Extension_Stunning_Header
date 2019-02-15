<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = apply_filters( 'crumina_options_stunning_header_content', array(
    'stunning_title_show'       => array(
        'type'         => 'multi-picker',
        'label'        => false,
        'desc'         => false,
        'picker'       => array(
            'show' => array(
                'label'        => esc_html__( 'Show title', 'crumina' ),
                'type'         => 'switch',
                'value'        => 'yes',
                'left-choice'  => array(
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'crumina' ),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'crumina' ),
                ),
            ),
        ),
        'choices'      => array(
            'yes' => array(
                'title' => array(
                    'type'  => 'text',
                    'value' => '',
                    'label' => esc_html__( 'Custom title text', 'crumina' ),
                    'desc'  => esc_html__( 'Show post title, if that empty', 'crumina' ),
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'stunning_breadcrumbs_show' => array(
        'label'        => esc_html__( 'Show breadcrumbs', 'crumina' ),
        'type'         => 'switch',
        'value'        => 'yes',
        'left-choice'  => array(
            'value' => 'no',
            'label' => esc_html__( 'No', 'crumina' ),
        ),
        'right-choice' => array(
            'value' => 'yes',
            'label' => esc_html__( 'Yes', 'crumina' ),
        ),
    ),
    'stunning_text'             => array(
        'type'  => 'textarea',
        'label' => esc_html__( 'Text', 'crumina' ),
        'desc'  => esc_html__( 'You can use that\'s shortcodes: [weather zip="10002" country="us"]', 'crumina' ),
    ),
    'stunning_bottom_image'     => array(
        'type'        => 'upload',
        'label'       => esc_html__( 'Bottom image', 'crumina' ),
        'desc'        => esc_html__( 'Select one of images or upload your own pattern', 'crumina' ),
        'images_only' => true,
    ),
        ) );
