<?php
require_once '../config/db.php';
$type = $_GET['type'] ?? '';
$location = $_GET['location'] ?? '';
$min = $_GET['min_price'] ?? 0;
$max = $_GET['max_price'] ?? 1000000000;
$where = 'WHERE status = "approved"';
$params = [];
$types = '';
if ($type) {
    $where .= ' AND type = ?';
    $params[] = $type;
    $types .= 's';
}
if ($location) {
    $where .= ' AND location = ?';
    $params[] = $location;
    $types .= 's';
}
if ($min) {
    $where .= ' AND price >= ?';
    $params[] = $min;
    $types .= 'd';
}
if ($max) {
    $where .= ' AND price <= ?';
    $params[] = $max;
    $types .= 'd';
}
$sql = "SELECT * FROM properties $where ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
if ($params) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
$properties = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($properties);
?>
