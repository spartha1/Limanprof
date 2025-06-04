<!-- Modal Editar Perfil -->
<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editProfileModal')">&times;</span>
        <h2>Editar Perfil</h2>
        <form id="editProfileForm" class="profile-form">
            <div class="form-grid">
                <div class="form-group">
                    <input type="text" name="nombre_usuario" value="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" required>
                    <label>Nombre de Usuario</label>
                </div>
                <div class="form-group">
                    <input type="text" name="rfc" value="<?php echo htmlspecialchars($usuario['rfc'] ?? ''); ?>">
                    <label>RFC</label>
                </div>
                <div class="form-group full-width">
                    <input type="text" name="direccion" value="<?php echo htmlspecialchars($usuario['direccion'] ?? ''); ?>">
                    <label>Dirección Fiscal</label>
                </div>
                <div class="form-group">
                    <input type="text" name="ciudad" value="<?php echo htmlspecialchars($usuario['ciudad'] ?? ''); ?>">
                    <label>Ciudad</label>
                </div>
                <div class="form-group">
                    <input type="text" name="estado" value="<?php echo htmlspecialchars($usuario['estado'] ?? ''); ?>">
                    <label>Estado</label>
                </div>
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
                <input type="password" name="current_password" required>
                <label>Contraseña Actual</label>
            </div>
            <div class="form-group">
                <input type="password" name="new_password" required>
                <label>Nueva Contraseña</label>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" required>
                <label>Confirmar Contraseña</label>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-form">Cambiar Contraseña</button>
                <button type="button" class="btn-form btn-cancel" onclick="closeModal('passwordModal')">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script src="js/profile.js"></script>
