<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

if (isset($_GET['id'])) {
    $cotizacion_id = (int)$_GET['id'];
    $usuario_id = $_SESSION['id'];

    $sql = "SELECT c.*, s.nombre as servicio_nombre, s.descripcion as servicio_descripcion 
            FROM cotizaciones c
            JOIN servicios s ON c.servicio_id = s.id
            WHERE c.id = ? AND c.usuario_id = ?";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $cotizacion_id, $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($cotizacion = $result->fetch_assoc()) {
        // Formatear fechas y valores numéricos
        $cotizacion['fecha_deseada'] = date('d/m/Y', strtotime($cotizacion['fecha_deseada']));
        $cotizacion['created_at'] = date('d/m/Y H:i', strtotime($cotizacion['created_at']));
        $cotizacion['precio_cotizado'] = number_format($cotizacion['precio_cotizado'], 2);
        
        echo json_encode($cotizacion);
    } else {
        echo json_encode(['error' => 'Cotización no encontrada']);
    }
}
