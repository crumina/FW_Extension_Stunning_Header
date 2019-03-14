<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = array(
    'stunning-header' => array(
        'title'    => esc_html__( 'Stunning header', 'crumina' ),
        'type'     => 'box',
        'priority' => 'high',
        'options'  => array(
            'header-stunning-visibility' => $ext->get_options( 'partials/visibility' ), // header-stunning-visibility
            'header-stunning-show-default-title' => array(
                'type'    => 'multi-picker',
                'picker'  => 'header-stunning-visibility',
                'choices' => array(
                    'no' => array(
                        'status' => array(
                            'type'    => 'radio',
                            'value'   => 'yes',
                            'label'   => esc_html__( 'Show page title', 'crumina' ),
                            'choices' => array(
                                'yes' => esc_html__( 'Yes', 'crumina' ),
                                'no'  => esc_html__( 'No', 'crumina' ),
                            ),
                            'inline'  => true,
                        )
                    ),
                )
            ),
            'header-stunning-customize'          => array(
                'type'    => 'multi-picker',
                'picker'  => 'header-stunning-visibility',
                'choices' => array(
                    'yes' => array(
                        'header-stunning-customize-content' => array(
                            'type'    => 'multi-picker',
                            'label'   => false,
                            'desc'    => false,
                            'picker'  => array(
                                'customize' => array(
                                    'label'        => esc_html__( 'Customize content', 'crumina' ),
                                    'type'         => 'switch',
                                    'value'        => 'no',
                                    'left-choice'  => array(
                                        'value' => 'no',
                                        'label' => esc_html__( 'No', 'crumina' ),
                                    ),
                                    'right-choice' => array(
                                        'value' => 'yes',
                                        'label' => esc_html__( 'Yes', 'crumina' ),
                                    ),
                                )
                            ),
                            'choices' => array(
                                'yes' => array(
                                    'header-stunning-content-popup' => array(
                                        'type'          => 'popup',
                                        'label'         => esc_html__( 'Custom Content', 'crumina' ),
                                        'desc'          => esc_html__( 'Change custom content for this page', 'crumina' ),
                                        'button'        => esc_html__( 'Change Content', 'crumina' ),
                                        'size'          => 'medium',
                                        'popup-options' => $ext->get_options( 'partials/content' )
                                    ),
                                ),
                            ),
                        ),
                        'header-stunning-customize-styles'  => array(
                            'type'    => 'multi-picker',
                            'label'   => false,
                            'desc'    => false,
                            'picker'  => array(
                                'customize' => array(
                                    'label'        => esc_html__( 'Customize styles', 'crumina' ),
                                    'type'         => 'switch',
                                    'value'        => 'no',
                                    'left-choice'  => array(
                                        'value' => 'no',
                                        'label' => esc_html__( 'No', 'crumina' ),
                                    ),
                                    'right-choice' => array(
                                        'value' => 'yes',
                                        'label' => esc_html__( 'Yes', 'crumina' ),
                                    ),
                                )
                            ),
                            'choices' => array(
                                'yes' => array(
                                    'header-stunning-styles-popup' => array(
                                        'type'          => 'popup',
                                        'label'         => esc_html__( 'Custom Styles', 'crumina' ),
                                        'desc'          => esc_html__( 'Change custom styles for this page', 'crumina' ),
                                        'button'        => esc_html__( 'Change Styles', 'crumina' ),
                                        'size'          => 'medium',
                                        'popup-options' => $ext->get_options( 'partials/styles' )
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);

