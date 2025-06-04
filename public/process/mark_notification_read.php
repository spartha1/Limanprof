<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

$data = json_decode(file_get_contents('php://input'), true);
$notificacion_id = (int)$data['id'];
$usuario_id = $_SESSION['id'];

$sql = "UPDATE notificaciones SET leida = 1 
        WHERE id = ? AND usuario_id = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $notificacion_id, $usuario_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar']);
}
