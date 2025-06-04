<div class="data-section">
    <div class="data-header">
        <h1 class="title">Cotizaciones Pendientes</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Cotizaciones Pendientes</a></li>
        </ul>
    </div>

    <div class="table-container">
        <?php
        include("../config/config.php");
        $sql = "SELECT c.*, s.nombre as servicio_nombre, u.nombre_usuario 
                FROM cotizaciones c 
                JOIN servicios s ON c.servicio_id = s.id 
                JOIN usuarios u ON c.usuario_id = u.id 
                WHERE c.estado = 'pendiente'
                ORDER BY c.created_at DESC";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $cotizaciones = $stmt->get_result();
        ?>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha Solicitada</th>
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
                                <button onclick="responderCotizacion(<?php echo $cot['id']; ?>)" 
                                        class="btn btn-sm btn-primary">
                                    <i class='bx bx-message-square-detail'></i> Responder
                                </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de Respuesta -->
<div id="responderModal" class="modal">
    <div class="form-box">
        <span class="close">&times;</span>
        <h2 class="animacion" style="--i:0; --j:21;">Responder Cotización</h2>
        <form id="responderForm">
            <input type="hidden" name="cotizacion_id" id="cotizacion_id">
            
            <div class="input-box animacion" style="--i:1; --j:22;">
                <input type="number" name="precio" step="0.01" required>
                <label>Precio Cotizado ($)</label>
                <i class='bx bx-dollar'></i>
            </div>

            <div class="input-box animacion" style="--i:2; --j:23;">
                <textarea name="comentarios" required></textarea>
                <label>Comentarios</label>
                <i class='bx bx-message-detail'></i>
            </div>

            <button type="submit" class="btn animacion" style="--i:3; --j:24;">
                Enviar Cotización
            </button>
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

// Cerrar modal
document.querySelector('.close').onclick = function() {
    document.getElementById('responderModal').style.display = 'none';
}
</script>
