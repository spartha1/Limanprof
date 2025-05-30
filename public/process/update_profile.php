<?php
session_start();
if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

include("../../config/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_SESSION['id'];
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $codigo_pais = $_POST['codigo_pais'];
    $biografia = $_POST['biografia'];
    
    $sql = "UPDATE usuarios SET 
            nombre_usuario = ?, 
            email = ?, 
            telefono = ?, 
            codigo_pais = ?,
            biografia = ?
            WHERE id = ?";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssi", $nombre, $email, $telefono, $codigo_pais, $biografia, $id);
    
    if ($stmt->execute()) {
        $_SESSION['nombre_usuario'] = $nombre;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar']);
    }
}
