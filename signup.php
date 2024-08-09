<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $role = $_POST['role'];
    $expertise = ($role == 'mentor') ? $_POST['expertise'] : null;
    $bio = $_POST['bio'];
    $major = ($role == 'student') ? $_POST['major'] : null;
    
    // Handle image upload
    $target_dir = "uploads/";
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        $timestamp = time();
        $target_file = $target_dir . $timestamp . '_' . basename($_FILES['image']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            $uploadOk = 0;
            echo "<script>alert('File is not an image.');</script>";
        }
        
        // Check file size
        if ($_FILES['image']['size'] > 500000) { // 500KB max size
            $uploadOk = 0;
            echo "<script>alert('Sorry, your file is too large.');</script>";
        }
        
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image = $target_file;
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    }

    $sql = "INSERT INTO users (username, password, email, role, expertise, bio, major, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute([$username, $password, $email, $role, $expertise, $bio, $major, $image])) {
        echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Registration failed! Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - MEntor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a href="contactuspage.php">Contact Us</a>
        <a href="login.php">Login</a>
        <a class="active" href="signup.php">Signup</a>
    </div>
    <div class="signup-container">
        <form action="signup.php" method="POST" class="signup-form" enctype="multipart/form-data">
            <h2>Signup</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="mentor">Mentor</option>
                    <option value="student">Student</option>
                </select>
            </div>
            <div class="input-group" id="expertise-group" style="display:none;">
                <label for="expertise">Expertise:</label>
                <input type="text" id="expertise" name="expertise">
            </div>
            <div class="input-group" id="major-group" style="display:none;">
                <label for="major">Major:</label>
                <input type="text" id="major" name="major">
            </div>
            <div class="input-group">
                <label for="bio">Tell us about yourself:</label>
                <textarea id="bio" name="bio" required></textarea>
            </div>
            <div class="input-group">
                <label for="image">Profile Image:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <button type="submit">Signup</button>
        </form>
    </div>
    <script>
        document.getElementById('role').addEventListener('change', function() {
            var expertiseGroup = document.getElementById('expertise-group');
            var majorGroup = document.getElementById('major-group');
            if (this.value == 'mentor') {
                expertiseGroup.style.display = 'block';
                majorGroup.style.display = 'none';
            } else {
                expertiseGroup.style.display = 'none';
                majorGroup.style.display = 'block';
            }
        });
    </script>
</body>
</html>
