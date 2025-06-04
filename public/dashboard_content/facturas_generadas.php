<link rel="stylesheet" href="css/tables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables-custom.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Facturas Generadas</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Facturas Generadas</a></li>
        </ul>
    </div>

    <div class="table-wrapper">
        <div class="table-header">
            <h2>Historial de Facturas</h2>
            <div class="table-actions">
                <button class="btn btn-success" onclick="exportarFacturas()">
                    <i class='bx bx-export'></i> Exportar
                </button>
            </div>
        </div>
        
        <div class="table-container">
            <table id="facturasTable" class="display">
                <thead>
                    <tr>
                        <th>Nº Factura</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../config/config.php");
                    $sql = "SELECT f.*, u.nombre_usuario 
                            FROM facturas f 
                            JOIN usuarios u ON f.usuario_id = u.id 
                            WHERE f.estado = 'generada'
                            ORDER BY f.fecha_emision DESC";
                    $resultado = mysqli_query($conexion, $sql);
                    
                    while ($factura = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($factura['numero_factura']) . "</td>";
                        echo "<td>" . htmlspecialchars($factura['nombre_usuario']) . "</td>";
                        echo "<td>" . date('d/m/Y', strtotime($factura['fecha_emision'])) . "</td>";
                        echo "<td>$" . number_format($factura['total'], 2) . "</td>";
                        echo "<td><span class='badge badge-success'>Generada</span></td>";
                        echo "<td>
                                <button onclick='verFactura({$factura['id']})' class='btn btn-sm btn-success'>
                                    <i class='bx bx-show'></i> Ver
                                </button>
                                <button onclick='descargarPDF({$factura['id']})' class='btn btn-sm btn-warning'>
                                    <i class='bx bx-download'></i> PDF
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
    $('#facturasTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
        },
        order: [[2, 'desc']], // Ordenar por fecha descendente
        responsive: true
    });
});

function verFactura(id) {
    window.location.href = `?page=ver_factura&id=${id}`;
}

function descargarPDF(id) {
    window.open(`process/generar_pdf_factura.php?id=${id}`, '_blank');
}

function exportarFacturas() {
    window.location.href = 'process/exportar_facturas.php';
}
</script>
