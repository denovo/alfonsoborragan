<?php
/**
 * Custom post type definitions for News and Portfolio Artworks
 */


/*
*  1. Setup custom post type for homepage slider images
*/
function homepage_images_register_post_type() {
    // set label names
    $labels = array(
      'name' => 'homepageimages',
      'singular_name' => 'Homepage Image',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Homepage Image',
      'edit_item' => 'Edit Homepage Images',
      'new_item' => 'New Homepage Image',
      'all_items' => 'All Homepage Images',
      'view_item' => 'View Homepage Image',
      'search_items' => 'Search Homepage Images',
      'not_found' =>  'No Homepage Images found',
      'not_found_in_trash' => 'No Homepage Images found in Trash',
      'parent_item_colon' => '',
      'menu_name' => 'Homepage Images'
    );

    // arguments for registering the homepageimages post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        '_builtin' => false,
        'rewrite' => array( 'slug' => 'homepageimages', 'with_front' => true ),
        'supports' => array('title', 'editor', 'author','thumbnail'),
        'menu_icon' => 'dashicons-format-gallery',
        'show_in_menu' => true,
        'menu_position' => 2
        );

    register_post_type( 'homepageimages' , $args );
    flush_rewrite_rules( false );
}
add_action('init', 'homepage_images_register_post_type');




/*
*  1. Setup custom post type for News
*/
function news_register_post_type() {
    // set label names
    $labels = array(
      'name' => 'News',
      'singular_name' => 'News Item',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New News or Events',
      'edit_item' => 'Edit News',
      'new_item' => 'New News',
      'all_items' => 'All News Items',
      'view_item' => 'View News',
      'search_items' => 'Search News',
      'not_found' =>  'No News Stories found',
      'not_found_in_trash' => 'No News found in Trash',
      'parent_item_colon' => '',
      'menu_name' => 'News / Events'
    );
    // arguments for registering the news post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'query_var' => true,
        '_builtin' => false,
        'rewrite' => array( 'slug' => 'news', 'with_front' => true ),
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
        'menu_icon' => 'dashicons-format-chat',
        'show_in_menu' => true,
        'menu_position' => 3

        );

    register_post_type( 'news' , $args );
    flush_rewrite_rules( false );
}
add_action('init', 'news_register_post_type');





/*
*  2. Setup custom post type for Artworks
*/
function artworks_register_post_type() {
    // set label names
    $labels = array(
      'name' => 'Portfolio Artworks',
      'singular_name' => 'Portfolio Artwork',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Portfolio Artwork',
      'edit_item' => 'Edit Portfolio Artwork',
      'new_item' => 'New Portfolio Artwork',
      'all_items' => 'All Portfolio Artworks',
      'view_item' => 'View Portfolio Artworks',
      'search_items' => 'Search Portfolio Artworks',
      'not_found' =>  'No Portfolio Artworks found',
      'not_found_in_trash' => 'No Portfolio Artworks found in Trash',
      'parent_item_colon' => '',
      'menu_name' => 'Artworks'
    );
    // arguments for registering the announcements post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'query_var' => true,
        '_builtin' => false,
        'rewrite' => array( 'slug' => 'artworks', 'with_front' => true ),
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
        'taxonomies' => array('artworks_tag'),
        'menu_icon' => 'dashicons-art',
        'show_in_menu' => true,
        'menu_position' => 4
        );

    register_post_type( 'artworks' , $args );
    flush_rewrite_rules( false );


}
add_action('init', 'artworks_register_post_type');






?>