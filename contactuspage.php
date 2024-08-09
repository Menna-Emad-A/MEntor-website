<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (email, message) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $message]);

    echo "Message sent successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - MEntor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a class="active" href="contactuspage.php">Contact Us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>
    <div class="contact-container">
        <form action="contactuspage.php" method="POST" class="contact-form">
            <h2>Contact Us</h2>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
