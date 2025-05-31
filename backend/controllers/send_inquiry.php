<?php
require_once '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = intval($_POST['property_id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $stmt = $conn->prepare('INSERT INTO inquiries (property_id, name, email, message, created_at) VALUES (?, ?, ?, ?, NOW())');
    $stmt->bind_param('isss', $property_id, $name, $email, $message);
    if ($stmt->execute()) {
        header('Location: ../../frontend/property_detail.html?inquiry=success');
        exit();
    } else {
        header('Location: ../../frontend/property_detail.html?inquiry=error');
        exit();
    }
}
?>
