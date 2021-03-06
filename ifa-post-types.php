<?php 
/**
 * Plugin Name: IFA Custom Post Types 
 * Description: The plugin that bundles and manages the functionality of all of the custom post types IFA uses. 
 * Version: 1.2
 * Author: Michael Wedd
 * Author URI: https://www.iotforall.com/author/michaelwedd/
 * ======================================
 * Notes: For AMP to work, you need to manually enable the cust post types in the amp plugin: https://ampforwp.com/tutorials/article/enable-custom-post-type-support-amp/
 * WP Structured Data doesn't show up in cust post types. Tried this: https://wordpress.org/support/topic/plugin-not-working-for-custom-post-type/
 * doesn't quite work yet.
 */

function ifa_post_types() {
/**
 * Each register_post_type(...args) function call within this larger ifa_post_types() function 
 * registers a new post type and sets up its basic parameters. You can change the fields in the associative array(s)
 * that are passed into the registration function to further customize the post type. But be warned that doing so could 
 * cause strange behavior. Consult this: https://codex.wordpress.org/Function_Reference/register_post_type
 * ~ Michael Wedd, May 30th 2019.
 */

    /** ============= PODCAST ============= 
    */
    $podcast_labels = array(
        'name' => 'Podcast',
        'add_new_item' => 'Add Episode',
        'edit_item' => 'Edit Episode',
        'update_item' => 'Update Episode',
        'view_item' => 'View Episode', 
        'view_items' => 'View Podcast Episodes',
        'search_items' => 'Search Podcast Episodes',
        'not_found' => 'No Episodes Found',
        'not_found_in_trash' => 'No Episodes Found in Trash',
        'all_items' => 'All Episodes',
        'singular_name' => 'Episode'
    );

    register_post_type('podcast', array(
        'supports' => array('title', 'author', 'editor', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'podcast'
        ),
        'public' => true, 
        'show_in_menu' => true,
        'show_in_rest' => true,
        'taxonomies'  => array( 'category', 'tag' ),
        'labels' => $podcast_labels, 
        'menu_icon' => 'dashicons-controls-volumeon'
     ));

    /* ============= PROVIDER =============
     */

    $provider_labels = array(
        'name' => 'Provider',
        'add_new_item' => 'Add Provider',
        'edit_item' => 'Edit Provider',
        'update_item' => 'Update Provider',
        'view_item' => 'View This Provider', 
        'view_items' => 'View Providers',
        'search_items' => 'Search Providers',
        'not_found' => 'Provider Not Found',
        'not_found_in_trash' => 'Provider Not Found in Trash',
        'all_items' => 'All Providers',
        'singular_name' => 'Provider'
    );

    register_post_type('provider', array(
        'supports' => array('title', 'author', 'editor', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'provider'
        ),
        'public' => true, 
        'show_in_menu' => true,
        'show_in_rest' => true,
        'taxonomies'  => array( 'category', 'tag' ),
        'labels' => $provider_labels, 
        'menu_icon' => 'dashicons-groups'
     ));
     
    //  ============= SOLUTION ============= 
    register_post_type('solution', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'solutions'
        ),
        'public' => true, 
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Solution',
            'add_new_item' => 'Add Solution',
            'edit_item' => 'Edit Solution',
            'all_items' => 'All Solutions',
            'singular_name' => 'Solution'
        ), 
        'menu_icon' => 'dashicons-admin-network'
     ));

    //  ============= PRESS RELEASE ============= 
    register_post_type('press_release', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'press-releases'
        ),
        'public' => true, 
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Press Release',
            'add_new_item' => 'Add Press Release',
            'edit_item' => 'Edit Press Release',
            'all_items' => 'All Press Releases',
            'singular_name' => 'Press Release'
        ), 
        'menu_icon' => 'dashicons-media-document'
     ));

    //  ============= WHITE PAPER ============= 
    register_post_type('white_paper', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'white-papers'
        ),
        'public' => true, 
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'White Paper',
            'add_new_item' => 'Add White Paper',
            'edit_item' => 'Edit White Paper',
            'all_items' => 'All White Papers',
            'singular_name' => 'White Paper'
        ), 
        'menu_icon' => 'dashicons-book-alt'
     ));
}

add_action('init', 'ifa_post_types');
add_action('init', 'add_category_tags_to_providers');
 function add_category_tags_to_cpt() {
    register_taxonomy_for_object_type('category', 'provider');
    register_taxonomy_for_object_type('post_tag', 'provider');
}
?>