<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(
    'type'    => 'radio',
    'value'   => 'default',
    'label'   => esc_html__( 'Show stunning header', 'crumina' ),
    'choices' => array(
        'default' => esc_html__( 'Default', 'crumina' ),
        'yes'     => esc_html__( 'Yes', 'crumina' ),
        'no'      => esc_html__( 'No', 'crumina' ),
    ),
    
    'inline'  => true,
);
