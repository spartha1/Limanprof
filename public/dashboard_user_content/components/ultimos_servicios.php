<?php
$usuario_id = $_SESSION['id'];
$sql = "SELECT s.*, srv.nombre as servicio_nombre 
        FROM solicitudes_servicio s
        JOIN servicios srv ON s.servicio_id = srv.id
        WHERE s.usuario_id = ?
        ORDER BY s.fecha_solicitud DESC 
        LIMIT 5";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$servicios = $stmt->get_result();
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
                    <td>
                        <button onclick="verDetalleServicio(<?php echo $servicio['id']; ?>)" 
                                class="btn btn-sm btn-primary">
                            <i class='bx bx-show'></i>
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay servicios recientes</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
