<?php
function montheme_supports () {
    add_theme_support( 'title-tag' );
}

function montheme_register_assets () {
    wp_enqueue_style('style', get_stylesheet_uri());
}


function montheme_title_separator () {
    return '|';
}

function montheme_document_title_parts ($title) {
    return $title;
}

add_action('wp_enqueue_scripts', 'montheme_register_assets');
add_action('after_setup_theme', 'montheme_supports');
add_filter('document_title_separator', 'montheme_title_separator');
add_filter('document_title_separator', 'montheme_document_title_parts');