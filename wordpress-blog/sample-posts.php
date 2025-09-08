<?php
/**
 * Sample Content Creator for WordPress Theme
 * Run this file once to create sample posts and pages that match the static blog
 * 
 * INSTRUCTIONS:
 * 1. Upload this file to your WordPress root directory
 * 2. Visit: yoursite.com/sample-posts.php in your browser
 * 3. Delete this file after running it once
 */

// Include WordPress
require_once('wp-config.php');
require_once('wp-blog-header.php');

// Check if content already exists
$existing_posts = get_posts(array('numberposts' => 1));
if (!empty($existing_posts)) {
    echo "<h2>Sample content already exists!</h2>";
    echo "<p>It looks like you already have posts in your WordPress site.</p>";
    echo "<p><a href='" . home_url() . "'>Visit your site</a></p>";
    exit;
}

echo "<h1>Creating Sample Content...</h1>";

// Create sample blog posts matching the static blog
$posts_data = array(
    array(
        'title' => '10 Essential JavaScript Tips for Beginners',
        'content' => '<p>JavaScript is one of the most popular programming languages in the world, and for good reason. It\'s versatile, powerful, and essential for modern web development. Whether you\'re just starting out or looking to improve your skills, these 10 essential tips will help you write better JavaScript code and avoid common pitfalls.</p>

<h3>1. Use const and let instead of var</h3>
<p>Modern JavaScript provides <code>const</code> and <code>let</code> which have block scope, unlike <code>var</code> which has function scope. This helps prevent many common bugs.</p>

<h3>2. Understand Truthy and Falsy Values</h3>
<p>JavaScript has specific rules about what values are considered true or false in boolean contexts. Understanding these will help you write more reliable conditional statements.</p>

<h3>3. Use Arrow Functions Appropriately</h3>
<p>Arrow functions provide a concise syntax and lexical <code>this</code> binding, but they\'re not always the right choice. Learn when to use them and when to stick with regular functions.</p>

<h3>4. Master Array Methods</h3>
<p>Methods like <code>map()</code>, <code>filter()</code>, <code>reduce()</code>, and <code>forEach()</code> are incredibly powerful for working with arrays in a functional programming style.</p>

<h3>5. Handle Errors Properly</h3>
<p>Always use try-catch blocks for operations that might fail, and provide meaningful error messages to help with debugging.</p>

<p>These tips will set you on the right path to becoming a more effective JavaScript developer. Practice them regularly and you\'ll see improvement in your code quality.</p>',
        'excerpt' => 'Learn the most important JavaScript concepts that every beginner should know to write better code and avoid common mistakes.',
        'image_url' => 'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/4f46e5/ffffff?text=JavaScript+Tips'
    ),
    array(
        'title' => 'CSS Grid Layout: A Complete Guide',
        'content' => '<p>CSS Grid Layout is a powerful two-dimensional layout system that has revolutionized how we create web layouts. Unlike Flexbox, which is primarily one-dimensional, Grid allows you to work with both rows and columns simultaneously, making it perfect for complex layouts.</p>

<h3>What is CSS Grid?</h3>
<p>CSS Grid Layout is a CSS specification that provides a grid-based layout system with rows and columns, making it easier to design web pages without having to use floats and positioning.</p>

<h3>Basic Grid Concepts</h3>
<p>Before diving into code, it\'s important to understand the key concepts:</p>
<ul>
<li><strong>Grid Container:</strong> The parent element that has <code>display: grid</code></li>
<li><strong>Grid Items:</strong> The direct children of the grid container</li>
<li><strong>Grid Lines:</strong> The dividing lines that make up the structure of the grid</li>
<li><strong>Grid Tracks:</strong> The space between two adjacent grid lines</li>
</ul>

<h3>Creating Your First Grid</h3>
<p>To create a basic grid, you simply need to set <code>display: grid</code> on a container and define your columns and rows:</p>

<pre><code>.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 100px 200px;
  gap: 20px;
}</code></pre>

<h3>Advanced Grid Features</h3>
<p>Grid offers many advanced features like grid areas, auto-placement, and responsive design capabilities that make it incredibly versatile for modern web layouts.</p>

<p>CSS Grid is an essential skill for modern web developers. Start experimenting with it today and you\'ll quickly see how it can simplify your layout code.</p>',
        'excerpt' => 'Master CSS Grid with this comprehensive guide covering everything from basic concepts to advanced techniques for modern web layouts.',
        'image_url' => 'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/059669/ffffff?text=CSS+Grid'
    ),
    array(
        'title' => 'Building Responsive Websites in 2025',
        'content' => '<p>In 2025, responsive web design isn\'t just a nice-to-have feature—it\'s absolutely essential. With users accessing websites from an ever-growing variety of devices, from smartphones to ultrawide monitors, creating websites that adapt seamlessly to any screen size is crucial for user experience and business success.</p>

<h3>The Mobile-First Approach</h3>
<p>Start designing for the smallest screen first, then progressively enhance for larger screens. This approach ensures your site works well on mobile devices, which now account for over 50% of web traffic.</p>

<h3>Modern CSS Techniques</h3>
<p>Take advantage of modern CSS features that make responsive design easier:</p>
<ul>
<li><strong>CSS Grid and Flexbox:</strong> For flexible, responsive layouts</li>
<li><strong>Container Queries:</strong> Style elements based on their container size</li>
<li><strong>Clamp() Function:</strong> Create fluid typography that scales smoothly</li>
<li><strong>CSS Custom Properties:</strong> Make your responsive styles more maintainable</li>
</ul>

<h3>Performance Considerations</h3>
<p>Responsive design isn\'t just about layout—it\'s also about performance. Use responsive images, optimize for different connection speeds, and consider the user\'s context.</p>

<h3>Testing Across Devices</h3>
<p>Don\'t just rely on browser dev tools. Test on real devices whenever possible, and use tools like BrowserStack for comprehensive cross-device testing.</p>

<h3>Accessibility in Responsive Design</h3>
<p>Ensure your responsive design works for everyone by considering touch targets, readable font sizes, and proper contrast ratios across all screen sizes.</p>

<p>Building responsive websites in 2025 requires a combination of proven techniques and modern approaches. Focus on user experience, performance, and accessibility to create websites that truly work for everyone.</p>',
        'excerpt' => 'Explore the latest techniques and best practices for creating websites that look great on all devices and screen sizes.',
        'image_url' => 'https://img-wrapper.vercel.app/image?url=https://placehold.co/400x250/dc2626/ffffff?text=Responsive+Design'
    )
);

// Create the blog posts
foreach ($posts_data as $post_data) {
    $post_id = wp_insert_post(array(
        'post_title' => $post_data['title'],
        'post_content' => $post_data['content'],
        'post_excerpt' => $post_data['excerpt'],
        'post_status' => 'publish',
        'post_type' => 'post',
        'post_author' => 1
    ));
    
    if ($post_id) {
        echo "<p>✅ Created post: " . $post_data['title'] . "</p>";
        
        // Set featured image from URL (requires a plugin or custom function)
        // For now, we'll just note the image URL in post meta
        update_post_meta($post_id, '_featured_image_url', $post_data['image_url']);
    }
}

// Create About page
$about_content = '<h2>About Me</h2>
<p>Hello! Welcome to my blog. I\'m a passionate web developer who loves sharing knowledge about modern web technologies, best practices, and helpful tutorials.</p>

<p>This blog was created to document my learning journey and to help others who are starting their path in web development. Here you\'ll find articles about HTML, CSS, JavaScript, and various web development topics.</p>

<h3>What You\'ll Find Here</h3>
<ul>
<li>Beginner-friendly tutorials</li>
<li>Best practices and tips</li>
<li>Code examples and demos</li>
<li>Industry insights and trends</li>
</ul>

<h3>My Skills</h3>
<p>I specialize in front-end web development with expertise in:</p>
<ul>
<li><strong>HTML5</strong> - Semantic markup and accessibility</li>
<li><strong>CSS3</strong> - Modern styling and responsive design</li>
<li><strong>JavaScript</strong> - Interactive functionality and modern ES6+</li>
<li><strong>Responsive Design</strong> - Mobile-first, cross-device compatibility</li>
<li><strong>Git</strong> - Version control and collaboration</li>
<li><strong>Web Accessibility</strong> - Creating inclusive web experiences</li>
</ul>

<p>I believe in writing clean, maintainable code and staying up-to-date with the latest web development trends and best practices. When I\'m not coding, you can find me exploring new technologies, contributing to open-source projects, or sharing knowledge with the developer community.</p>

<p>Feel free to reach out if you have any questions or want to connect!</p>';

$about_id = wp_insert_post(array(
    'post_title' => 'About',
    'post_content' => $about_content,
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_author' => 1
));

if ($about_id) {
    echo "<p>✅ Created About page</p>";
}

// Create Contact page
$contact_content = '<h2>Get In Touch</h2>
<p>Have a question or want to collaborate? I\'d love to hear from you!</p>

<div class="row">
<div class="col-md-8">
<h3>Send Me a Message</h3>
<p>Use the contact information below to get in touch with me. I read every message and try to respond as quickly as possible.</p>

<div class="contact-form-placeholder" style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 20px 0;">
<p><strong>Contact Form</strong></p>
<p>To add a working contact form, you can:</p>
<ul>
<li>Install Contact Form 7 plugin</li>
<li>Use WordPress built-in contact functionality</li>
<li>Add a custom contact form</li>
</ul>
</div>

</div>

<div class="col-md-4">
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

<h3>Let\'s Connect</h3>
<p>Whether you have a question about web development, want to discuss a potential project, or just want to say hello, I\'m always happy to connect with fellow developers and enthusiasts.</p>

<p>I\'m particularly interested in:</p>
<ul>
<li>Web development collaborations</li>
<li>Open source projects</li>
<li>Speaking opportunities</li>
<li>Mentoring and knowledge sharing</li>
</ul>';

$contact_id = wp_insert_post(array(
    'post_title' => 'Contact',
    'post_content' => $contact_content,
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_author' => 1
));

if ($contact_id) {
    echo "<p>✅ Created Contact page</p>";
}

echo "<h2>✅ Sample Content Created Successfully!</h2>";
echo "<p>Your WordPress theme now has the same content as the static blog:</p>";
echo "<ul>";
echo "<li>3 Blog posts with the same titles and content</li>";
echo "<li>About page with your information</li>";
echo "<li>Contact page with contact details</li>";
echo "</ul>";

echo "<h3>Next Steps:</h3>";
echo "<ol>";
echo "<li><strong>Create a Menu:</strong> Go to Appearance > Menus and create a navigation menu</li>";
echo "<li><strong>Add Featured Images:</strong> Edit each post and set a featured image</li>";
echo "<li><strong>Customize:</strong> Go to Appearance > Customize to set your site title and tagline</li>";
echo "<li><strong>Delete this file:</strong> Remove sample-posts.php from your server for security</li>";
echo "</ol>";

echo "<p><a href='" . home_url() . "' style='background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;'>Visit Your Site</a></p>";
?>
