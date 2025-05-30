<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

$response = ['success' => false, 'message' => ''];

try {
    $id = isset($_POST['rolId']) ? $_POST['rolId'] : null;
    $nombre = $_POST['nombreRol'];
    $descripcion = $_POST['descripcionRol'];

    if ($id) {
        // Actualizar rol existente
        $stmt = $conexion->prepare("UPDATE roles SET nombre = ?, descripcion = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nombre, $descripcion, $id);
    } else {
        // Crear nuevo rol
        $stmt = $conexion->prepare("INSERT INTO roles (nombre, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $descripcion);
    }

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = $id ? 'Rol actualizado correctamente' : 'Rol creado correctamente';
    } else {
        throw new Exception("Error al guardar el rol");
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
