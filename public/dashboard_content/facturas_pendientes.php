<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables-custom.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Facturas Pendientes</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Facturas Pendientes</a></li>
        </ul>
    </div>

    <div class="table-wrapper">
        <div class="table-header">
            <h2>Facturas por Procesar</h2>
        </div>
        
        <div class="table-container">
            <table id="facturasPendientesTable" class="display">
                <thead>
                    <tr>
                        <th>ID Solicitud</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha Solicitud</th>
                        <th>Total Estimado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../config/config.php");
                    $sql = "SELECT s.*, u.nombre_usuario, srv.nombre as servicio 
                            FROM solicitudes_servicio s
                            JOIN usuarios u ON s.usuario_id = u.id 
                            JOIN servicios srv ON s.servicio_id = srv.id
                            WHERE s.estado = 'completada' 
                            AND s.id NOT IN (SELECT solicitud_id FROM facturas WHERE solicitud_id IS NOT NULL)";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    while ($solicitud = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($solicitud['solicitud_id'] ?? 'SOL-'.$solicitud['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($solicitud['nombre_usuario']) . "</td>";
                        echo "<td>" . htmlspecialchars($solicitud['servicio']) . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($solicitud['fecha_solicitud'])) . "</td>";
                        echo "<td>$" . number_format($solicitud['precio_final'], 2) . "</td>";
                        echo "<td>
                                <button onclick='generarFactura({$solicitud['id']})' class='btn btn-sm btn-success'>
                                    <i class='bx bx-file'></i> Generar Factura
                                </button>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#facturasPendientesTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        order: [[3, 'desc']], // Ordenar por fecha descendente
        responsive: true
    });
});

function generarFactura(solicitudId) {
    if(confirm('¿Desea generar la factura para esta solicitud?')) {
        window.location.href = `?page=generar_factura&solicitud_id=${solicitudId}`;
    }
}
</script>
