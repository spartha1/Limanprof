<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("../../config/config.php");
    
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $codigo_pais = $_POST['codigo_pais'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];
    
    $sql = "INSERT INTO usuarios (nombre_usuario, email, codigo_pais, telefono, contraseña, tipo) 
            VALUES ('$nombre_usuario', '$email', '$codigo_pais', '$telefono', '$contraseña', 'usuario')";
    
    if (mysqli_query($conexion, $sql)) {
        header('Location: ../dashboard_administrador.php?page=usuarios&success=1');
    } else {
        header('Location: ../dashboard_administrador.php?page=usuarios&error=1');
    }
}
