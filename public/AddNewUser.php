<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario - Limanprof</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_users.css">
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Agregar Usuario</h2>
            <form action="process/process_add_user.php" method="POST">
                <div class="input-box">
                    <input type="text" name="nombre_usuario" required>
                    <label>Nombre de Usuario</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="text" name="codigo_pais" required>
                    <label>Código País</label>
                </div>
                <div class="input-box">
                    <input type="tel" name="telefono" required>
                    <label>Teléfono</label>
                </div>
                <div class="input-box">
                    <input type="password" name="contraseña" required>
                    <label>Contraseña</label>
                </div>
                <button type="submit" class="btn-form">Crear Usuario</button>
                <button type="button" onclick="window.location.href='dashboard_administrador.php?page=usuarios'" class="btn-form btn-cancel">Cancelar</button>
            </form>
        </div>
    </main>
</body>
</html>
