<?php
require_once '../config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') {
    $id = intval($_POST['id']);
    $status = $_POST['status']; // 'approved' or 'rejected'
    $stmt = $conn->prepare('UPDATE properties SET status=? WHERE id=?');
    $stmt->bind_param('si', $status, $id);
    if ($stmt->execute()) {
        header('Location: ../../frontend/manage_properties.html?update=success');
        exit();
    } else {
        header('Location: ../../frontend/manage_properties.html?update=error');
        exit();
    }
}
?>
