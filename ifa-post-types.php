<?php 
    // For AMP to work, you need to manually enable the cust post types in the amp plugin: 
    // https://ampforwp.com/tutorials/article/enable-custom-post-type-support-amp/
    // Note: WP Structured Data doesn't show up in cust post types. Tried this: https://wordpress.org/support/topic/plugin-not-working-for-custom-post-type/
    // doesn't quite work yet.
function ifa_post_types() {

    // Each register_post_type(...args) function call within this larger ifa_post_types() function 
    // registers a new post type and sets up its basic parameters. You can change the fields in the associative array(s)
    // that are passed into the registration function to further customize the post type. But he warned that doing so could 
    // cause strange behavior. Consult this: https://codex.wordpress.org/Function_Reference/register_post_type
    // ~ Michael Wedd, May 30th 2019.

    //  === PODCAST === 
    // replace archive with just a filtered page instead...?
    // categories not display on front end yet.
    register_post_type('podcast', array(
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'podcast'
        ),
        'public' => true, 
        'show_in_menu' => true,
        'show_in_rest' => true,
        'taxonomies'  => array( 'category', 'tag' ),
        'labels' => array(
            'name' => 'Podcast',
            'add_new_item' => 'Add Episode',
            'edit_item' => 'Edit Episode',
            'all_items' => 'All Episodes',
            'singular_name' => 'Episode'
        ), 
        'menu_icon' => 'dashicons-controls-volumeon'
     ));

    //  === PRESS RELEASE === 
    register_post_type('press_release', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'press-releases'
        ),
        'has_archive' => true,
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

    //  === WHITE PAPER === 
    register_post_type('white_paper', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'white-papers'
        ),
        'has_archive' => true,
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

    //  === SOLUTION === 
    register_post_type('solution', array(
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'revisions'),
        'rewrite' => array(
            'slug' => 'solutions'
        ),
        'has_archive' => true,
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
}

add_action('init', 'ifa_post_types');

?>
