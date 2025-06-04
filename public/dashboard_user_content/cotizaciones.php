<div class="data-section">
    <div class="data-header">
        <h1 class="title">Mis Cotizaciones</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Cotizaciones</a></li>
        </ul>
    </div>

    <?php
    include("../config/config.php");
    $usuario_id = $_SESSION['id'];
    
    // Consulta SQL actualizada para usar solo campos existentes
    $sql = "SELECT c.id, c.servicio_id, c.usuario_id, c.fecha_deseada, 
                   c.estado, c.updated_at, 
                   s.nombre as servicio_nombre, s.precio_base 
            FROM cotizaciones c 
            JOIN servicios s ON c.servicio_id = s.id 
            WHERE c.usuario_id = ? 
            ORDER BY c.id DESC";
            
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $cotizaciones = $stmt->get_result();
    ?>

    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Fecha Solicitada</th>
                    <th>Estado</th>
                    <th>Precio Base</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($cotizaciones->num_rows > 0): ?>
                    <?php while ($cotizacion = $cotizaciones->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cotizacion['servicio_nombre']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($cotizacion['fecha_deseada'])); ?></td>
                            <td>
                                <span class="badge badge-<?php echo $cotizacion['estado']; ?>">
                                    <?php echo ucfirst($cotizacion['estado']); ?>
                                </span>
                            </td>
                            <td>
                                <?php echo '$' . number_format($cotizacion['precio_base'], 2); ?>
                            </td>
                            <td>
                                <button onclick="verDetalle(<?php echo $cotizacion['id']; ?>)" 
                                        class="btn btn-sm btn-primary">
                                    <i class='bx bx-show'></i> Ver
                                </button>
                                <?php if ($cotizacion['estado'] === 'respondida'): ?>
                                    <button onclick="aprobarCotizacion(<?php echo $cotizacion['id']; ?>)" 
                                            class="btn btn-sm btn-success">
                                        <i class='bx bx-check'></i> Aprobar
                                    </button>
                                    <button onclick="rechazarCotizacion(<?php echo $cotizacion['id']; ?>)" 
                                            class="btn btn-sm btn-danger">
                                        <i class='bx bx-x'></i> Rechazar
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay cotizaciones disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Detalles -->
<div id="detalleModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Detalles de la Cotización</h2>
        <div id="detalleContent"></div>
    </div>
</div>

<script>
function verDetalle(id) {
    fetch(`process/get_cotizacion.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('detalleContent').innerHTML = `
                <div class="cotizacion-detalle">
                    <p><strong>Servicio:</strong> ${data.servicio_nombre}</p>
                    <p><strong>Descripción:</strong> ${data.descripcion_cliente}</p>
                    <p><strong>Área Aproximada:</strong> ${data.area_aproximada}m²</p>
                    <p><strong>Fecha Deseada:</strong> ${data.fecha_deseada}</p>
                    ${data.comentarios_admin ? `<p><strong>Comentarios:</strong> ${data.comentarios_admin}</p>` : ''}
                    ${data.precio_cotizado ? `<p><strong>Precio Cotizado:</strong> $${data.precio_cotizado}</p>` : ''}
                </div>
            `;
            document.getElementById('detalleModal').style.display = 'block';
        });
}

function aprobarCotizacion(id) {
    if (confirm('¿Está seguro de aprobar esta cotización?')) {
        fetch('process/aprobar_cotizacion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cotización aprobada correctamente');
                location.reload();
            } else {
                alert(data.message || 'Error al aprobar la cotización');
            }
        });
    }
}

function rechazarCotizacion(id) {
    if (confirm('¿Está seguro de rechazar esta cotización?')) {
        fetch('process/rechazar_cotizacion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Cotización rechazada');
                location.reload();
            } else {
                alert(data.message || 'Error al rechazar la cotización');
            }
        });
    }
}

// Cerrar modal
document.querySelector('.close').onclick = function() {
    document.getElementById('detalleModal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
</script>
