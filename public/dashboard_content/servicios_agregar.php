<link rel="stylesheet" href="css/forms.css">
<link rel="stylesheet" href="css/servicios.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Agregar Nuevo Servicio</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="?page=servicios_lista">Servicios</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Agregar Servicio</a></li>
        </ul>
    </div>

    <div class="form-container servicio-form">
        <h2>Información del Servicio</h2>
        <form id="servicioForm" class="profile-form">
            <div class="form-grid">
                <div class="form-group">
                    <input type="text" name="nombre" required>
                    <label>Nombre del Servicio</label>
                </div>
                
                <div class="form-group">
                    <select name="categoria" required>
                        <option value="" disabled selected></option>
                        <option value="limpieza">Limpieza</option>
                        <option value="mantenimiento">Mantenimiento</option>
                        <option value="jardinería">Jardinería</option>
                        <option value="especializados">Especializados</option>
                    </select>
                    <label>Categoría</label>
                </div>

                <div class="form-group">
                    <input type="number" name="precio" step="0.01" required>
                    <label>Precio Base ($MXN)</label>
                </div>

                <div class="form-group full-width">
                    <textarea name="descripcion" required></textarea>
                    <label>Descripción Detallada</label>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn-form">
                    <i class='bx bx-save'></i>
                    Guardar Servicio
                </button>
                <button type="button" onclick="window.location.href='?page=servicios_lista'" class="btn-form btn-cancel">
                    <i class='bx bx-x'></i>
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('servicioForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/save_servicio.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Servicio guardado correctamente');
            window.location.href = '?page=servicios_lista';
        } else {
            alert(data.message || 'Error al guardar el servicio');
        }
    });
});
</script>
