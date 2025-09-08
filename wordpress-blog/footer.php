<!-- Website footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p>&copy; <?php echo date('Y'); ?> My Blog. All rights reserved.</p>
                <?php
                // Display site description if available
                $site_description = get_bloginfo('description');
                if ($site_description) {
                    echo '<p class="site-description">' . $site_description . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to top button (appears when scrolling down) -->
<button class="scroll-to-top" id="scrollToTop" aria-label="Scroll to top">
    ↑
</button>

<!-- WordPress footer hook for plugins and scripts -->
<?php wp_footer(); ?>

<!-- Simple JavaScript for scroll to top button -->
<script>
// Wait for page to load
document.addEventListener('DOMContentLoaded', function() {
    // Get the scroll to top button
    const scrollButton = document.getElementById('scrollToTop');
    
    // Show/hide button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            // Show button when scrolled down 300px
            scrollButton.classList.add('show');
        } else {
            // Hide button when near top
            scrollButton.classList.remove('show');
        }
    });
    
    // Scroll to top when button is clicked
    scrollButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0, // Go to top of page
            behavior: 'smooth' // Smooth scrolling animation
        });
    });
});
</script>

</body>
</html>
