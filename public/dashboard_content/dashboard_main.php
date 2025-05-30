<?php
include("../config/config.php");

// Obtener estadísticas generales
$sql_usuarios = "SELECT COUNT(*) as total FROM usuarios WHERE tipo='usuario'";
$sql_admins = "SELECT COUNT(*) as total FROM usuarios WHERE tipo='admin'";
$sql_productos = "SELECT COUNT(*) as total FROM productos";
$sql_servicios = "SELECT COUNT(*) as total FROM servicios";

$usuarios = mysqli_fetch_assoc(mysqli_query($conexion, $sql_usuarios))['total'];
$admins = mysqli_fetch_assoc(mysqli_query($conexion, $sql_admins))['total'];
$productos = mysqli_fetch_assoc(mysqli_query($conexion, $sql_productos))['total'];
$servicios = mysqli_fetch_assoc(mysqli_query($conexion, $sql_servicios))['total'];

// Obtener mensajes recientes
$sql_mensajes = "SELECT * FROM mensajes_contacto ORDER BY fecha_envio DESC LIMIT 5";
$mensajes = mysqli_query($conexion, $sql_mensajes);
?>

<h1 class="title">Dashboard</h1>
<ul class="breadcrumbs">
    <li><a href="dashboard_administrador.php">Home</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Dashboard</a></li>
</ul>

<div class="info-data">
    <div class="card">
        <div class="head">
            <div>
                <h2><?php echo $usuarios; ?></h2>
                <p>Clientes</p>
            </div>
            <i class='bx bx-user icon'></i>
        </div>
        <span class="progress" data-value="40%"></span>
        <span class="label">40% más que el mes pasado</span>
    </div>
    <div class="card">
        <div class="head">
            <div>
                <h2><?php echo $admins; ?></h2>
                <p>Administradores</p>
            </div>
            <i class='bx bx-user-check icon'></i>
        </div>
        <span class="progress" data-value="60%"></span>
        <span class="label">Total de administradores</span>
    </div>
    <div class="card">
        <div class="head">
            <div>
                <h2><?php echo $productos; ?></h2>
                <p>Productos</p>
            </div>
            <i class='bx bx-shopping-bag icon'></i>
        </div>
        <span class="progress" data-value="30%"></span>
        <span class="label">Productos en inventario</span>
    </div>
    <div class="card">
        <div class="head">
            <div>
                <h2><?php echo $servicios; ?></h2>
                <p>Servicios</p>
            </div>
            <i class='bx bx-briefcase icon'></i>
        </div>
        <span class="progress" data-value="80%"></span>
        <span class="label">Servicios activos</span>
    </div>
</div>

<div class="data">
    <div class="content-data">
        <div class="head">
            <h3>Reporte de Ventas</h3>
            <div class="menu">
                <i class='bx bx-dots-horizontal-rounded icon'></i>
                <ul class="menu-link">
                    <li><a href="#">Exportar PDF</a></li>
                    <li><a href="#">Exportar Excel</a></li>
                    <li><a href="#">Actualizar Datos</a></li>
                </ul>
            </div>
        </div>
        <div class="chart">
            <div id="chart"></div>
        </div>
    </div>
    
    <div class="content-data">
        <div class="head">
            <h3>Mensajes Recientes</h3>
            <div class="menu">
                <i class='bx bx-dots-horizontal-rounded icon'></i>
                <ul class="menu-link">
                    <li><a href="#">Ver Todos</a></li>
                    <li><a href="#">Marcar Como Leídos</a></li>
                </ul>
            </div>
        </div>
        <div class="chat-box">
            <p class="day"><span>Mensajes de Contacto</span></p>
            <?php while($mensaje = mysqli_fetch_assoc($mensajes)): ?>
            <div class="msg">
                <i class='bx bx-user-circle' style="font-size: 2rem; margin-right: 10px;"></i>
                <div class="chat">
                    <div class="profile">
                        <span class="username"><?php echo htmlspecialchars($mensaje['nombre_completo']); ?></span>
                        <span class="time"><?php echo date('H:i', strtotime($mensaje['fecha_envio'])); ?></span>
                    </div>
                    <p><?php echo htmlspecialchars($mensaje['asunto']); ?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <form action="#">
            <div class="form-group">
                <input type="text" placeholder="Buscar mensajes...">
                <button type="submit" class="btn-send"><i class='bx bx-search'></i></button>
            </div>
        </form>
    </div>
</div>

<script>
// Configuración del gráfico
var options = {
    series: [{
        name: 'Ventas',
        data: [31, 40, 28, 51, 42, 109, 100]
    }, {
        name: 'Servicios',
        data: [11, 32, 45, 32, 34, 52, 41]
    }],
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: true
        },
    },
    colors: ['#0ef', '#081b29'],
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: [
            "2025-05-24T00:00:00.000Z",
            "2025-05-25T00:00:00.000Z",
            "2025-05-26T00:00:00.000Z",
            "2025-05-27T00:00:00.000Z",
            "2025-05-28T00:00:00.000Z",
            "2025-05-29T00:00:00.000Z",
            "2025-05-30T00:00:00.000Z"
        ]
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy'
        },
    },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>
