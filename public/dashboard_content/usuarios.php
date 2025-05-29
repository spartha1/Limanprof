<h1 class="title">Usuarios Administradores</h1>
<ul class="breadcrumbs">
    <li><a href="dashboard_administrador.php">Home</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Administradores</a></li>
</ul>

<?php
include("../config/config.php");

$sql = "SELECT * FROM usuarios WHERE tipo = 'admin'";
$resultado = mysqli_query($conexion, $sql);
?>

<div class="card-body">
    <div class="mb-3">
        <a href="AddNewUser.php" class="btn btn-success">Crear</a>
    </div>
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Código País</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td><?php echo $fila['id']; ?></td>
                    <td><?php echo $fila['nombre_usuario']; ?></td>
                    <td><?php echo $fila['email']; ?></td>
                    <td><?php echo $fila['codigo_pais']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo $fila['tipo']; ?></td>
                    <td><?php echo $fila['fecha_registro']; ?></td>
                    <td>
                        <a href="UpdateUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Modificar</a>
                        <a href="DeleteUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
