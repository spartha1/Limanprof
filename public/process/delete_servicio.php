<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    
    // Verificar si el servicio existe y no está siendo utilizado
    $check_sql = "SELECT COUNT(*) as count FROM solicitudes_servicio WHERE servicio_id = ?";
    $check_stmt = $conexion->prepare($check_sql);
    $check_stmt->bind_param("i", $id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    $row = $result->fetch_assoc();
    
    if ($row['count'] > 0) {
        echo json_encode([
            'success' => false,
            'message' => 'No se puede eliminar el servicio porque está siendo utilizado'
        ]);
        exit;
    }
    
    // Proceder con la eliminación
    $sql = "DELETE FROM servicios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Servicio eliminado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al eliminar el servicio: ' . $conexion->error
        ]);
    }
}
