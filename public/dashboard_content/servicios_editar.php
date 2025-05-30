<?php
if (!isset($_GET['id'])) {
    header('Location: ?page=servicios_lista');
    exit;
}

include("../config/config.php");
$id = (int)$_GET['id'];
$sql = "SELECT * FROM servicios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$servicio = $resultado->fetch_assoc();

if (!$servicio) {
    header('Location: ?page=servicios_lista');
    exit;
}
?>

<link rel="stylesheet" href="css/forms.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Editar Servicio</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="?page=servicios_lista">Servicios</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Editar Servicio</a></li>
        </ul>
    </div>

    <div class="form-container">
        <form id="servicioForm" class="profile-form">
            <input type="hidden" name="id" value="<?php echo $servicio['id']; ?>">
            
            <div class="form-group">
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($servicio['nombre']); ?>" required>
                <label>Nombre del Servicio</label>
            </div>
            
            <div class="form-group">
                <textarea name="descripcion" required><?php echo htmlspecialchars($servicio['descripcion']); ?></textarea>
                <label>Descripción</label>
            </div>
            
            <div class="form-group">
                <input type="number" name="precio" step="0.01" value="<?php echo $servicio['precio']; ?>" required>
                <label>Precio</label>
            </div>
            
            <div class="form-group">
                <select name="categoria" required>
                    <option value="limpieza" <?php echo $servicio['categoria'] == 'limpieza' ? 'selected' : ''; ?>>Limpieza</option>
                    <option value="mantenimiento" <?php echo $servicio['categoria'] == 'mantenimiento' ? 'selected' : ''; ?>>Mantenimiento</option>
                    <option value="jardinería" <?php echo $servicio['categoria'] == 'jardinería' ? 'selected' : ''; ?>>Jardinería</option>
                    <option value="especializados" <?php echo $servicio['categoria'] == 'especializados' ? 'selected' : ''; ?>>Especializados</option>
                </select>
                <label>Categoría</label>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-form">Actualizar Servicio</button>
                <button type="button" onclick="window.location.href='?page=servicios_lista'" class="btn-form btn-cancel">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('servicioForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/update_servicio.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Servicio actualizado correctamente');
            window.location.href = '?page=servicios_lista';
        } else {
            alert(data.message || 'Error al actualizar el servicio');
        }
    });
});
</script>
