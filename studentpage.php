<?php
require 'db.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>
    <div class="student-container">
        <section class="student-info">
            <h2>Hello, <?php echo htmlspecialchars($user['username']); ?></h2>
        </section>
        <p>This is your student page. Here, you can access resources, view your progress, and more.</p>
        
        <div class="resources">
            <h3>Resources</h3>
            <ul>
                <li><a href="https://coursera.com">Tutorial 1</a></li>
                <li><a href="#">Tutorial 2</a></li>
                <li><a href="#">Assignment Guidelines</a></li>
            </ul>
        </div>
        
        <div class="progress">
            <h3>Your Progress</h3>
            <p>You should at least have completed 60% of the course.</p>
        </div>
        
        <div class="assignments">
            <h3>Assignments</h3>
            <ul>
                <li><a href="#">Assignment 1</a></li>
                <li><a href="#">Assignment 2</a></li>
                <li><a href="#">Final Project</a></li>
            </ul>
        </div>
        
        <div class="grades">
            <h3>Your Grades to qualify</h3>
            <table>
                <tr>
                    <th>Assignment</th>
                    <th>Grade</th>
                </tr>
                <tr>
                    <td>Assignment 1</td>
                    <td>85%</td>
                </tr>
                <tr>
                    <td>Assignment 2</td>
                    <td>90%</td>
                </tr>
            </table>
        </div>
        
        <div class="discussion">
            <h3>Discussion Forum</h3>
            <p>Join the discussion and collaborate with fellow students.</p>
            <a href="#">Go to Forum</a>
        </div>
        
        <div class="mentorship-preferences">
            <h3>Looking for a Mentor?</h3>
            <form id="searchMentorForm" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="expertise">Desired Mentor Expertise:</label>
                <input type="text" id="expertise" name="expertise" required>
                <label for="message">Additional Message:</label>
                <textarea id="message" name="message" rows="4"></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
