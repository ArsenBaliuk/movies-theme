<?php
// Creating a post type "Movies"
add_action( 'init', 'create_movies_type' );
function create_movies_type() {
    $labels = array(
        'name'               => 'Movies',
        'singular_name'      => 'Movie',
        'menu_name'          => 'Movies',
        'all_items'          => 'All Movies',
        'view_item'          => 'View Movie',
        'add_new_item'       => 'Add New Movie',
        'add_new'            => 'Add Movie',
        'edit_item'          => 'Edit Movie',
        'update_item'        => 'Update Movie',
        'search_items'       => 'Search Movies',
        'not_found'          => 'Not Found',
        'not_found_in_trash' => 'Not found in Trash',
    );

    // Setting parameters for the type of record "Movies"
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'thumbnail' ),
        'public'      => true,
        'menu_icon'   => 'dashicons-format-video',
        'has_archive' => true,
        'revision'    => true,
        'menu_position' => 4,
    );

    // Registration of the post type "Movies"
    register_post_type( 'movies', $args );
}


// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'create_movies_category_custom_taxonomy' );
function create_movies_category_custom_taxonomy() {

    $labels = array(
        'name' => 'Categories',
        'singular_name' => 'Category',
        'search_items' =>  'Search Categories',
        'all_items' => 'Categories',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );

    register_taxonomy( 'movies_category', array( 'movies' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'movies_category' ),
    ));
}