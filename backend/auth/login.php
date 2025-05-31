<?php
require_once '../config/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $stmt = $conn->prepare('SELECT id, name, password, role FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hash, $role);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;
            if ($role === 'admin') {
                header('Location: ../../frontend/admin_dashboard.html');
            } else if ($role === 'agent') {
                header('Location: ../../frontend/dashboard.html');
            } else {
                header('Location: ../../frontend/index.html');
            }
            exit();
        }
    }
    header('Location: ../../frontend/login.html?error=1');
    exit();
}
?>
