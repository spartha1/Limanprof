<?php
include_once("../config/config.php");
$usuario_id = $_SESSION['id'];

// Obtener contadores para las tarjetas
$sql_servicios = "SELECT COUNT(*) as total FROM solicitudes_servicio 
                  WHERE usuario_id = ? AND estado = 'en_proceso'";
$stmt = $conexion->prepare($sql_servicios);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$servicios_activos = $stmt->get_result()->fetch_assoc()['total'];

$sql_cotizaciones = "SELECT COUNT(*) as total FROM cotizaciones 
                     WHERE usuario_id = ? AND estado = 'pendiente'";
$stmt = $conexion->prepare($sql_cotizaciones);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$cotizaciones_pendientes = $stmt->get_result()->fetch_assoc()['total'];

$sql_pedidos = "SELECT COUNT(*) as total FROM ordenes 
                WHERE usuario_id = ? AND estado IN ('pendiente', 'en_proceso')";
$stmt = $conexion->prepare($sql_pedidos);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$pedidos_proceso = $stmt->get_result()->fetch_assoc()['total'];
?>

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Mi Dashboard</h1>
        <ul class="breadcrumbs">
            <li><a href="#" class="active">Home</a></li>
        </ul>
    </div>

    <div class="info-data">
        <div class="card">
            <div class="head">
                <div>
                    <h2><?php echo $servicios_activos ?? 0; ?></h2>
                    <p>Servicios Activos</p>
                </div>
                <i class='bx bxs-calendar-check icon'></i>
            </div>
        </div>

        <div class="card">
            <div class="head">
                <div>
                    <h2><?php echo $cotizaciones_pendientes ?? 0; ?></h2>
                    <p>Cotizaciones Pendientes</p>
                </div>
                <i class='bx bxs-file icon'></i>
            </div>
        </div>

        <div class="card">
            <div class="head">
                <div>
                    <h2><?php echo $pedidos_proceso ?? 0; ?></h2>
                    <p>Pedidos en Proceso</p>
                </div>
                <i class='bx bxs-shopping-bag icon'></i>
            </div>
        </div>
    </div>

    <div class="data">
        <div class="content-data">
            <div class="head">
                <h3>Últimos Servicios</h3>
                <div class="menu">
                    <i class='bx bx-dots-horizontal-rounded icon'></i>
                    <ul class="menu-link">
                        <li><a href="?page=historial_servicios">Ver Todos</a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <?php include 'components/ultimos_servicios.php'; ?>
            </div>
        </div>

        <div class="content-data">
            <div class="head">
                <h3>Cotizaciones Recientes</h3>
                <div class="menu">
                    <i class='bx bx-dots-horizontal-rounded icon'></i>
                    <ul class="menu-link">
                        <li><a href="?page=cotizaciones">Ver Todas</a></li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <?php include 'components/cotizaciones_recientes.php'; ?>
            </div>
        </div>
    </div>
</div>
