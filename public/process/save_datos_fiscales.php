<?php
session_start();
if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['id'];
    $nombre = $_POST['nombre_completo'];
    $rfc = $_POST['rfc'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $codigo_postal = $_POST['codigo_postal'];
    $telefono = $_POST['telefono'];
    
    // Verificar si ya existen datos fiscales para este usuario
    $check_sql = "SELECT id FROM datos_facturacion WHERE usuario_id = ?";
    $check_stmt = $conexion->prepare($check_sql);
    $check_stmt->bind_param("i", $usuario_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Actualizar datos existentes
        $sql = "UPDATE datos_facturacion SET 
                nombre_completo = ?, rfc = ?, direccion = ?, 
                ciudad = ?, estado = ?, codigo_postal = ?, 
                telefono = ? WHERE usuario_id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssssi", $nombre, $rfc, $direccion, $ciudad, $estado, $codigo_postal, $telefono, $usuario_id);
    } else {
        // Insertar nuevos datos
        $sql = "INSERT INTO datos_facturacion (usuario_id, nombre_completo, rfc, direccion, 
                ciudad, estado, codigo_postal, telefono) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("isssssss", $usuario_id, $nombre, $rfc, $direccion, $ciudad, $estado, $codigo_postal, $telefono);
    }
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al guardar los datos']);
    }
}
