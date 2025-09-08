<?php
/**
 * Generic page template
 * This file displays static pages like About and Contact
 */

// Include the header template
get_header(); 
?>

<!-- Main content area -->
<main class="main">
    <div class="container">
        
        <?php
        // Check if this is About page
        if (is_page('about')) : 
        ?>
        
        <!-- About page specific layout -->
        <?php
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
        ?>
        
        <section class="about-content">
            <h2>About Me</h2>
            <!-- Two-column layout: text content and profile image -->
            <div class="about-grid">
                <!-- Main about text content -->
                <div class="about-text">
                    <p>Hello! Welcome to my blog. I'm a passionate web developer who loves sharing knowledge about modern web technologies, best practices, and helpful tutorials.</p>
                    
                    <p>This blog was created to document my learning journey and to help others who are starting their path in web development. Here you'll find articles about HTML, CSS, JavaScript, and various web development topics.</p>
                    
                    <h3>What You'll Find Here</h3>
                    <ul>
                        <li>Beginner-friendly tutorials</li>
                        <li>Best practices and tips</li>
                        <li>Code examples and demos</li>
                        <li>Industry insights and trends</li>
                    </ul>
                    
                    <h3>My Skills</h3>
                    <!-- Skills displayed as styled badges -->
                    <div class="skills">
                        <span class="skill">HTML5</span>
                        <span class="skill">CSS3</span>
                        <span class="skill">JavaScript</span>
                        <span class="skill">Responsive Design</span>
                        <span class="skill">Git</span>
                        <span class="skill">Web Accessibility</span>
                    </div>
                </div>
                <!-- Profile image section -->
                <div class="about-image">
                    <img src="https://img-wrapper.vercel.app/image?url=https://placehold.co/300x400/6366f1/ffffff?text=Profile" alt="Profile picture">
                </div>
            </div>
        </section>
        
        <?php 
            endwhile;
        endif;
        ?>
        
        <?php elseif (is_page('contact')) : ?>
        
        <!-- Contact page specific layout -->
        <?php
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
        ?>
        
        <section class="contact-content">
            <h2>Get In Touch</h2>
            <p>Have a question or want to collaborate? I'd love to hear from you!</p>
            
            <!-- Two-column layout: contact form and contact info -->
            <div class="contact-grid">
                <!-- Contact form section -->
                <div class="contact-form-container">
                    <!-- Contact form with validation -->
                    <form class="contact-form" id="contactForm">
                        <!-- Name input field -->
                        <div class="form-group">
                            <label for="userName">Name</label>
                            <input type="text" id="userName" name="name" required>
                            <!-- Error message container (hidden by default) -->
                            <span class="error-message" id="nameError"></span>
                        </div>
                        
                        <!-- Email input field -->
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" id="userEmail" name="email" required>
                            <span class="error-message" id="emailError"></span>
                        </div>
                        
                        <!-- Message textarea field -->
                        <div class="form-group">
                            <label for="userMessage">Message</label>
                            <textarea id="userMessage" name="message" rows="5" required></textarea>
                            <span class="error-message" id="messageError"></span>
                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                    
                    <!-- Success message (shown after successful form submission) -->
                    <div class="success-message" id="successMessage">
                        <p>Thank you for your message! I'll get back to you soon.</p>
                    </div>
                </div>
                
                <!-- Contact information section -->
                <div class="contact-info">
                    <h3>Other Ways to Reach Me</h3>
                    <div class="contact-item">
                        <strong>Email:</strong>
                        <p>hello@myblog.com</p>
                    </div>
                    <div class="contact-item">
                        <strong>Social Media:</strong>
                        <p>Follow me on Twitter @myblog</p>
                    </div>
                    <div class="contact-item">
                        <strong>Response Time:</strong>
                        <p>I typically respond within 24-48 hours</p>
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
            endwhile;
        endif;
        ?>
        
        <?php else : ?>
        
        <!-- Generic page layout -->
        <?php
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
        ?>
        
        <article class="single-post">
            <h1><?php the_title(); ?></h1>
            
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-featured-image-container mb-4">
                    <?php the_post_thumbnail('large', array('class' => 'post-featured-image')); ?>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </article>
        
        <?php 
            endwhile;
        else : 
        ?>
        
        <div class="alert alert-warning">
            <h4>Page not found</h4>
            <p>Sorry, the requested page could not be found.</p>
            <a href="<?php echo home_url(); ?>" class="btn btn-primary">Return to Homepage</a>
        </div>
        
        <?php 
        endif;
        endif; 
        ?>
            
        </div> <!-- End of row -->
    </div> <!-- End of container -->
</main> <!-- End of main content -->

<?php
// Include the footer template
get_footer(); 
?>
