-- Sample WordPress Content for Blog Theme
-- This SQL creates the exact same content as the static blog

-- Insert sample blog posts
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_type, post_content_filtered) VALUES
(1, NOW(), UTC_TIMESTAMP(), 
'<p>JavaScript is one of the most popular programming languages in the world, and for good reason. It\'s versatile, powerful, and essential for modern web development. Whether you\'re just starting out or looking to improve your skills, these 10 essential tips will help you write better JavaScript code and avoid common pitfalls.</p>

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
'10 Essential JavaScript Tips for Beginners', 
'Learn the most important JavaScript concepts that every beginner should know to write better code and avoid common mistakes.',
'publish', 'open', 'open', '10-essential-javascript-tips-beginners', 'post', ''),

(1, NOW(), UTC_TIMESTAMP(), 
'<p>CSS Grid Layout is a powerful two-dimensional layout system that has revolutionized how we create web layouts. Unlike Flexbox, which is primarily one-dimensional, Grid allows you to work with both rows and columns simultaneously, making it perfect for complex layouts.</p>

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
'CSS Grid Layout: A Complete Guide', 
'Master CSS Grid with this comprehensive guide covering everything from basic concepts to advanced techniques for modern web layouts.',
'publish', 'open', 'open', 'css-grid-layout-complete-guide', 'post', ''),

(1, NOW(), UTC_TIMESTAMP(), 
'<p>In 2025, responsive web design isn\'t just a nice-to-have feature—it\'s absolutely essential. With users accessing websites from an ever-growing variety of devices, from smartphones to ultrawide monitors, creating websites that adapt seamlessly to any screen size is crucial for user experience and business success.</p>

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
'Building Responsive Websites in 2025', 
'Explore the latest techniques and best practices for creating websites that look great on all devices and screen sizes.',
'publish', 'open', 'open', 'building-responsive-websites-2025', 'post', '');

-- Insert About page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_type, post_content_filtered) VALUES
(1, NOW(), UTC_TIMESTAMP(), 
'<h2>About Me</h2>
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

<p>Feel free to reach out if you have any questions or want to connect!</p>', 
'About', 
'Learn more about me and what this blog is all about.',
'publish', 'closed', 'closed', 'about', 'page', '');

-- Insert Contact page
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_name, post_type, post_content_filtered) VALUES
(1, NOW(), UTC_TIMESTAMP(), 
'<h2>Get In Touch</h2>
<p>Have a question or want to collaborate? I\'d love to hear from you!</p>

<div class="contact-grid">
<div class="contact-form-container">
<h3>Send Me a Message</h3>
<p>Use the form below to send me a message directly. I read every email and try to respond as quickly as possible.</p>

[contact-form-7 id="1" title="Contact form 1"]

</div>

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

<h3>Let\'s Connect</h3>
<p>Whether you have a question about web development, want to discuss a potential project, or just want to say hello, I\'m always happy to connect with fellow developers and enthusiasts.</p>

<p>I\'m particularly interested in:</p>
<ul>
<li>Web development collaborations</li>
<li>Open source projects</li>
<li>Speaking opportunities</li>
<li>Mentoring and knowledge sharing</li>
</ul>', 
'Contact', 
'Get in touch with me for questions, collaborations, or just to say hello.',
'publish', 'closed', 'closed', 'contact', 'page', '');
