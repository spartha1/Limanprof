<?php
$usuario_id = $_SESSION['id'];
// Modificada la consulta para usar created_at en lugar de fecha_creacion
$sql = "SELECT c.id, c.estado, c.created_at, 
               s.nombre as servicio_nombre, 
               COALESCE(c.precio_cotizado, s.precio_base) as precio 
        FROM cotizaciones c 
        JOIN servicios s ON c.servicio_id = s.id 
        WHERE c.usuario_id = ? 
        ORDER BY c.created_at DESC 
        LIMIT 5";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$cotizaciones = $stmt->get_result();
?>

<div class="content-data">
    <div class="head">
        <h3>Cotizaciones Recientes</h3>
    </div>
    
    <table class="mini-table">
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($cotizaciones->num_rows > 0): ?>
                <?php while ($cot = $cotizaciones->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cot['servicio_nombre']); ?></td>
                        <td>
                            <span class="badge badge-<?php echo $cot['estado']; ?>">
                                <?php echo ucfirst($cot['estado']); ?>
                            </span>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($cot['created_at'])); ?></td>
                        <td>$<?php echo number_format($cot['precio'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No hay cotizaciones recientes</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function verDetalleServicio(id) {
    window.location.href = `?page=servicio_detalle&id=${id}`;
}

function verCotizacion(id) {
    window.location.href = `?page=cotizacion_detalle&id=${id}`;
}
</script>
