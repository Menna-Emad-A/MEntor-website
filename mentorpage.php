<?php
require 'db.php';

$sql = "SELECT * FROM users WHERE role = 'mentor'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$mentors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Page - MEntor</title>
    <link rel="stylesheet" href="styles.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Home</a>
        <a class="active" href="mentorpage.php">Mentor</a>
        <a href="studentpage.php">Student</a>
        <a href="contactuspage.php">Contact Us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>

    <div class="page-content">
        <header>
            <h1>Our Mentors</h1>
        </header>
        <section class="search">
            <h2>Find a Mentor</h2>
            <form action="mentorpage.php" method="GET">
                <label for="search">Search by expertise or name:</label>
                <input type="text" id="search" name="search" placeholder="Enter expertise or name">
                <input type="submit" value="Search">
            </form>
        </section>
        <section class="mentor-profiles">
            <?php foreach ($mentors as $mentor): ?>
            <div class="mentor-profile" data-id="<?php echo $mentor['id']; ?>">
                <img src="<?php echo htmlspecialchars($mentor['image'] ?: 'images/default-avatar.png'); ?>" alt="<?php echo htmlspecialchars($mentor['username']); ?>">
                <h3><?php echo htmlspecialchars($mentor['username']); ?></h3>
                <span>Expertise: <?php echo htmlspecialchars($mentor['expertise']); ?></span>
                <p><?php echo nl2br(htmlspecialchars($mentor['bio'])); ?></p>
                <a href="contactmentor.php?mentor_id=<?php echo $mentor['id']; ?>">Contact</a>
            </div>
            <?php endforeach; ?>
        </section>

        
    </div>
</body>
</html>
