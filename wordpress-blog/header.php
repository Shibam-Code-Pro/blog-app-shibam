<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Basic page information -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- WordPress will automatically add the title tag and other head elements -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- WordPress hook for plugins and themes -->
<?php wp_body_open(); ?>

<!-- Header with navigation -->
<header class="header">
    <div class="container">
        <div class="logo">
            <?php
            // Check if custom logo is set
            if (has_custom_logo()) {
                // Display custom logo
                the_custom_logo();
            } else {
                // Display site title as text logo
                echo '<h1>My Blog</h1>';
            }
            ?>
        </div>
        <nav class="nav">
            <!-- Navigation menu list -->
            <?php
            // Display WordPress navigation menu
            wp_nav_menu(array(
                'theme_location' => 'primary', // Menu location defined in functions.php
                'menu_class'     => 'nav-list', // Custom class for styling
                'container'      => false, // Don't wrap in extra div
                'fallback_cb'    => 'my_static_blog_fallback_menu', // Fallback if no menu set
            ));
            ?>
            <!-- Mobile hamburger menu button (hidden on desktop) -->
            <button class="nav-toggle" id="navToggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>
</header>

<?php
/**
 * Fallback menu function
 * This creates a basic menu if no menu is set in WordPress admin
 */
function my_static_blog_fallback_menu() {
    $current_page = '';
    if (is_home() || is_front_page()) {
        $current_page = 'home';
    } elseif (is_page('about')) {
        $current_page = 'about';
    } elseif (is_page('contact')) {
        $current_page = 'contact';
    }
    
    echo '<ul class="nav-list">';
    echo '<li><a href="' . home_url() . '" class="nav-link' . ($current_page == 'home' ? ' active' : '') . '">Home</a></li>';
    echo '<li><a href="' . home_url('/about') . '" class="nav-link' . ($current_page == 'about' ? ' active' : '') . '">About</a></li>';
    echo '<li><a href="' . home_url('/contact') . '" class="nav-link' . ($current_page == 'contact' ? ' active' : '') . '">Contact</a></li>';
    echo '</ul>';
}
?>
