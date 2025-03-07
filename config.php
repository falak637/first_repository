<?php
// Database credentials
$servername = "localhost"; // Since it's local, use 'localhost'
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty
$dbname = "details"; // Change this to your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>