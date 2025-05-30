<?php
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    echo '<div class="error-message">No has iniciado sesión o la sesión ha expirado</div>';
    echo '<pre>DEBUG: '; print_r($_SESSION); echo '</pre>'; // Temporal para debug
} else {
    include("../config/config.php");
    $id = (int)$_SESSION['id'];
    
    try {
        $sql = "SELECT *, COALESCE(biografia, 'Usuario de Limanprof') as biografia FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();

        if (!$usuario) {
            echo '<div class="error-message">Error: Usuario no encontrado (ID: '.$id.')</div>';
        } else {
?>
<link rel="stylesheet" href="css/perfil.css">
<div class="content-data">
    <h1 class="title">Mi Perfil</h1>
    <ul class="breadcrumbs">
        <li><a href="?page=dashboard_main">Home</a></li>
        <li class="divider">/</li>
        <li><a href="#" class="active">Perfil</a></li>
    </ul>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-cover">
                <img src="<?php echo htmlspecialchars($usuario['cover_path'] ?? 'img/covers/default-cover.jpg'); ?>" alt="Portada" class="cover-img">
                <div class="change-cover">
                    <i class='bx bx-camera'></i>
                    <span>Cambiar portada</span>
                </div>
            </div>
            <div class="profile-avatar">
                <img src="<?php echo htmlspecialchars($usuario['avatar_path'] ?? 'img/avatars/default-avatar.jpg'); ?>" 
                     alt="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" 
                     class="avatar-img">
                <div class="change-avatar">
                    <i class='bx bx-camera'></i>
                </div>
            </div>
        </div>

        <div class="profile-body">
            <div class="profile-info">
                <div class="info-header">
                    <h2><?php echo htmlspecialchars($usuario['nombre_usuario']); ?></h2>
                    <span class="user-role"><?php echo ucfirst(htmlspecialchars($usuario['tipo'])); ?></span>
                </div>
                
                <div class="info-stats">
                    <div class="stat-item">
                        <i class='bx bx-calendar'></i>
                        <span>Miembro desde: <?php echo date('d M Y', strtotime($usuario['fecha_registro'])); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class='bx bx-envelope'></i>
                        <span><?php echo htmlspecialchars($usuario['email']); ?></span>
                    </div>
                    <div class="stat-item">
                        <i class='bx bx-phone'></i>
                        <span><?php 
                            $codigo_pais = $usuario['codigo_pais'] ? '(' . $usuario['codigo_pais'] . ')' : '';
                            echo $codigo_pais . ' ' . htmlspecialchars($usuario['telefono'] ?? 'No especificado'); 
                        ?></span>
                    </div>
                </div>

                <div class="profile-actions">
                    <button class="btn btn-edit" onclick="openEditModal()">
                        <i class='bx bx-edit'></i>
                        Editar Perfil
                    </button>
                    <button class="btn btn-password" onclick="openPasswordModal()">
                        <i class='bx bx-lock-alt'></i>
                        Cambiar Contraseña
                    </button>
                </div>
            </div>

            <div class="profile-sections">
                <div class="section">
                    <h3>Información Personal</h3>
                    <div class="section-content">
                        <form class="profile-form">
                            <div class="form-group">
                                <label>Nombre Completo</label>
                                <input type="text" value="<?php echo $usuario['nombre_usuario']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="<?php echo $usuario['email']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="tel" value="<?php echo $usuario['telefono']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Biografía</label>
                                <textarea disabled>Usuario de Limanprof</textarea>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="section">
                    <h3>Actividad Reciente</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <i class='bx bx-log-in'></i>
                            <div class="activity-info">
                                <p>Último inicio de sesión</p>
                                <span>Hace 2 horas</span>
                            </div>
                        </div>
                        <!-- Más items de actividad aquí -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Perfil -->
<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editProfileModal')">&times;</span>
        <h2>Editar Perfil</h2>
        <form id="editProfileForm" class="profile-form">
            <div class="form-group">
                <label>Nombre de Usuario</label>
                <input type="text" name="nombre_usuario" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            <div class="form-group">
                <label>Código País</label>
                <input type="text" name="codigo_pais" value="<?php echo htmlspecialchars($usuario['codigo_pais']); ?>" required>
            </div>
            <div class="form-group">
                <label>Teléfono</label>
                <input type="tel" name="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
            </div>
            <div class="form-group">
                <label>Biografía</label>
                <textarea name="biografia"><?php echo htmlspecialchars($usuario['biografia']); ?></textarea>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-form">Guardar Cambios</button>
                <button type="button" class="btn-form btn-cancel" onclick="closeModal('editProfileModal')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Cambiar Contraseña -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('passwordModal')">&times;</span>
        <h2>Cambiar Contraseña</h2>
        <form id="passwordForm" class="profile-form">
            <div class="form-group">
                <label>Contraseña Actual</label>
                <input type="password" name="current_password" required>
            </div>
            <div class="form-group">
                <label>Nueva Contraseña</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-form">Cambiar Contraseña</button>
                <button type="button" class="btn-form btn-cancel" onclick="closeModal('passwordModal')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="css/modal.css">
<script>
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

// Cerrar modal al hacer clic fuera de él
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = "none";
    }
}

// Manejar envío de formularios
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
            closeModal('editProfileModal');
            location.reload();
        } else {
            alert(data.message || 'Error al actualizar el perfil');
        }
    });
});

document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    if (this.new_password.value !== this.confirm_password.value) {
        alert('Las contraseñas no coinciden');
        return;
    }
    
    const formData = new FormData(this);
    
    fetch('process/change_password.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Contraseña actualizada correctamente');
            closeModal('passwordModal');
        } else {
            alert(data.message || 'Error al cambiar la contraseña');
        }
    });
});
</script>

<?php
        }
    } catch (Exception $e) {
        echo '<div class="error-message">Error en la base de datos: ' . $e->getMessage() . '</div>';
    }
}
?>
