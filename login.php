<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        if ($user['role'] == 'mentor') {
            echo "<script>alert('Login successful! Redirecting to mentor page...'); window.location.href='mentorpage.php';</script>";
        } else {
            echo "<script>alert('Login successful! Redirecting to student page...'); window.location.href='studentpage.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Invalid username or password!'); window.location.href='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MEntor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a href="contactuspage.php">Contact Us</a>
        <a class="active" href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <a href="#">Forgot Password?</a>
        </form>
    </div>
</body>
</html>
