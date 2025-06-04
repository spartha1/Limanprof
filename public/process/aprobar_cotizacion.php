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
    $conexion->begin_transaction();

    // Verificar estado actual
    $sql = "SELECT * FROM cotizaciones WHERE id = ? AND usuario_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $cotizacion_id, $usuario_id);
    $stmt->execute();
    $cotizacion = $stmt->get_result()->fetch_assoc();

    if (!$cotizacion || $cotizacion['estado'] !== 'respondida') {
        throw new Exception("Cotización no disponible para aprobación");
    }

    // Actualizar estado de cotización
    $sql = "UPDATE cotizaciones SET estado = 'aceptada' WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $cotizacion_id);
    $stmt->execute();

    // Crear solicitud de servicio
    $sql = "INSERT INTO solicitudes_servicio (
        cotizacion_id, usuario_id, servicio_id, 
        fecha_programada, estado, precio_final
    ) VALUES (?, ?, ?, ?, 'pendiente', ?)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iiisf", 
        $cotizacion_id, 
        $usuario_id, 
        $cotizacion['servicio_id'],
        $cotizacion['fecha_deseada'],
        $cotizacion['precio_cotizado']
    );
    $stmt->execute();

    // Notificar al administrador
    $sql = "INSERT INTO notificaciones (
        usuario_id, tipo, mensaje
    ) VALUES (1, 'solicitud', 'Nueva solicitud de servicio aprobada')";
    $conexion->query($sql);

    $conexion->commit();
    echo json_encode(['success' => true]);

} catch (Exception $e) {
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
