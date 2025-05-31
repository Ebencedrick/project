<?php
require_once '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare('INSERT INTO users (name, email, password, role, created_at) VALUES (?, ?, ?, ?, NOW())');
    $stmt->bind_param('ssss', $name, $email, $hashed, $role);
    if ($stmt->execute()) {
        header('Location: ../../frontend/login.html?register=success');
        exit();
    } else {
        header('Location: ../../frontend/register.html?error=1');
        exit();
    }
}
?>
