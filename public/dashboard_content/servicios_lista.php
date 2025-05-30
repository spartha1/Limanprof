<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables-custom.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Gestión de Servicios</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Lista de Servicios</a></li>
        </ul>
    </div>

    <div class="table-wrapper">
        <div class="table-header">
            <h2>Lista de Servicios</h2>
            <a href="?page=servicios_agregar" class="table-btn table-btn-add">
                <i class='bx bx-plus-circle'></i> Agregar Servicio
            </a>
        </div>
        
        <?php
        include("../config/config.php");
        $sql = "SELECT * FROM servicios";
        $resultado = mysqli_query($conexion, $sql);
        ?>

        <div class="table-container">
            <table id="serviciosTable" class="data-table display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($servicio = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $servicio['id']; ?></td>
                            <td><?php echo htmlspecialchars($servicio['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($servicio['descripcion']); ?></td>
                            <td>$<?php echo number_format($servicio['precio'], 2); ?></td>
                            <td><?php echo ucfirst($servicio['categoria']); ?></td>
                            <td>
                                <a href="?page=servicios_editar&id=<?php echo $servicio['id']; ?>" class="table-btn table-btn-edit">
                                    <i class='bx bx-edit-alt'></i>Editar
                                </a>
                                <button onclick="deleteServicio(<?php echo $servicio['id']; ?>)" class="table-btn table-btn-delete">
                                    <i class='bx bx-trash'></i>Eliminar
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#serviciosTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        order: [[0, 'asc']],
        responsive: true
    });
});

function deleteServicio(id) {
    if (confirm('¿Está seguro de que desea eliminar este servicio?')) {
        fetch('process/delete_servicio.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert(data.message || 'Error al eliminar el servicio');
            }
        });
    }
}
</script>
