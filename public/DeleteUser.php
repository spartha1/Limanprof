<?php
session_start();
if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header('Location: login.php');
    exit();
}

include("../config/config.php");
$id = $_GET['id'];
$sql = "SELECT nombre_usuario FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$usuario = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario - Limanprof</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_users.css">
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <main>
        <div class="form-container">
            <h2>Eliminar Usuario</h2>
            <p style="color: white; text-align: center; margin-bottom: 20px;">
                ¿Está seguro que desea eliminar al usuario "<?php echo $usuario['nombre_usuario']; ?>"?
            </p>
            <form action="process/process_delete_user.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" class="btn-form">Confirmar Eliminación</button>
                <button type="button" onclick="window.location.href='dashboard_administrador.php?page=usuarios'" class="btn-form btn-cancel">Cancelar</button>
            </form>
        </div>
    </main>
</body>
</html>
