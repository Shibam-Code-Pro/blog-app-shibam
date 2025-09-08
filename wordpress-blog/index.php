<?php
/**
 * Main blog listing page template
 * This file displays the list of blog posts on the homepage
 */

// Include the header template
get_header(); 
?>

<!-- Main content area -->
<main class="main">
    <div class="container">
        <!-- Hero section with welcome message -->
        <section class="hero">
            <h1>Welcome to My Blog</h1>
            <p>Discover amazing articles about web development, design, and technology</p>
        </section>

        <!-- Blog posts grid section -->
        <section class="blog-grid">
            <h3>Latest Posts</h3>
            <!-- Container for all blog post cards -->
            <div class="posts-container">
                <?php
                // ===== WORDPRESS LOOP =====
                // This is the main WordPress loop that gets and displays posts
                if (have_posts()) : 
                    // Loop through each post
                    while (have_posts()) : the_post(); 
                ?>
                
                <!-- Sample Post - Each post is wrapped in an article tag -->
                <article class="post-card">
                    <!-- Post image container -->
                    <div class="post-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php else : ?>
                            <!-- Use exact same placeholder images as static blog -->
                            <?php 
                            $post_id = get_the_ID();
                            $image_urls = array(
                                'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/4f46e5/ffffff?text=JavaScript+Tips',
                                'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/059669/ffffff?text=CSS+Grid',
                                'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/dc2626/ffffff?text=Responsive+Design'
                            );
                            $image_index = ($post_id - 1) % 3;
                            ?>
                            <img src="<?php echo $image_urls[$image_index]; ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                    </div>
                    <!-- Post text content -->
                    <div class="post-content">
                        <h3><?php the_title(); ?></h3>
                        <p class="post-excerpt"><?php the_excerpt(); ?></p>
                        <!-- Link to full post with URL parameter -->
                        <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    </div>
                </article>
                
                <?php 
                    endwhile; // End of the post loop
                else : 
                    // If no posts are found, show this message
                ?>
                
                <div class="alert alert-info text-center">
                    <h4>No posts found</h4>
                    <p>There are no blog posts to display yet. Please check back later!</p>
                </div>
                
                <?php endif; // End of the main WordPress loop ?>
                
            </div> <!-- End of posts-container -->
        </section> <!-- End of blog posts section -->
        
    </div> <!-- End of container -->
</main> <!-- End of main content -->

<?php
// Include the footer template
get_footer(); 
?>
