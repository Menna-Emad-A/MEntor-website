document.addEventListener('DOMContentLoaded', function() {
    // Display the current date and time
    displayCurrentDate();

    // Login Form Validation
    const loginForm = document.querySelector('.login-form');
    if (loginForm) {
        loginForm.setAttribute('novalidate', true);
        loginForm.addEventListener('submit', function(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (!username || !password) {
                event.preventDefault();
                alert('Both username and password are required!');
            }
        });
    }

    // Sign-Up Form Validation
    const signupForm = document.querySelector('.signup-container form');
    if (signupForm) {
        signupForm.setAttribute('novalidate', true);
        signupForm.addEventListener('submit', function(event) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                event.preventDefault();
                alert('Please enter a valid email address.');
            }

            if (password.length < 6) {
                event.preventDefault();
                alert('Password must be at least 6 characters long.');
            }
        });
    }

    // Mentor Search Functionality
    const searchForm = document.querySelector('.search form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const searchQuery = document.getElementById('search').value.toLowerCase();
            const mentors = document.querySelectorAll('.mentor-profile');
            let found = false;

            mentors.forEach(mentor => {
                const expertise = mentor.querySelector('span').textContent.toLowerCase();
                const name = mentor.querySelector('h3').textContent.toLowerCase();
                const mentorId = mentor.getAttribute('data-id');

                if (expertise.includes(searchQuery) || name.includes(searchQuery)) {
                    window.location.href = 'contactmentor.php?mentor_id=' + mentorId;
                    found = true;
                }
            });

            if (!found) {
                alert('Mentor not found');
            }
        });
    }

    // Contact Form Submission Validation
    const contactForms = document.querySelectorAll('.contact-form form');
    contactForms.forEach(form => {
        form.setAttribute('novalidate', true);
        form.addEventListener('submit', function(event) {
            const email = form.querySelector('input[type="email"]').value;
            const message = form.querySelector('textarea').value;

            if (!email || !message) {
                event.preventDefault();
                alert('All fields are required!');
            } else {
                alert('Mentor contacted. Wait for an email for a reply.');
            }
        });
    });

    // Search Mentor Form Submission
    const searchMentorForm = document.getElementById('searchMentorForm');
    if (searchMentorForm) {
        searchMentorForm.addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Looking for a mentor for you. Keep checking emails.');
        });
    }

    // Dynamic Testimonials
    addTestimonial('Student3', 'This platform has been extremely helpful!', 'student');
    addTestimonial('Someone3', 'Being a mentor here has been a rewarding experience.', 'mentor');
});

// Function to display the current date and time
function displayCurrentDate() {
    const dateElement = document.createElement('div');
    dateElement.id = 'current-date';
    document.body.appendChild(dateElement);

    function updateDate() {
        const now = new Date();
        dateElement.textContent = now.toLocaleString();
    }

    updateDate();
    setInterval(updateDate, 1000);
}

// Function to add a testimonial dynamically
function addTestimonial(name, review, type) {
    const testimonialsSection = document.querySelector('.testimonials');
    if (testimonialsSection) {
        const testimonial = document.createElement('div');
        testimonial.className = 'testimonial';

        let imgElement = '';
        if (type === 'mentor') {
            imgElement = `<img src="images/default-avatar.png" alt="${name}">`;
        }

        testimonial.innerHTML = `
            ${imgElement}
            <div class="testimonial-content">
                <p>"${review}"</p>
                <p class="testimonial-name">${name}</p>
            </div>
        `;
        testimonialsSection.appendChild(testimonial);
    }
}
