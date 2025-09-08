// ===== MAIN JAVASCRIPT FILE FOR THE WORDPRESS BLOG THEME =====

// Wait for the webpage to finish loading before running our code
// This ensures all HTML elements are available before we try to use them
document.addEventListener('DOMContentLoaded', function() {
    // Start all the interactive features of our website
    setupMobileNavigation();
    setupScrollToTopButton();
    setupContactFormValidation();
});

// ===== MOBILE NAVIGATION SETUP =====
// This function sets up the hamburger menu for mobile devices
function setupMobileNavigation() {
    // Get the hamburger menu button
    const hamburgerButton = document.getElementById('navToggle');
    // Get the navigation menu list
    const navigationMenu = document.querySelector('.nav-list');
    
    // Only set up mobile menu if hamburger button exists on the page
    if (hamburgerButton && navigationMenu) {
        // When hamburger button is clicked, show/hide the mobile menu
        hamburgerButton.addEventListener('click', function() {
            // Toggle the 'active' class to show/hide menu
            navigationMenu.classList.toggle('active');
            // Also animate the hamburger button (turn into X)
            hamburgerButton.classList.toggle('active');
        });
    }
    
    // Close mobile menu when user clicks on any navigation link
    const allNavLinks = document.querySelectorAll('.nav-list a');
    allNavLinks.forEach(function(singleLink) {
        singleLink.addEventListener('click', function() {
            if (navigationMenu && hamburgerButton) {
                // Hide the mobile menu
                navigationMenu.classList.remove('active');
                // Reset hamburger button animation
                hamburgerButton.classList.remove('active');
            }
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
            if (nameInput && nameInput.value.trim().length < 2) {
                displayErrorMessage('nameError', 'Name must be at least 2 characters long');
                formIsValid = false;
            }
            
            // Check if email address is in correct format
            const emailFormat = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailInput && !emailFormat.test(emailInput.value)) {
                displayErrorMessage('emailError', 'Please enter a valid email address');
                formIsValid = false;
            }
            
            // Check if message is long enough (at least 10 characters)
            if (messageInput && messageInput.value.trim().length < 10) {
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
