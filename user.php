<?php
// import connection
require 'includes/config/database.php';
$db = connectDB();

// create email and password
$email = "email@email.com";
$password = "123456";

// query create user
$query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

// add user to DB
mysqli_query($db, $query);

?>