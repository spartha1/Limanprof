<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['id'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];

    try {
        // Verificar contraseña actual
        $sql = "SELECT contraseña FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result['contraseña'] !== $current_password) {
            throw new Exception("La contraseña actual es incorrecta");
        }

        // Actualizar contraseña
        $sql = "UPDATE usuarios SET contraseña = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("si", $new_password, $usuario_id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            throw new Exception("Error al actualizar la contraseña");
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
