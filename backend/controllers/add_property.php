<?php
require_once '../config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && $_SESSION['role'] === 'agent') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $type = $_POST['type'];
    $location = $_POST['location'];
    $user_id = $_SESSION['user_id'];
    $status = 'pending';
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $image_path = '../uploads/' . uniqid() . '.' . $ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        }
    }
    $stmt = $conn->prepare('INSERT INTO properties (title, description, price, type, location, image, status, user_id, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())');
    $stmt->bind_param('ssdssssi', $title, $description, $price, $type, $location, $image_path, $status, $user_id);
    if ($stmt->execute()) {
        header('Location: ../../frontend/dashboard.html?add=success');
        exit();
    } else {
        header('Location: ../../frontend/dashboard.html?add=error');
        exit();
    }
}
?>
