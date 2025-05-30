<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables-custom.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Gestión de Roles</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Roles y Permisos</a></li>
        </ul>
    </div>

    <div class="table-wrapper">
        <div class="table-header">
            <h2>Roles del Sistema</h2>
            <button class="table-btn table-btn-add" onclick="openRolModal()">
                <i class='bx bx-plus-circle'></i> Nuevo Rol
            </button>
        </div>
        
        <?php
        include("../config/config.php");
        $sql = "SELECT r.*, COUNT(u.id) as usuarios_count 
                FROM roles r 
                LEFT JOIN usuarios u ON r.nombre = u.tipo 
                GROUP BY r.id";
        $resultado = mysqli_query($conexion, $sql);
        ?>

        <div class="table-container">
            <table id="rolesTable" class="data-table display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del Rol</th>
                        <th>Descripción</th>
                        <th>Usuarios Asignados</th>
                        <th>Fecha Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rol = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $rol['id']; ?></td>
                            <td><?php echo $rol['nombre']; ?></td>
                            <td><?php echo $rol['descripcion']; ?></td>
                            <td><?php echo $rol['usuarios_count']; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($rol['fecha_creacion'])); ?></td>
                            <td>
                                <button class="table-btn table-btn-edit" onclick="editRole(<?php echo $rol['id']; ?>)">
                                    <i class='bx bx-edit-alt'></i>Editar
                                </button>
                                <?php if ($rol['usuarios_count'] == 0) { ?>
                                    <button class="table-btn table-btn-delete" onclick="deleteRole(<?php echo $rol['id']; ?>)">
                                        <i class='bx bx-trash'></i>Eliminar
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para Roles -->
    <div id="rolModal" class="modal">
        <div class="modal-content">
            <h2>Gestionar Rol</h2>
            <form id="rolForm">
                <input type="hidden" id="rolId" name="rolId">
                <div class="form-group">
                    <label for="nombreRol">Nombre del Rol</label>
                    <input type="text" id="nombreRol" name="nombreRol" required>
                </div>
                <div class="form-group">
                    <label for="descripcionRol">Descripción</label>
                    <textarea id="descripcionRol" name="descripcionRol" required></textarea>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-cancel" onclick="closeRolModal()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#rolesTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
        order: [[0, 'asc']],
        responsive: true
    });
});

// Funciones para el modal
function openRolModal(id = null) {
    const modal = document.getElementById('rolModal');
    modal.style.display = 'block';
    if (id) {
        // Cargar datos del rol para edición
        fetch(`get_rol.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('rolId').value = data.id;
                document.getElementById('nombreRol').value = data.nombre;
                document.getElementById('descripcionRol').value = data.descripcion;
            });
    }
}

function closeRolModal() {
    const modal = document.getElementById('rolModal');
    modal.style.display = 'none';
}

// Manejo del formulario
document.getElementById('rolForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/save_rol.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.message);
        }
    });
});
</script>
