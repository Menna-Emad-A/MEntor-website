<?php
session_start();
$loggedIn = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEntor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>    
</head>
<body>
<div class="navbar">
        <a class="active" href="index.php">Home</a>
        <a href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a href="contactuspage.php">Contact Us</a>
        <?php if ($loggedIn): ?>
            <a href="logout.php">Log out</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Signup</a>
        <?php endif; ?>
    </div>

    <div class="imagemap-container">
        <div class="imagemap">
            <img src="WhatsApp Image 2024-03-06 at 5.32.17 PM.jpeg" usemap="#image-map" alt="Your Image">
            <map name="image-map">
                <area target="" alt="tomentor" title="tomentor" href="mentorpage.php" coords="528,997,1023,111,903,467,1023,516,937,671,1013,459,943,528,890,976,481,316,467,324" shape="">
                <area target="" alt="tostudent" title="tostudent" href="studentpage.php" coords="44,118,525,1010,489,975" shape="0">
            </map>
        </div>
    </div>
    <hr>

    <div class="reasons">
        <h2>Why Be a Mentor?</h2>
        <ul>
            <li>Personal Fulfillment</li>
            <li>Professional Development</li>
            <li>Legacy and Impact</li>
            <li>Personal Growth</li>
        </ul>
    </div>
    <hr>
    <div class="reasons">
        <h2>Why You Need a Mentor?</h2>
        <ol>
            <li>Guidance and Advice</li>
            <li>Networking Opportunities</li>
            <li>Accountability and Support</li>
            <li>Personal Development</li>
        </ol>
    </div>
    <hr>
    <div class="reasons">
        <h2>Why Both Need Each Other?</h2>
        <ul>
            <li>Reason 1
                <ol>
                    <li>Sub-reason 1</li>
                    <li>Sub-reason 2</li>
                    <li>Sub-reason 3</li>
                </ol>
            </li>
            <li>Reason 2
                <ol>
                    <li>Sub-reason 1</li>
                    <li>Sub-reason 2</li>
                    <li>Sub-reason 3</li>
                </ol>
            </li>
        </ul>
    </div>
    <div class="testimonials">
        <h2>Testimonials</h2>
        <p>Reviews from students and mentors</p>
        <div class="testimonial">
            <div class="testimonial-content">
                <p>"Great platform for finding mentors. Highly recommend!"</p>
                <p class="testimonial-name">Student1</p>
            </div>
        </div>
        <div class="testimonial">
            <div class="testimonial-content">
                <p>"I found my mentor here and it has been a life-changing experience."</p>
                <p class="testimonial-name">Student2</p>
            </div>
        </div>
    </div>

    <div class="how-it-works">
        <h2>How It Works</h2>
        <p>How to use the browser</p>
        <ol>
            <li>Sign up as a mentor or a student.</li>
            <li>Browse through available mentors or mentees.</li>
            <li>Connect with your mentor/mentee and start the journey!</li>
        </ol>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Mentorship Platform</p>
    </footer>
</body>
</html>
