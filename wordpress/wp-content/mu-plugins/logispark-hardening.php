<?php
/**
 * LogiSpark security hardening — loaded automatically as must-use plugin.
 */

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Hide WordPress version from <head> and feeds
remove_action( 'wp_head', 'wp_generator' );
add_filter( 'the_generator', '__return_empty_string' );

// Disable comments sitewide
add_action( 'init', function () {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
} );

add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open',    '__return_false', 20 );
add_filter( 'comments_array', '__return_empty_array', 10 );

// Remove comments from admin menu
add_action( 'admin_menu', function () {
    remove_menu_page( 'edit-comments.php' );
} );

// Remove comments from admin bar
add_action( 'wp_before_admin_bar_render', function () {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'comments' );
} );
