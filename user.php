<?php
// import connection
require 'includes/config/database.php';
$db = connectDB();

// create email and password
$email = "email@email.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// query create user
$query = "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')";

// add user to DB
mysqli_query($db, $query);

?>