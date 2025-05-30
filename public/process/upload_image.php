<?php
session_start();
if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if (!isset($_FILES['image']) || !isset($_POST['type'])) {
    die(json_encode(['success' => false, 'message' => 'Datos incompletos']));
}

$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
$maxSize = 5 * 1024 * 1024; // 5MB
$file = $_FILES['image'];
$type = $_POST['type'];
$userId = $_SESSION['id'];

// Validaciones
if (!in_array($file['type'], $allowedTypes)) {
    die(json_encode(['success' => false, 'message' => 'Tipo de archivo no permitido']));
}

if ($file['size'] > $maxSize) {
    die(json_encode(['success' => false, 'message' => 'El archivo es demasiado grande']));
}

// Crear directorios si no existen
$uploadDir = "../img/{$type}s/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Generar nombre único
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = "user_{$userId}_{$type}." . $extension;
$filepath = $uploadDir . $filename;
$dbPath = "img/{$type}s/" . $filename;

if (move_uploaded_file($file['tmp_name'], $filepath)) {
    // Actualizar la base de datos
    $column = $type == 'avatar' ? 'avatar_path' : 'cover_path';
    $sql = "UPDATE usuarios SET $column = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('si', $dbPath, $userId);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true,
            'message' => 'Imagen actualizada correctamente',
            'path' => $dbPath
        ]);
    } else {
        unlink($filepath); // Eliminar archivo si falla la actualización
        echo json_encode(['success' => false, 'message' => 'Error al actualizar la base de datos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error al subir el archivo']);
}
