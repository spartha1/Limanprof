<?php
session_start();
if (!isset($_SESSION['id'])) {
    die(json_encode(['error' => 'No autorizado']));
}

include("../../config/config.php");

$response = ['success' => false, 'message' => '', 'path' => ''];

if ($_FILES['image']) {
    $file = $_FILES['image'];
    $type = $_POST['type']; // 'avatar' o 'cover'
    $userId = $_SESSION['id'];
    
    // Validar tipo de archivo
    $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($file['type'], $allowed)) {
        die(json_encode(['error' => 'Tipo de archivo no permitido']));
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

    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        // Actualizar base de datos
        $columnName = $type . '_path';
        $relativePath = "img/{$type}s/" . $filename;
        $sql = "UPDATE usuarios SET $columnName = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('si', $relativePath, $userId);
        
        if ($stmt->execute()) {
            $response = [
                'success' => true,
                'message' => 'Imagen actualizada correctamente',
                'path' => $relativePath
            ];
        } else {
            $response['message'] = 'Error al actualizar la base de datos';
        }
    } else {
        $response['message'] = 'Error al subir el archivo';
    }
}

echo json_encode($response);
