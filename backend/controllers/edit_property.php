<?php
require_once '../config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $id = intval($_POST['id']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $type = $_POST['type'];
    $location = $_POST['location'];
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare('UPDATE properties SET title=?, description=?, price=?, type=?, location=? WHERE id=? AND user_id=?');
    $stmt->bind_param('ssdssii', $title, $description, $price, $type, $location, $id, $user_id);
    if ($stmt->execute()) {
        header('Location: ../../frontend/dashboard.html?edit=success');
        exit();
    } else {
        header('Location: ../../frontend/dashboard.html?edit=error');
        exit();
    }
}
?>
