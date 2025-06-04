<?php
$usuario_id = $_SESSION['id'];
$sql = "SELECT c.*, s.nombre as servicio_nombre 
        FROM cotizaciones c
        JOIN servicios s ON c.servicio_id = s.id
        WHERE c.usuario_id = ?
        ORDER BY c.fecha_creacion DESC 
        LIMIT 5";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$cotizaciones = $stmt->get_result();
?>

<table class="mini-table">
    <thead>
        <tr>
            <th>Servicio</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($cotizaciones->num_rows > 0): ?>
            <?php while ($cotizacion = $cotizaciones->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cotizacion['servicio_nombre']); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($cotizacion['fecha_creacion'])); ?></td>
                    <td>
                        <span class="badge badge-<?php echo $cotizacion['estado']; ?>">
                            <?php echo ucfirst($cotizacion['estado']); ?>
                        </span>
                    </td>
                    <td>
                        <button onclick="verCotizacion(<?php echo $cotizacion['id']; ?>)" 
                                class="btn btn-sm btn-primary">
                            <i class='bx bx-show'></i>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay cotizaciones recientes</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<script>
function verDetalleServicio(id) {
    window.location.href = `?page=servicio_detalle&id=${id}`;
}

function verCotizacion(id) {
    window.location.href = `?page=cotizacion_detalle&id=${id}`;
}
</script>
