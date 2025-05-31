<?php
require_once '../config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
    $id = intval($_POST['id']);
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare('DELETE FROM properties WHERE id=? AND user_id=?');
    $stmt->bind_param('ii', $id, $user_id);
    if ($stmt->execute()) {
        header('Location: ../../frontend/dashboard.html?delete=success');
        exit();
    } else {
        header('Location: ../../frontend/dashboard.html?delete=error');
        exit();
    }
}
?>
