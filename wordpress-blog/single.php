<?php
/**
 * Single blog post template
 * This file displays individual blog posts with full content
 */

// Include the header template
get_header(); 
?>

<!-- Main content area -->
<main class="main">
    <div class="container">
        
        
        <!-- Two-column layout: main content and sidebar -->
        <div class="post-layout">
            <!-- Main post content area -->
            <article class="post-main">
                
                <?php
                // ===== WORDPRESS LOOP FOR SINGLE POST =====
                // Check if we have a post to display
                if (have_posts()) : 
                    while (have_posts()) : the_post(); 
                ?>
                
                <!-- Post title -->
                <h2><?php the_title(); ?></h2>
                
                <!-- Post metadata: date and author -->
                <div class="post-meta">
                    <span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>
                    <span class="post-author">By Blog Author</span>
                </div>
                
                <!-- Featured image for the post -->
                <div class="post-image-full">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else : ?>
                        <!-- Use same images as homepage based on post title -->
                        <?php 
                        $title = get_the_title();
                        if (strpos($title, 'JavaScript') !== false) {
                            echo '<img src="https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/4f46e5/ffffff?text=JavaScript+Tips" alt="JavaScript Tips">';
                        } elseif (strpos($title, 'CSS') !== false) {
                            echo '<img src="https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/059669/ffffff?text=CSS+Grid" alt="CSS Grid">';
                        } else {
                            echo '<img src="https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/dc2626/ffffff?text=Responsive+Design" alt="Responsive Design">';
                        }
                        ?>
                    <?php endif; ?>
                </div>
                
                <!-- Main post content text -->
                <div class="post-text">
                    <?php 
                    $title = get_the_title();
                    if (strpos($title, 'JavaScript') !== false) {
                        echo '<p>JavaScript is one of the most popular programming languages in the world, and for good reason. It\'s versatile, powerful, and essential for modern web development. If you\'re just starting your JavaScript journey, here are 10 essential tips that will help you write better code and avoid common pitfalls.</p>';
                        echo '<h3>1. Use \'let\' and \'const\' instead of \'var\'</h3>';
                        echo '<p>Modern JavaScript provides \'let\' and \'const\' which have block scope, unlike \'var\' which has function scope. This helps prevent many common bugs related to variable hoisting and scope confusion.</p>';
                        echo '<h3>2. Understand the difference between \'==\' and \'===\'</h3>';
                        echo '<p>Always use strict equality (===) unless you specifically need type coercion. This prevents unexpected behavior when comparing values of different types.</p>';
                        echo '<h3>3. Learn array methods like map, filter, and reduce</h3>';
                        echo '<p>These functional programming methods make your code more readable and help you avoid traditional for loops in many cases.</p>';
                        echo '<p>By following these tips and practicing regularly, you\'ll become a more confident JavaScript developer. Remember, the key to mastering JavaScript is consistent practice and building real projects.</p>';
                    } elseif (strpos($title, 'CSS') !== false) {
                        echo '<p>CSS Grid is a powerful layout system that allows you to create complex, responsive layouts with ease. Unlike Flexbox, which is primarily one-dimensional, Grid is designed for two-dimensional layouts.</p>';
                        echo '<h3>Getting Started with Grid</h3>';
                        echo '<p>To create a grid container, simply apply \'display: grid\' to an element. Then you can define your grid structure using properties like \'grid-template-columns\' and \'grid-template-rows\'.</p>';
                        echo '<h3>Grid Template Areas</h3>';
                        echo '<p>One of the most intuitive features of CSS Grid is the ability to name grid areas and place items using those names. This makes your CSS more readable and maintainable.</p>';
                        echo '<h3>Responsive Grid Layouts</h3>';
                        echo '<p>Grid makes creating responsive layouts incredibly easy with features like \'repeat()\', \'minmax()\', and \'auto-fit\'. You can create layouts that adapt to different screen sizes without media queries.</p>';
                        echo '<p>CSS Grid is supported in all modern browsers and is the future of web layout. Start experimenting with it today and see how it can simplify your CSS.</p>';
                    } else {
                        echo '<p>Responsive web design is no longer optional—it\'s essential. With the variety of devices and screen sizes available today, your website must provide a great experience across all platforms.</p>';
                        echo '<h3>Mobile-First Approach</h3>';
                        echo '<p>Start designing for mobile devices first, then progressively enhance for larger screens. This approach ensures your site works well on the most constrained devices.</p>';
                        echo '<h3>Flexible Grid Systems</h3>';
                        echo '<p>Use CSS Grid and Flexbox to create layouts that adapt to different screen sizes. These modern layout methods provide much more flexibility than traditional float-based layouts.</p>';
                        echo '<h3>Responsive Images</h3>';
                        echo '<p>Implement responsive images using the \'srcset\' attribute and \'picture\' element to serve appropriate image sizes for different devices, improving performance and user experience.</p>';
                        echo '<h3>Touch-Friendly Design</h3>';
                        echo '<p>Ensure interactive elements are large enough for touch interaction (minimum 44px) and provide adequate spacing between clickable elements.</p>';
                        echo '<p>By following these principles and testing across multiple devices, you\'ll create websites that work beautifully everywhere.</p>';
                    }
                    ?>
                </div>
                
            </article>
                
                <?php 
                    endwhile; // End of post loop
                else : 
                    // If no post is found
                ?>
                
                <div class="alert alert-warning">
                    <h4>Post not found</h4>
                    <p>Sorry, the requested post could not be found.</p>
                    <a href="<?php echo home_url(); ?>" class="btn btn-primary">Return to Homepage</a>
                </div>
                
                <?php endif; // End of WordPress loop ?>
                
            <!-- Sidebar with categories, tags, and recent posts -->
            <aside class="sidebar">
                
                <!-- Categories widget -->
                <div class="widget">
                    <h4>Categories</h4>
                    <ul class="category-list">
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">JavaScript</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Tutorials</a></li>
                    </ul>
                </div>
                
                <!-- Tags widget -->
                <div class="widget">
                    <h4>Tags</h4>
                    <div class="tag-list">
                        <span class="tag">HTML</span>
                        <span class="tag">CSS</span>
                        <span class="tag">JavaScript</span>
                        <span class="tag">Responsive</span>
                        <span class="tag">Grid</span>
                        <span class="tag">Flexbox</span>
                    </div>
                </div>
                
                <!-- Recent posts widget -->
                <div class="widget">
                    <h4>Recent Posts</h4>
                    <ul class="recent-posts">
                        <li><a href="#">10 Essential JavaScript Tips for Beginners</a></li>
                        <li><a href="#">CSS Grid Layout: A Complete Guide</a></li>
                        <li><a href="#">Building Responsive Websites in 2025</a></li>
                    </ul>
                </div>
                
            </aside>
            
        </div> <!-- End of row -->
    </div> <!-- End of container -->
</main> <!-- End of main content -->

<?php
// Include the footer template
get_footer(); 
?>
