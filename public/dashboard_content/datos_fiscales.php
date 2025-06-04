<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/servicios.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Datos Fiscales</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Datos Fiscales</a></li>
        </ul>
    </div>

    <?php
    include("../config/config.php");
    $sql = "SELECT * FROM datos_facturacion WHERE usuario_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $datos = $resultado->fetch_assoc();
    ?>

    <div class="form-container servicio-form">
        <h2>Información Fiscal</h2>
        <form id="datosFiscalesForm" class="profile-form">
            <div class="form-grid">
                <div class="form-group">
                    <input type="text" name="nombre_completo" value="<?php echo $datos['nombre_completo'] ?? ''; ?>" required>
                    <label>Nombre o Razón Social</label>
                </div>
                
                <div class="form-group">
                    <input type="text" name="rfc" value="<?php echo $datos['rfc'] ?? ''; ?>" required 
                           pattern="^([A-ZÑ&]{3,4})(?:- )?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01]))(?:- )?([A-Z\d]{2})([A\d])$">
                    <label>RFC</label>
                </div>

                <div class="form-group full-width">
                    <input type="text" name="direccion" value="<?php echo $datos['direccion'] ?? ''; ?>" required>
                    <label>Dirección Fiscal</label>
                </div>

                <div class="form-group">
                    <input type="text" name="ciudad" value="<?php echo $datos['ciudad'] ?? ''; ?>" required>
                    <label>Ciudad</label>
                </div>

                <div class="form-group">
                    <input type="text" name="estado" value="<?php echo $datos['estado'] ?? ''; ?>" required>
                    <label>Estado</label>
                </div>

                <div class="form-group">
                    <input type="text" name="codigo_postal" value="<?php echo $datos['codigo_postal'] ?? ''; ?>" required pattern="[0-9]{5}">
                    <label>Código Postal</label>
                </div>

                <div class="form-group">
                    <input type="tel" name="telefono" value="<?php echo $datos['telefono'] ?? ''; ?>" required>
                    <label>Teléfono de Contacto</label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-form">
                    <i class='bx bx-save'></i>
                    Guardar Datos
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('datosFiscalesForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/save_datos_fiscales.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Datos fiscales guardados correctamente');
        } else {
            alert(data.message || 'Error al guardar los datos');
        }
    });
});
</script>
