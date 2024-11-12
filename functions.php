<?php

/* running theme setup functions, such as enabling support for the title tag and so on */
add_action( 'after_setup_theme', 'mov_theme_setup' );
function mov_theme_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'wp_enqueue_scripts', 'mov_scripts' );
function mov_scripts() {
    wp_enqueue_style( 'mov-style', get_template_directory_uri() . '/dist/css/styles.min.css', array(), '1.0.1') ;
    wp_enqueue_script( 'mov-scripts', get_template_directory_uri() . '/dist/js/main.min.js', array(), '1.0.0' );

    wp_enqueue_script('jquery');
    wp_localize_script( 'jquery', 'ajax_data', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'load_more_nonce' )
    ) );
}


// Connecting files
include_once 'inc/register_post_types.php';
include 'inc/ajax-functions.php';

// Register  navigation menus
add_action( 'after_setup_theme', function () {
    register_nav_menus( [
        'headerMenu' => 'Header Menu',
        'FooterMenu' => 'Footer Menu',
    ] );
} );

add_filter( 'use_block_editor_for_post_type', '__return_false' );
if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Options',
        'menu_title' => 'Options',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ) );
}