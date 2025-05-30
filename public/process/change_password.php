<?php
session_start();
if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    
    // Verificar contraseña actual
    $sql = "SELECT id FROM usuarios WHERE id = ? AND contraseña = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("is", $id, $currentPassword);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Contraseña actual incorrecta']);
        exit;
    }
    
    // Actualizar contraseña
    $sql = "UPDATE usuarios SET contraseña = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $newPassword, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar contraseña']);
    }
}
