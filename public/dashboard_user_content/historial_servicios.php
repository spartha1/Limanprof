<?php
include("../config/config.php");
$usuario_id = $_SESSION['id'];

$sql = "SELECT s.*, srv.nombre as servicio_nombre, srv.descripcion 
        FROM solicitudes_servicio s
        JOIN servicios srv ON s.servicio_id = srv.id
        WHERE s.usuario_id = ?
        ORDER BY s.fecha_solicitud DESC";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$servicios = $stmt->get_result();
?>

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Historial de Servicios</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Historial</a></li>
        </ul>
    </div>

    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Servicio</th>
                    <th>Fecha Solicitud</th>
                    <th>Estado</th>
                    <th>Costo Final</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($servicios->num_rows > 0): ?>
                    <?php while ($servicio = $servicios->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($servicio['servicio_nombre']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($servicio['fecha_solicitud'])); ?></td>
                            <td>
                                <span class="badge badge-<?php echo $servicio['estado']; ?>">
                                    <?php echo ucfirst($servicio['estado']); ?>
                                </span>
                            </td>
                            <td>$<?php echo number_format($servicio['precio_final'], 2); ?></td>
                            <td>
                                <button onclick="verDetalles(<?php echo $servicio['id']; ?>)" class="btn btn-sm btn-primary">
                                    <i class='bx bx-show'></i> Ver Detalles
                                </button>
                                <?php if ($servicio['estado'] == 'completado'): ?>
                                    <button onclick="calificarServicio(<?php echo $servicio['id']; ?>)" class="btn btn-sm btn-success">
                                        <i class='bx bx-star'></i> Calificar
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hay servicios en tu historial</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detalles -->
<div id="detallesModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Detalles del Servicio</h2>
        <div id="detallesContent"></div>
    </div>
</div>

<!-- Modal Calificación -->
<div id="calificacionModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Calificar Servicio</h2>
        <form id="calificacionForm">
            <input type="hidden" name="servicio_id" id="servicio_id">
            <div class="rating">
                <i class='bx bx-star' data-value="1"></i>
                <i class='bx bx-star' data-value="2"></i>
                <i class='bx bx-star' data-value="3"></i>
                <i class='bx bx-star' data-value="4"></i>
                <i class='bx bx-star' data-value="5"></i>
            </div>
            <textarea name="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
            <button type="submit" class="btn-form">Enviar Calificación</button>
        </form>
    </div>
</div>

<script>
function verDetalles(id) {
    fetch(`process/get_servicio_detalles.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('detallesContent').innerHTML = `
                <div class="servicio-detalles">
                    <p><strong>Servicio:</strong> ${data.servicio_nombre}</p>
                    <p><strong>Fecha:</strong> ${data.fecha_solicitud}</p>
                    <p><strong>Estado:</strong> ${data.estado}</p>
                    <p><strong>Descripción:</strong> ${data.descripcion}</p>
                    <p><strong>Precio Final:</strong> $${data.precio_final}</p>
                    ${data.comentarios ? `<p><strong>Comentarios:</strong> ${data.comentarios}</p>` : ''}
                </div>
            `;
            document.getElementById('detallesModal').style.display = 'block';
        });
}

function calificarServicio(id) {
    document.getElementById('servicio_id').value = id;
    document.getElementById('calificacionModal').style.display = 'block';
}

// Manejo de estrellas
document.querySelectorAll('.rating i').forEach(star => {
    star.addEventListener('click', function() {
        const value = this.dataset.value;
        document.querySelectorAll('.rating i').forEach(s => {
            s.classList.remove('bxs-star');
            s.classList.add('bx-star');
            if (s.dataset.value <= value) {
                s.classList.remove('bx-star');
                s.classList.add('bxs-star');
            }
        });
    });
});

// Envío de calificación
document.getElementById('calificacionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/save_calificacion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('¡Gracias por tu calificación!');
            document.getElementById('calificacionModal').style.display = 'none';
            location.reload();
        } else {
            alert('Error al guardar la calificación');
        }
    });
});

// Cerrar modales
document.querySelectorAll('.close').forEach(closeBtn => {
    closeBtn.onclick = function() {
        this.closest('.modal').style.display = 'none';
    }
});

window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
</script>
