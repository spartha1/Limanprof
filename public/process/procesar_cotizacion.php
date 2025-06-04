<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

$data = json_decode(file_get_contents('php://input'), true);
$cotizacion_id = (int)$data['cotizacion_id'];
$precio = (float)$data['precio'];
$comentarios = $data['comentarios'];

try {
    $conexion->begin_transaction();

    // Actualizar cotización
    $sql = "UPDATE cotizaciones 
            SET estado = 'respondida', 
                precio_cotizado = ?, 
                comentarios_admin = ? 
            WHERE id = ?";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("dsi", $precio, $comentarios, $cotizacion_id);
    $stmt->execute();

    // Registrar en seguimiento
    $sql = "INSERT INTO seguimiento_estados 
            (entidad, entidad_id, estado_anterior, estado_nuevo, comentarios, usuario_id) 
            VALUES ('cotizacion', ?, 'pendiente', 'respondida', ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("isi", $cotizacion_id, $comentarios, $_SESSION['id']);
    $stmt->execute();

    // Obtener usuario_id de la cotización
    $sql = "SELECT usuario_id FROM cotizaciones WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $cotizacion_id);
    $stmt->execute();
    $usuario_id = $stmt->get_result()->fetch_assoc()['usuario_id'];

    // Crear notificación para el usuario
    $sql = "INSERT INTO notificaciones (usuario_id, tipo, mensaje) 
            VALUES (?, 'cotizacion', 'Tu cotización ha sido respondida')";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();

    $conexion->commit();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
