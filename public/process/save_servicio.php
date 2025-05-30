<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    
    $sql = "INSERT INTO servicios (nombre, descripcion, precio, categoria) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $categoria);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Servicio guardado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al guardar el servicio: ' . $conexion->error
        ]);
    }
}
