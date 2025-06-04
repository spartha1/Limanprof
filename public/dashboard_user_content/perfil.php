<?php
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo '<div class="error-message">No has iniciado sesión</div>';
} else {
    include("../config/config.php");
    $id = (int)$_SESSION['id'];
    
    $sql = "SELECT u.*, df.rfc, df.direccion, df.ciudad, df.estado, df.codigo_postal 
            FROM usuarios u 
            LEFT JOIN datos_facturacion df ON u.id = df.usuario_id 
            WHERE u.id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $usuario = $stmt->get_result()->fetch_assoc();
?>

<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="css/modal.css">
<div class="content-data">
    <h1 class="title">Mi Perfil</h1>
    <ul class="breadcrumbs">
        <li><a href="?page=dashboard_main">Home</a></li>
        <li class="divider">/</li>
        <li><a href="#" class="active">Perfil</a></li>
    </ul>

    <div class="profile-container">
        <!-- Sección de portada y avatar -->
        <div class="profile-header">
            <?php include 'components/profile_header.php'; ?>
        </div>

        <div class="profile-body">
            <div class="profile-info">
                <div class="info-header">
                    <h2><?php echo htmlspecialchars($usuario['nombre_usuario']); ?></h2>
                    <span class="user-role">Cliente</span>
                </div>
                
                <div class="info-stats">
                    <div class="stat-item">
                        <i class='bx bx-calendar'></i>
                        <span>Cliente desde: <?php echo date('d M Y', strtotime($usuario['fecha_registro'])); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class='bx bx-envelope'></i>
                        <span><?php echo htmlspecialchars($usuario['email']); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class='bx bx-phone'></i>
                        <span><?php echo $usuario['codigo_pais'] . ' ' . $usuario['telefono']; ?></span>
                    </div>
                </div>

                <div class="profile-actions">
                    <button class="btn btn-edit" onclick="openEditModal()">
                        <i class='bx bx-edit'></i> Editar Perfil
                    </button>
                    <button class="btn btn-password" onclick="openPasswordModal()">
                        <i class='bx bx-lock-alt'></i> Cambiar Contraseña
                    </button>
                </div>
            </div>

            <div class="profile-sections">
                <!-- Sección Información Personal -->
                <div class="section">
                    <h3>Información Personal y Fiscal</h3>
                    <div class="section-content">
                        <form class="profile-form">
                            <div class="form-grid">
                                <!-- Datos Personales -->
                                <div class="form-group">
                                    <input type="text" value="<?php echo $usuario['nombre_usuario']; ?>" disabled>
                                    <label>Nombre de Usuario</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $usuario['rfc'] ?? 'No especificado'; ?>" disabled>
                                    <label>RFC</label>
                                </div>
                                <div class="form-group full-width">
                                    <input type="text" value="<?php echo $usuario['direccion'] ?? 'No especificada'; ?>" disabled>
                                    <label>Dirección Fiscal</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $usuario['ciudad'] ?? 'No especificada'; ?>" disabled>
                                    <label>Ciudad</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $usuario['estado'] ?? 'No especificado'; ?>" disabled>
                                    <label>Estado</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sección de Actividad Reciente -->
                <div class="section">
                    <h3>Actividad Reciente</h3>
                    <div class="activity-list">
                        <?php include 'dashboard_user_content/components/actividad_reciente.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/profile_modals.php'; ?>

<script>
document.getElementById('editProfileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    fetch('process/update_profile.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Perfil actualizado correctamente');
            location.reload();
        } else {
            alert(data.message || 'Error al actualizar el perfil');
        }
    });
});

document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    if (formData.get('new_password') !== formData.get('confirm_password')) {
        alert('Las contraseñas no coinciden');
        return;
    }
    
    fetch('process/change_password.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Contraseña actualizada correctamente');
            this.reset();
            closeModal('passwordModal');
        } else {
            alert(data.message || 'Error al cambiar la contraseña');
        }
    });
});

// Funciones para los modales
function openEditModal() {
    document.getElementById('editProfileModal').style.display = 'block';
}

function openPasswordModal() {
    document.getElementById('passwordModal').style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Cerrar modal al hacer clic fuera
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
</script>

<?php
}
?>
