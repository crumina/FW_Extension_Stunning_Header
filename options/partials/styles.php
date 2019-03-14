<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = apply_filters( 'crumina_options_stunning_header_styles', array(
    'stunning_padding_top'       => array(
        'type'  => 'text',
        'value' => '125px',
        'label' => esc_html__( 'Padding from Top', 'crumina' ),
    ),
    'stunning_padding_bottom'    => array(
        'type'  => 'text',
        'value' => '125px',
        'label' => esc_html__( 'Padding from Bottom', 'crumina' ),
    ),
    'stunning_bg_color'          => array(
        'type'  => 'color-picker',
        'value' => '#eeeeee',
        'label' => esc_html__( 'Background Color', 'crumina' ),
        'desc'  => esc_html__( 'If you choose no image to display - that color will be set as background', 'crumina' ),
        'help'  => esc_html__( 'Click on field to choose color or clear field for default value', 'crumina' ),
    ),
    'stunning_bg_image'          => array(
        'type'    => 'background-image',
        'value'   => 'none',
        'label'   => esc_html__( 'Background image', 'crumina' ),
        'desc'    => esc_html__( 'Select one of images or upload your own pattern', 'crumina' ),
        'choices' => array(
            'none' => array(
                'icon' => $ext->locate_URI( '/static/img/bg-none.png' ),
                'css'  => array(
                    'background-image' => "none",
                ),
            )
        )
    ),
    'stunning_bg_animate_picker' => array(
        'type'    => 'multi-picker',
        'label'   => false,
        'desc'    => false,
        'picker'  => array(
            'stunning_bg_animate' => array(
                'label'        => esc_html__( 'Animate background?', 'crumina' ),
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
        'choices' => array(
            'yes' => array(
                'stunning_bg_animate_type' => array(
                    'type'    => 'radio',
                    'value'   => 'top-to-bottom',
                    'label'   => esc_html__( 'Animate type', 'crumina' ),
                    'choices' => array(
                        'right-to-left' => esc_html__( 'Right to left', 'crumina' ),
                        'left-to-right' => esc_html__( 'Left to right', 'crumina' ),
                        'top-to-bottom' => esc_html__( 'Top to bottom', 'crumina' ),
                    ),
                    'inline'  => true,
                )
            ),
            'no'  => array(
                'stunning_bg_cover' => array(
                    'type'         => 'switch',
                    'label'        => esc_html__( 'Expand background', 'crumina' ),
                    'desc'         => esc_html__( 'Don\'t repeat image and expand it to full section background', 'crumina' ),
                    'value'        => 'no',
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
        )
    ),
    'stunning_text_color'        => array(
        'type'  => 'color-picker',
        'label' => esc_html__( 'Text Color', 'crumina' ),
        'help'  => esc_html__( 'Click on field to choose color or clear field for default value', 'crumina' ),
    ),
    'stunning_text_align'        => array(
        'type'    => 'radio',
        'value'   => 'stunning-header--content-left',
        'label'   => esc_html__( 'Text align', 'crumina' ),
        'choices' => array(
            'stunning-header--content-left'   => esc_html__( 'Left', 'crumina' ),
            'stunning-header--content-center' => esc_html__( 'Center', 'crumina' ),
            'stunning-header--content-right'  => esc_html__( 'Right', 'crumina' ),
        ),
        'inline'  => true,
    )
        ) );
