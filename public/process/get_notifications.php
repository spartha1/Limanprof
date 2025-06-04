<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

$usuario_id = $_SESSION['id'];

$sql = "SELECT id, tipo, mensaje, created_at, leida 
        FROM notificaciones 
        WHERE usuario_id = ? 
        ORDER BY created_at DESC 
        LIMIT 5";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$notificaciones = [];
while ($row = $result->fetch_assoc()) {
    $row['tiempo'] = timeAgo($row['created_at']);
    $notificaciones[] = $row;
}

echo json_encode([
    'success' => true,
    'notifications' => $notificaciones,
    'unread' => countUnread($conexion, $usuario_id)
]);

function timeAgo($timestamp) {
    $datetime = new DateTime($timestamp);
    $now = new DateTime();
    $interval = $now->diff($datetime);

    if ($interval->y > 0) return $interval->y . " años";
    if ($interval->m > 0) return $interval->m . " meses";
    if ($interval->d > 0) return $interval->d . " días";
    if ($interval->h > 0) return $interval->h . " horas";
    if ($interval->i > 0) return $interval->i . " minutos";
    return "hace un momento";
}

function countUnread($conexion, $usuario_id) {
    $sql = "SELECT COUNT(*) as count FROM notificaciones WHERE usuario_id = ? AND leida = 0";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc()['count'];
}
