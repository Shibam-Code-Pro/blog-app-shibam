<?php
/**
 * My Static Blog WordPress Theme Functions
 * 
 * This file contains all the PHP functions needed for the WordPress theme
 * It handles loading Bootstrap, theme support, and other WordPress features
 */

// Prevent direct access to this file
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ===== ENQUEUE STYLES AND SCRIPTS =====
 * This function loads Bootstrap CSS/JS and our theme styles/scripts
 */
function my_static_blog_enqueue_assets() {
    // Load Bootstrap 5 CSS from CDN
    wp_enqueue_style(
        'bootstrap-css', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        array(), // No dependencies
        '5.3.0' // Version number
    );
    
    // Load our theme's main stylesheet
    wp_enqueue_style(
        'theme-style', 
        get_stylesheet_uri(), // Gets the style.css file
        array('bootstrap-css'), // Load after Bootstrap
        '1.0' // Version number
    );
    
    // Load Bootstrap 5 JavaScript from CDN
    wp_enqueue_script(
        'bootstrap-js', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array(), // No dependencies
        '5.3.0', // Version number
        true // Load in footer
    );
    
    // Load our theme's JavaScript file
    wp_enqueue_script(
        'theme-js', 
        get_template_directory_uri() . '/js/main.js',
        array(), // No dependencies
        '1.0.0', // Version number
        true // Load in footer
    );
}
// Hook the function to WordPress
add_action('wp_enqueue_scripts', 'my_static_blog_enqueue_assets');

/**
 * ===== THEME SETUP =====
 * This function adds support for WordPress features
 */
function my_static_blog_theme_setup() {
    // Add support for post thumbnails (featured images)
    add_theme_support('post-thumbnails');
    
    // Add support for custom menus
    add_theme_support('menus');
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add support for title tag (WordPress will manage the <title> tag)
    add_theme_support('title-tag');
    
    // Register navigation menu locations
    register_nav_menus(array(
        'primary' => 'Primary Navigation Menu', // Main navigation menu
    ));
}
// Hook the function to WordPress
add_action('after_setup_theme', 'my_static_blog_theme_setup');

/**
 * ===== CUSTOM EXCERPT LENGTH =====
 * This function controls how long the post excerpts are
 */
function my_static_blog_excerpt_length($length) {
    return 25; // Show 25 words in excerpts
}
// Hook the function to WordPress
add_filter('excerpt_length', 'my_static_blog_excerpt_length');

/**
 * ===== CUSTOM EXCERPT MORE TEXT =====
 * This function changes the "..." at the end of excerpts
 */
function my_static_blog_excerpt_more($more) {
    return '...'; // Simple three dots
}
// Hook the function to WordPress
add_filter('excerpt_more', 'my_static_blog_excerpt_more');

/**
 * ===== REGISTER SIDEBAR =====
 * This function creates a sidebar widget area
 */
function my_static_blog_register_sidebar() {
    register_sidebar(array(
        'name'          => 'Blog Sidebar', // Name shown in admin
        'id'            => 'blog-sidebar', // ID used in templates
        'description'   => 'Sidebar for blog posts and pages',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
// Hook the function to WordPress
add_action('widgets_init', 'my_static_blog_register_sidebar');

/**
 * ===== CUSTOM LOGO SUPPORT =====
 * This function adds support for custom logo in WordPress customizer
 */
function my_static_blog_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100, // Maximum height
        'width'       => 400, // Maximum width
        'flex-height' => true, // Allow flexible height
        'flex-width'  => true, // Allow flexible width
    ));
}
// Hook the function to WordPress
add_action('after_setup_theme', 'my_static_blog_custom_logo_setup');

/**
 * ===== PAGINATION FUNCTION =====
 * This function creates pagination for blog posts
 */
function my_static_blog_pagination() {
    // Get pagination links
    $pagination_links = paginate_links(array(
        'type' => 'array', // Return as array
        'prev_text' => '&laquo; Previous', // Previous button text
        'next_text' => 'Next &raquo;', // Next button text
    ));
    
    // If we have pagination links, display them
    if ($pagination_links) {
        echo '<nav class="blog-pagination mt-4">';
        echo '<ul class="pagination justify-content-center">';
        
        foreach ($pagination_links as $link) {
            // Add Bootstrap classes to pagination links
            $link = str_replace('page-numbers', 'page-link', $link);
            echo '<li class="page-item">' . $link . '</li>';
        }
        
        echo '</ul>';
        echo '</nav>';
    }
}

/**
 * ===== BREADCRUMB FUNCTION =====
 * This function creates breadcrumb navigation
 */
function my_static_blog_breadcrumbs() {
    // Only show breadcrumbs if not on homepage
    if (!is_home() && !is_front_page()) {
        echo '<nav class="breadcrumb-nav mb-3">';
        echo '<ol class="breadcrumb">';
        
        // Home link
        echo '<li class="breadcrumb-item"><a href="' . home_url() . '">Home</a></li>';
        
        // Current page
        if (is_single()) {
            echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        } elseif (is_category()) {
            echo '<li class="breadcrumb-item active">Category: ' . single_cat_title('', false) . '</li>';
        }
        
        echo '</ol>';
        echo '</nav>';
    }
}
?>
