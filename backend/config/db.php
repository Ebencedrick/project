<?php
// Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'real_estate';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
