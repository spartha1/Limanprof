<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cotizacion_id = (int)$_POST['cotizacion_id'];
    $precio = (float)$_POST['precio'];
    $comentarios = $_POST['comentarios'];
    
    try {
        $conexion->begin_transaction();

        // Actualizar cotización
        $sql = "UPDATE cotizaciones 
                SET estado = 'respondida', 
                    precio_cotizado = ?, 
                    notas_internas = ? 
                WHERE id = ?";
        
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("dsi", $precio, $comentarios, $cotizacion_id);
        
        if ($stmt->execute()) {
            // Obtener el usuario_id de la cotización
            $sql = "SELECT usuario_id FROM cotizaciones WHERE id = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $cotizacion_id);
            $stmt->execute();
            $usuario_id = $stmt->get_result()->fetch_assoc()['usuario_id'];

            // Crear notificación para el usuario
            $sql = "INSERT INTO notificaciones (usuario_id, tipo, mensaje, leida) 
                    VALUES (?, 'cotizacion', 'Tu cotización ha sido respondida', 0)";
            
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();

            $conexion->commit();
            echo json_encode(['success' => true]);
        } else {
            throw new Exception("Error al actualizar la cotización");
        }
    } catch (Exception $e) {
        $conexion->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
