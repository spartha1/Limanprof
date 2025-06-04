<link rel="stylesheet" href="css/services.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Solicitar Servicio</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Solicitar Servicio</a></li>
        </ul>
    </div>

    <div class="services-wrapper">
        <?php
        include("../config/config.php");
        $sql = "SELECT id, nombre, descripcion, precio_base FROM servicios";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->get_result();
        ?>
        
        <div class="services-grid">
            <?php while ($servicio = $resultado->fetch_assoc()): ?>
                <div class="service-box">
                    <div class="service-content">
                        <div class="service-header">
                            <i class='bx bx-package icon'></i>
                            <h2><?php echo htmlspecialchars($servicio['nombre']); ?></h2>
                        </div>
                        <p class="description"><?php echo htmlspecialchars($servicio['descripcion']); ?></p>
                        <p class="price">Desde $<?php echo number_format($servicio['precio_base'], 2); ?></p>
                        <button class="btn" onclick="solicitarCotizacion(<?php echo $servicio['id']; ?>)">
                            <i class='bx bx-receipt'></i>
                            Solicitar Cotización
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<!-- Modal de cotización -->
<div id="cotizacionModal" class="modal">
    <div class="form-box">
        <span class="close">&times;</span>
        <h2 class="animacion" style="--i:0; --j:21;">Solicitar Cotización</h2>
        <form id="cotizacionForm">
            <input type="hidden" name="servicio_id" id="servicio_id">
            
            <div class="input-box animacion" style="--i:1; --j:22;">
                <textarea name="descripcion_cliente" required></textarea>
                <label>Descripción del Servicio</label>
                <i class='bx bx-detail'></i>
            </div>

            <div class="input-box animacion" style="--i:2; --j:23;">
                <input type="number" name="area_aproximada" step="0.01" required>
                <label>Área Aproximada (m²)</label>
                <i class='bx bx-area'></i>
            </div>

            <div class="input-box animacion" style="--i:3; --j:24;">
                <input type="date" name="fecha_deseada" required 
                       min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                <label>Fecha Deseada</label>
                <i class='bx bx-calendar'></i>
            </div>

            <button type="submit" class="btn animacion" style="--i:4; --j:25;">
                Solicitar Cotización
            </button>
        </form>
    </div>
</div>

<script>
function solicitarCotizacion(servicioId) {
    document.getElementById('servicio_id').value = servicioId;
    document.getElementById('cotizacionModal').style.display = 'block';
}

function cerrarModal() {
    document.getElementById('cotizacionModal').style.display = 'none';
}

document.getElementById('cotizacionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/save_cotizacion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Cotización solicitada correctamente');
            window.location.href = '?page=cotizaciones';
        } else {
            alert(data.message || 'Error al solicitar la cotización');
        }
    });
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('cotizacionModal').style.display = 'none';
});
</script>
