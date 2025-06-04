<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['id'];
    $servicio_id = (int)$_POST['servicio_id'];
    $descripcion = $_POST['descripcion_cliente'];
    $area = (float)$_POST['area_aproximada'];
    $fecha_deseada = $_POST['fecha_deseada'];
    
    try {
        // Verificar que el servicio existe
        $check_sql = "SELECT id FROM servicios WHERE id = ? AND activo = 1";
        $stmt = $conexion->prepare($check_sql);
        $stmt->bind_param("i", $servicio_id);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 0) {
            throw new Exception("El servicio seleccionado no está disponible");
        }

        // Insertar la cotización
        $sql = "INSERT INTO cotizaciones (
            usuario_id, servicio_id, descripcion_cliente, 
            area_aproximada, fecha_deseada, estado
        ) VALUES (?, ?, ?, ?, ?, 'pendiente')";
        
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iisds", $usuario_id, $servicio_id, $descripcion, $area, $fecha_deseada);
        
        if ($stmt->execute()) {
            $cotizacion_id = $conexion->insert_id;

            // Registrar en historial
            $sql_historial = "INSERT INTO historial_estados (
                entidad, entidad_id, estado_anterior, 
                estado_nuevo, usuario_id
            ) VALUES ('cotizacion', ?, '', 'pendiente', ?)";
            
            $stmt = $conexion->prepare($sql_historial);
            $stmt->bind_param("ii", $cotizacion_id, $usuario_id);
            $stmt->execute();

            // Notificar al administrador
            $sql_notif = "INSERT INTO notificaciones (
                usuario_id, tipo, mensaje, link
            ) VALUES (1, 'cotizacion', 'Nueva solicitud de cotización', 
                     'dashboard_administrador.php?page=cotizaciones')";
            $conexion->query($sql_notif);
            
            echo json_encode(['success' => true]);
        } else {
            throw new Exception("Error al guardar la cotización");
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
