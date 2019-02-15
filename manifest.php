<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]         = esc_html__( 'Stunning header', 'crumina' );
$manifest[ 'description' ]  = esc_html__( 'Stunning header.', 'crumina' );
$manifest[ 'github_repo' ]  = 'https://github.com/crumina/FW_Extension_Stunning_Header';
$manifest[ 'thumbnail' ]    = plugins_url( 'unyson/framework/extensions/stunning-header/static/img/thumbnail.png' );
$manifest[ 'version' ]      = '1.0.10';
$manifest[ 'display' ]      = true;
$manifest[ 'standalone' ]   = false;
$manifest[ 'requirements' ] = array(
    'extensions' => array(
        'breadcrumbs' => array(),
    )
);
