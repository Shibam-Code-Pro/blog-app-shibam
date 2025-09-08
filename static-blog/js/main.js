// ===== MAIN JAVASCRIPT FILE FOR THE STATIC BLOG =====

// Wait for the webpage to finish loading before running our code
// This ensures all HTML elements are available before we try to use them
document.addEventListener('DOMContentLoaded', function() {
    // Start all the interactive features of our website
    setupMobileNavigation();
    setupScrollToTopButton();
    setupContactFormValidation();
    loadBlogPostContent();
});

// ===== MOBILE NAVIGATION SETUP =====
// This function sets up the hamburger menu for mobile devices
function setupMobileNavigation() {
    // Get the hamburger menu button
    const hamburgerButton = document.getElementById('navToggle');
    // Get the navigation menu list
    const navigationMenu = document.querySelector('.nav-list');
    
    // Only set up mobile menu if hamburger button exists on the page
    if (hamburgerButton) {
        // When hamburger button is clicked, show/hide the mobile menu
        hamburgerButton.addEventListener('click', function() {
            // Toggle the 'active' class to show/hide menu
            navigationMenu.classList.toggle('active');
            // Also animate the hamburger button (turn into X)
            hamburgerButton.classList.toggle('active');
        });
    }
    
    // Close mobile menu when user clicks on any navigation link
    const allNavLinks = document.querySelectorAll('.nav-link');
    allNavLinks.forEach(function(singleLink) {
        singleLink.addEventListener('click', function() {
            // Hide the mobile menu
            navigationMenu.classList.remove('active');
            // Reset hamburger button animation
            hamburgerButton.classList.remove('active');
        });
    });
}

// ===== SCROLL TO TOP BUTTON SETUP =====
// This function creates the "back to top" button that appears when scrolling down
function setupScrollToTopButton() {
    // Get the scroll to top button element
    const backToTopButton = document.getElementById('scrollToTop');
    
    // Only set up the button if it exists on the page
    if (backToTopButton) {
        // Listen for when user scrolls the page
        window.addEventListener('scroll', function() {
            // Check how far down the page the user has scrolled
            if (window.pageYOffset > 300) {
                // If scrolled more than 300 pixels, show the button
                backToTopButton.classList.add('show');
            } else {
                // If near the top, hide the button
                backToTopButton.classList.remove('show');
            }
        });
        
        // When button is clicked, scroll smoothly back to top
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0, // Go to the very top of the page
                behavior: 'smooth' // Smooth scrolling animation
            });
        });
    }
}

// ===== CONTACT FORM VALIDATION SETUP =====
// This function sets up form validation for the contact page
function setupContactFormValidation() {
    // Get the contact form element
    const contactForm = document.getElementById('contactForm');
    
    // Only set up validation if contact form exists on the page
    if (contactForm) {
        // Listen for when user submits the form
        contactForm.addEventListener('submit', function(event) {
            // Prevent form from submitting normally (so we can validate first)
            event.preventDefault();
            
            // Get all the form input fields
            const nameInput = document.getElementById('userName');
            const emailInput = document.getElementById('userEmail');
            const messageInput = document.getElementById('userMessage');
            
            // Track whether the form is valid (starts as true)
            let formIsValid = true;
            
            // Clear any previous error messages
            clearAllErrorMessages();
            
            // Check if name is long enough (at least 2 characters)
            if (nameInput.value.trim().length < 2) {
                displayErrorMessage('nameError', 'Name must be at least 2 characters long');
                formIsValid = false;
            }
            
            // Check if email address is in correct format
            const emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailFormat.test(emailInput.value)) {
                displayErrorMessage('emailError', 'Please enter a valid email address');
                formIsValid = false;
            }
            
            // Check if message is long enough (at least 10 characters)
            if (messageInput.value.trim().length < 10) {
                displayErrorMessage('messageError', 'Message must be at least 10 characters long');
                formIsValid = false;
            }
            
            // If all validation passed, show success message and clear form
            if (formIsValid) {
                showSuccessMessage();
                contactForm.reset(); // Clear all form fields
            }
        });
    }
}

// ===== FORM ERROR MESSAGE FUNCTIONS =====
// Function to display an error message for a specific form field
function displayErrorMessage(errorElementId, errorText) {
    // Find the error message element by its ID
    const errorElement = document.getElementById(errorElementId);
    // If the element exists, show the error message
    if (errorElement) {
        errorElement.textContent = errorText;
    }
}

// Function to clear all error messages from the form
function clearAllErrorMessages() {
    // Find all elements with the 'error-message' class
    const allErrorElements = document.querySelectorAll('.error-message');
    // Clear the text content of each error message element
    allErrorElements.forEach(function(errorElement) {
        errorElement.textContent = '';
    });
}

// ===== SUCCESS MESSAGE FUNCTION =====
// Function to show success message after form is submitted successfully
function showSuccessMessage() {
    // Get the success message element
    const successMessageBox = document.getElementById('successMessage');
    // If the element exists, show it
    if (successMessageBox) {
        successMessageBox.style.display = 'block';
        
        // Automatically hide the success message after 5 seconds
        setTimeout(function() {
            successMessageBox.style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds
    }
}

// ===== BLOG POST CONTENT LOADING =====
// This function loads blog post content on the single post page
function loadBlogPostContent() {
    // Check if we're on a blog post page by looking for post elements
    const postTitleElement = document.getElementById('postTitle');
    const postContentElement = document.getElementById('postContent');
    
    // Only run this code if we're on a post page (elements exist)
    if (postTitleElement && postContentElement) {
        // Get the post ID from the URL (like post.html?id=1)
        const urlParameters = new URLSearchParams(window.location.search);
        const requestedPostId = urlParameters.get('id');
        
        // Sample blog post data (in a real blog, this would come from a database)
        const blogPostData = {
            '1': {
                title: '10 Essential JavaScript Tips for Beginners',
                date: 'January 15, 2025',
                author: 'Blog Author',
                image: 'https://img-wrapper.vercel.app/image?url=https://placehold.co/800x400/4f46e5/ffffff?text=JavaScript+Tips',
                content: `
                    <p>JavaScript is one of the most popular programming languages in the world, and for good reason. It's versatile, powerful, and essential for modern web development. If you're just starting your JavaScript journey, here are 10 essential tips that will help you write better code and avoid common pitfalls.</p>
                    
                    <h3>1. Use 'let' and 'const' instead of 'var'</h3>
                    <p>Modern JavaScript provides 'let' and 'const' which have block scope, unlike 'var' which has function scope. This helps prevent many common bugs related to variable hoisting and scope confusion.</p>
                    
                    <h3>2. Understand the difference between '==' and '==='</h3>
                    <p>Always use strict equality (===) unless you specifically need type coercion. This prevents unexpected behavior when comparing values of different types.</p>
                    
                    <h3>3. Learn array methods like map, filter, and reduce</h3>
                    <p>These functional programming methods make your code more readable and help you avoid traditional for loops in many cases.</p>
                    
                    <p>By following these tips and practicing regularly, you'll become a more confident JavaScript developer. Remember, the key to mastering JavaScript is consistent practice and building real projects.</p>
                `
            },
            '2': {
                title: 'CSS Grid Layout: A Complete Guide',
                date: 'January 12, 2025',
                author: 'Blog Author',
                image: 'https://img-wrapper.vercel.app/image?url=https://placehold.co/800x400/059669/ffffff?text=CSS+Grid',
                content: `
                    <p>CSS Grid is a powerful layout system that allows you to create complex, responsive layouts with ease. Unlike Flexbox, which is primarily one-dimensional, Grid is designed for two-dimensional layouts.</p>
                    
                    <h3>Getting Started with Grid</h3>
                    <p>To create a grid container, simply apply 'display: grid' to an element. Then you can define your grid structure using properties like 'grid-template-columns' and 'grid-template-rows'.</p>
                    
                    <h3>Grid Template Areas</h3>
                    <p>One of the most intuitive features of CSS Grid is the ability to name grid areas and place items using those names. This makes your CSS more readable and maintainable.</p>
                    
                    <h3>Responsive Grid Layouts</h3>
                    <p>Grid makes creating responsive layouts incredibly easy with features like 'repeat()', 'minmax()', and 'auto-fit'. You can create layouts that adapt to different screen sizes without media queries.</p>
                    
                    <p>CSS Grid is supported in all modern browsers and is the future of web layout. Start experimenting with it today and see how it can simplify your CSS.</p>
                `
            },
            '3': {
                title: 'Building Responsive Websites in 2025',
                date: 'January 10, 2025',
                author: 'Blog Author',
                image: 'https://img-wrapper.vercel.app/image?url=https://placehold.co/800x400/dc2626/ffffff?text=Responsive+Design',
                content: `
                    <p>Responsive web design is no longer optional—it's essential. With the variety of devices and screen sizes available today, your website must provide a great experience across all platforms.</p>
                    
                    <h3>Mobile-First Approach</h3>
                    <p>Start designing for mobile devices first, then progressively enhance for larger screens. This approach ensures your site works well on the most constrained devices.</p>
                    
                    <h3>Flexible Grid Systems</h3>
                    <p>Use CSS Grid and Flexbox to create layouts that adapt to different screen sizes. These modern layout methods provide much more flexibility than traditional float-based layouts.</p>
                    
                    <h3>Responsive Images</h3>
                    <p>Implement responsive images using the 'srcset' attribute and 'picture' element to serve appropriate image sizes for different devices, improving performance and user experience.</p>
                    
                    <h3>Touch-Friendly Design</h3>
                    <p>Ensure interactive elements are large enough for touch interaction (minimum 44px) and provide adequate spacing between clickable elements.</p>
                    
                    <p>By following these principles and testing across multiple devices, you'll create websites that work beautifully everywhere.</p>
                `
            }
        };
        
        // Find the requested post, or use the first post as default
        const selectedPost = blogPostData[requestedPostId] || blogPostData['1'];
        
        // Update all the page elements with the post data
        document.getElementById('postTitle').textContent = selectedPost.title;
        document.getElementById('postDate').textContent = selectedPost.date;
        document.getElementById('postAuthor').textContent = 'By ' + selectedPost.author;
        document.getElementById('postImage').src = selectedPost.image;
        document.getElementById('postImage').alt = selectedPost.title;
        document.getElementById('postText').innerHTML = selectedPost.content;
        
        // Also update the browser tab title
        document.title = selectedPost.title + ' - My Static Blog';
    }
}
