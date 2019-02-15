<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$ext = fw_ext( 'stunning-header' );

$options = array(
    'header-stunning-visibility' => $ext->get_options( 'partials/visibility' ), // header-stunning-visibility
    'header-stunning-customize'  => array(
        'type'    => 'multi-picker',
        'picker'  => 'header-stunning-visibility',
        'choices' => array(
            'yes' => array(
                $ext->get_options( 'partials/content' )
            )
        )
    )
);
