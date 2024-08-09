<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mentor_id = $_POST['mentor_id'];
    $sender_email = $_POST['sender_email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (mentor_id, sender_email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$mentor_id, $sender_email, $message])) {
        echo "<script>alert('Mentor contacted. Wait for an email for a reply.'); window.location.href='mentorpage.php';</script>";
    } else {
        echo "<script>alert('Failed to contact mentor. Please try again.'); window.location.href='mentorpage.php';</script>";
    }
}

$mentor_id = $_GET['mentor_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$mentor_id]);
$mentor = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mentor - MEntor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a href="contactuspage.php">Contact Us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>
    <div class="contact-container">
        <h2>Contact <?php echo htmlspecialchars($mentor['username']); ?></h2>
        <form action="contactmentor.php" method="POST" class="contact-form">
            <input type="hidden" name="mentor_id" value="<?php echo $mentor['id']; ?>">
            <div class="input-group">
                <label for="sender_email">Your Email:</label>
                <input type="email" id="sender_email" name="sender_email" required>
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
