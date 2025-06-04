<?php
session_start();
include("../../config/config.php");

if (!isset($_SESSION['id'])) {
    die(json_encode(['success' => false, 'message' => 'No autorizado']));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['id'];
    $nombre = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $codigo_pais = $_POST['codigo_pais'];
    $telefono = $_POST['telefono'];
    $biografia = $_POST['biografia'];

    try {
        $sql = "UPDATE usuarios SET 
                nombre_usuario = ?, 
                email = ?, 
                codigo_pais = ?, 
                telefono = ?, 
                biografia = ? 
                WHERE id = ?";
                
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi", $nombre, $email, $codigo_pais, $telefono, $biografia, $usuario_id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            throw new Exception("Error al actualizar el perfil");
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
