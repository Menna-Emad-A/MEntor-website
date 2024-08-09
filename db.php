<?php
$servername = "localhost";
$username = "root";  // Use your MySQL username
$password = "1404@Mimi";      // Use your MySQL password
$dbname = "mentor";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
