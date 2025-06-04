<link rel="stylesheet" href="css/perfil.css">
<link rel="stylesheet" href="css/modal.css">
<link rel="stylesheet" href="css/user-forms.css">

<div class="data-section">
    <div class="data-header">
        <h1 class="title">Cambiar Contraseña</h1>
        <ul class="breadcrumbs">
            <li><a href="?page=dashboard_main">Home</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Cambiar Contraseña</a></li>
        </ul>
    </div>

    <div class="password-form-container">
        <h2>Cambiar Contraseña</h2>
        <form id="passwordForm" class="profile-form">
            <div class="form-grid">
                <div class="form-group full-width">
                    <input type="password" name="current_password" required>
                    <label>Contraseña Actual</label>
                </div>

                <div class="form-group full-width">
                    <input type="password" name="new_password" id="new_password" required>
                    <label>Nueva Contraseña</label>
                </div>

                <div class="form-group full-width">
                    <input type="password" name="confirm_password" id="confirm_password" required>
                    <label>Confirmar Nueva Contraseña</label>
                </div>
            </div>

            <div class="password-requirements">
                <h3>La contraseña debe contener:</h3>
                <ul>
                    <li id="length">Mínimo 8 caracteres</li>
                    <li id="letter">Una letra minúscula</li>
                    <li id="capital">Una letra mayúscula</li>
                    <li id="number">Un número</li>
                    <li id="special">Un carácter especial</li>
                </ul>
            </div>
            
            <div class="btn-form-container">
                <button type="submit" class="btn-form">
                    <i class='bx bx-lock-alt'></i> Actualizar Contraseña
                </button>
                <button type="button" class="btn-form cancel">Cancelar</button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const newPass = document.getElementById('new_password').value;
    const confirmPass = document.getElementById('confirm_password').value;

    if (newPass !== confirmPass) {
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
            this.reset();
        } else {
            alert(data.message || 'Error al cambiar la contraseña');
        }
    });
});

// Validación en tiempo real de la contraseña
document.getElementById('new_password').addEventListener('keyup', function() {
    const password = this.value;
    
    document.getElementById('length').style.color = 
        password.length >= 8 ? '#00c851' : '#ff4444';
    
    document.getElementById('letter').style.color = 
        /[a-z]/.test(password) ? '#00c851' : '#ff4444';
    
    document.getElementById('capital').style.color = 
        /[A-Z]/.test(password) ? '#00c851' : '#ff4444';
    
    document.getElementById('number').style.color = 
        /[0-9]/.test(password) ? '#00c851' : '#ff4444';
    
    document.getElementById('special').style.color = 
        /[^A-Za-z0-9]/.test(password) ? '#00c851' : '#ff4444';
});
</script>
