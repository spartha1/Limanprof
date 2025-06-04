<div class="data-section">
    <div class="data-header">
        <h1 class="title">Administración de Cotizaciones</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Cotizaciones</a></li>
        </ul>
    </div>

    <div class="table-container">
        <?php
        include("../config/config.php");
        $sql = "SELECT c.*, s.nombre as servicio_nombre, u.nombre_usuario 
                FROM cotizaciones c 
                JOIN servicios s ON c.servicio_id = s.id 
                JOIN usuarios u ON c.usuario_id = u.id 
                ORDER BY c.created_at DESC";
        $cotizaciones = $conexion->query($sql);
        ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Fecha Deseada</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cot = $cotizaciones->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cot['nombre_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($cot['servicio_nombre']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($cot['fecha_deseada'])); ?></td>
                        <td>
                            <span class="badge badge-<?php echo $cot['estado']; ?>">
                                <?php echo ucfirst($cot['estado']); ?>
                            </span>
                        </td>
                        <td>
                            <button onclick="verDetalle(<?php echo $cot['id']; ?>)" 
                                    class="btn btn-sm btn-primary">
                                <i class='bx bx-show'></i> Ver
                            </button>
                            <?php if ($cot['estado'] === 'pendiente'): ?>
                                <button onclick="responderCotizacion(<?php echo $cot['id']; ?>)" 
                                        class="btn btn-sm btn-success">
                                    <i class='bx bx-message-square-detail'></i> Responder
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para responder cotización -->
<div id="responderModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Responder Cotización</h2>
        <form id="responderForm" class="form-cotizacion">
            <input type="hidden" name="cotizacion_id" id="cotizacion_id">
            
            <div class="form-group">
                <label>Precio Cotizado ($)</label>
                <input type="number" name="precio" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Comentarios</label>
                <textarea name="comentarios" required></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-success">
                    <i class='bx bx-send'></i> Enviar Cotización
                </button>
                <button type="button" class="btn btn-danger" onclick="cerrarModal('responderModal')">
                    <i class='bx bx-x'></i> Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function responderCotizacion(id) {
    document.getElementById('cotizacion_id').value = id;
    document.getElementById('responderModal').style.display = 'block';
}

document.getElementById('responderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/responder_cotizacion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Cotización respondida correctamente');
            location.reload();
        } else {
            alert(data.message || 'Error al procesar la cotización');
        }
    });
});
</script>
