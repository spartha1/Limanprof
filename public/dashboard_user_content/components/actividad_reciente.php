<?php
// Obtener actividad reciente del usuario
$usuario_id = $_SESSION['id'];
$sql = "SELECT hs.*, COALESCE(ss.servicio_id, o.id) as item_id,
        CASE 
            WHEN hs.entidad = 'solicitud' THEN srv.nombre
            WHEN hs.entidad = 'orden' THEN 'Pedido #' || o.id
        END as item_nombre
        FROM historial_estados hs
        LEFT JOIN solicitudes_servicio ss ON hs.entidad = 'solicitud' AND hs.entidad_id = ss.id
        LEFT JOIN servicios srv ON ss.servicio_id = srv.id
        LEFT JOIN ordenes o ON hs.entidad = 'orden' AND hs.entidad_id = o.id
        WHERE (ss.usuario_id = ? OR o.usuario_id = ?)
        ORDER BY hs.fecha_cambio DESC
        LIMIT 5";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ii", $usuario_id, $usuario_id);
$stmt->execute();
$actividades = $stmt->get_result();

if ($actividades->num_rows > 0):
    while ($actividad = $actividades->fetch_assoc()):
        $icono = '';
        $color = '';
        
        // Determinar icono y color según el tipo de actividad
        switch ($actividad['estado_nuevo']) {
            case 'completada':
                $icono = 'bx-check-circle';
                $color = 'success';
                break;
            case 'pendiente':
                $icono = 'bx-time';
                $color = 'warning';
                break;
            case 'cancelada':
                $icono = 'bx-x-circle';
                $color = 'danger';
                break;
            default:
                $icono = 'bx-info-circle';
                $color = 'info';
        }
?>
        <div class="activity-item">
            <i class='bx <?php echo $icono; ?> text-<?php echo $color; ?>'></i>
            <div class="activity-info">
                <p>
                    <?php 
                    echo ucfirst($actividad['entidad']) . ': ' . 
                         $actividad['item_nombre'] . ' - ' . 
                         ucfirst($actividad['estado_nuevo']);
                    ?>
                </p>
                <span>
                    <?php
                    $fecha = new DateTime($actividad['fecha_cambio']);
                    echo $fecha->format('d/m/Y H:i');
                    ?>
                </span>
            </div>
        </div>
<?php
    endwhile;
else:
?>
    <div class="activity-item">
        <i class='bx bx-info-circle'></i>
        <div class="activity-info">
            <p>No hay actividad reciente</p>
        </div>
    </div>
<?php
endif;
?>
