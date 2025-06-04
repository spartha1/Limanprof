<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

$data = json_decode(file_get_contents('php://input'), true);
$cotizacion_id = (int)$data['id'];
$usuario_id = $_SESSION['id'];

try {
    // Actualizar estado de la cotización
    $sql = "UPDATE cotizaciones SET estado = 'rechazada' WHERE id = ? AND usuario_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $cotizacion_id, $usuario_id);
    
    if ($stmt->execute()) {
        // Notificar al administrador
        $sql = "INSERT INTO notificaciones (
            usuario_id, tipo, mensaje, link
        ) VALUES (1, 'cotizacion', 'Cotización rechazada', 
                'dashboard_administrador.php?page=cotizaciones')";
        $conexion->query($sql);
        
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Error al actualizar la cotización");
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
