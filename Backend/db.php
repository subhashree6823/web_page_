<?php
$servername = "localhost";
$username = "root";   // your MySQL username
$password = "root123";   // your MySQL password (the one you just set)
$database = "react_auth"; // we'll create this next

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
