<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "grocery_list";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
