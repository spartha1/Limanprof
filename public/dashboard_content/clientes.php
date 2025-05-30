<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables-custom.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Clientes</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Clientes</a></li>
        </ul>
    </div>

    <?php
    include("../config/config.php");
    $sql = "SELECT * FROM usuarios WHERE tipo = 'usuario'";
    $resultado = mysqli_query($conexion, $sql);
    ?>

    <div class="table-wrapper">
        <div class="table-header">
            <h2>Lista de Clientes</h2>
            <a href="AddNewUser.php" class="table-btn table-btn-add">
                <i class='bx bx-plus-circle'></i> Crear Nuevo
            </a>
        </div>
        <div class="table-container">
            <table id="clientsTable" class="data-table display">
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
                                <a href="UpdateUser.php?id=<?php echo $fila['id']; ?>" class="table-btn table-btn-edit">
                                    <i class='bx bx-edit-alt'></i>Editar
                                </a>
                                <a href="DeleteUser.php?id=<?php echo $fila['id']; ?>" class="table-btn table-btn-delete">
                                    <i class='bx bx-trash'></i>Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#clientsTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
            },
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
            order: [[0, 'asc']],
            responsive: true
        });
    });
</script>
