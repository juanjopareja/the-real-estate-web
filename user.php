<?php
// Import connection
require 'includes/app.php';
$db = connectDB();

// Create email and password
$email = "email@email.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query create user
$query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";

// Add user to DB
mysqli_query($db, $query);

?>