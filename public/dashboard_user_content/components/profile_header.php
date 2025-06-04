<div class="profile-cover">
    <img src="<?php echo $usuario['cover_path'] ?? 'img/covers/default-cover.jpg'; ?>" alt="Portada" class="cover-img">
    <div class="change-cover" onclick="document.getElementById('coverInput').click();">
        <i class='bx bx-camera'></i>
        <span>Cambiar portada</span>
    </div>
    <input type="file" id="coverInput" style="display: none;" accept="image/*">
</div>
<div class="profile-avatar">
    <img src="<?php echo $usuario['avatar_path'] ?? 'img/avatars/default-avatar.jpg'; ?>" 
         alt="<?php echo htmlspecialchars($usuario['nombre_usuario']); ?>" 
         class="avatar-img">
    <div class="change-avatar" onclick="document.getElementById('avatarInput').click();">
        <i class='bx bx-camera'></i>
    </div>
    <input type="file" id="avatarInput" style="display: none;" accept="image/*">
</div>
