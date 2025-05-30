document.addEventListener('DOMContentLoaded', function() {
    // Crear inputs ocultos para las imágenes
    const avatarInput = document.createElement('input');
    avatarInput.type = 'file';
    avatarInput.accept = 'image/*';
    avatarInput.style.display = 'none';
    document.body.appendChild(avatarInput);

    const coverInput = document.createElement('input');
    coverInput.type = 'file';
    coverInput.accept = 'image/*';
    coverInput.style.display = 'none';
    document.body.appendChild(coverInput);

    // Eventos para abrir selector de archivos
    document.querySelector('.change-avatar').addEventListener('click', () => {
        avatarInput.click();
    });

    document.querySelector('.change-cover').addEventListener('click', () => {
        coverInput.click();
    });

    // Manejar cambios en los inputs de archivo
    avatarInput.addEventListener('change', () => {
        handleImageUpload('avatar', avatarInput);
    });

    coverInput.addEventListener('change', () => {
        handleImageUpload('cover', coverInput);
    });

    function handleImageUpload(type, input) {
        if (!input.files || !input.files[0]) return;

        const formData = new FormData();
        formData.append('type', type);
        formData.append('image', input.files[0]);

        fetch('process/upload_image.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (type === 'avatar') {
                    document.querySelector('.avatar-img').src = data.path;
                } else {
                    document.querySelector('.cover-img').src = data.path;
                }
            } else {
                alert(data.message || 'Error al subir la imagen');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al subir la imagen');
        });
    }
});
