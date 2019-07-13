<?php

function my_theme_enqueue_styles() {

    $parent_style = 'Newspaper'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

add_filter('wp_ulike_format_number','wp_ulike_new_format_number',10,3);
function wp_ulike_new_format_number($value, $num, $plus){
	if ($num >= 1000 && get_option('wp_ulike_format_number') == '1'):
	$value = round($num/1000, 2) . 'K';
	else:
	$value = $num;
	endif;
	return $value;
}

add_filter('template_redirect', 'template_redirect_filter',10,3);
function template_redirect_filter( $url, $term, $taxonomy ) {
   if ( is_category( 'podcast' ) ) {
       $url = site_url( '/podcast/' );
       wp_safe_redirect( $url, 301 );
       exit;
   }
   return $url;
}

add_filter('template_redirect', 'template_redirect_filter2',10,3);
function template_redirect_filter2( $url, $term, $taxonomy ) {
   if ( is_category( 'news' ) ) {
       $url = site_url( '/iot-press-releases/' );
       wp_safe_redirect( $url, 301 );
       exit;
   }
   return $url;
}

add_filter('template_redirect', 'template_redirect_filter3',10,3);
function template_redirect_filter3( $url, $term, $taxonomy ) {
   if ( is_category( 'ebooks' ) ) {
       $url = site_url( '/iot-ebooks/' );
       wp_safe_redirect( $url, 301 );
       exit;
   }
   return $url;
}
  
/**
 * This action adds jquery support to the theme, currently serving scripts from the directory listed below. These scripts all support the 
 * "IFA 2" templates. 
 * By: Michael Wedd, July 2019
 */
function add_provider_jquery_support() {
    wp_register_script('custom_script', home_url() . '/wp-content/themes/newspaper child theme/ifa_template_support/support_scripts.js', array( 'jquery' ));
    wp_enqueue_script('custom_script');
}  

add_action( 'wp_enqueue_scripts', 'add_provider_jquery_support' );
 
/**
 * Usage:
 * Paste a gist link into a blog post or page and it will be embedded eg:
 * https://gist.github.com/2926827
 *
 * If a gist has multiple files you can select one using a url in the following format:
 * https://gist.github.com/2926827?file=embed-gist.php
 */

wp_embed_register_handler( 'gist', '/https?:\/\/gist\.github\.com\/([a-z0-9]+)(\?file=.*)?/i', 'wp_embed_handler_gist' );
 
function wp_embed_handler_gist( $matches, $attr, $url, $rawattr ) {
 
	$embed = sprintf(
			'<script src="https://gist.github.com/%1$s.js%2$s"></script>',
			esc_attr($matches[1]),
			esc_attr($matches[2])
			);
 
	return apply_filters( 'embed_gist', $embed, $matches, $attr, $url, $rawattr );
}

/**
 * The below function enables you to display content to users depending on whether they're logged in or not. 
 * — Michael Wedd, February 2019
 */

add_shortcode( 'is_logged_in', 'ff_is_logged_in' );
function ff_is_logged_in () {
	return is_user_logged_in() ? 1 : 0;
}
 
?>