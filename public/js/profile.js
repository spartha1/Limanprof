document.addEventListener('DOMContentLoaded', function() {
    const avatarUpload = document.querySelector('.change-avatar');
    const coverUpload = document.querySelector('.change-cover');

    function handleImageUpload(type, input) {
        const formData = new FormData();
        formData.append('image', input.files[0]);
        formData.append('type', type);

        fetch('process/upload_image.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar la imagen en la página
                const imgElement = type === 'avatar' ? 
                    document.querySelector('.avatar-img') : 
                    document.querySelector('.cover-img');
                imgElement.src = data.path;
            } else {
                alert(data.message || 'Error al subir la imagen');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al subir la imagen');
        });
    }

    // Event listeners para subida de imágenes
    if (avatarUpload) {
        const avatarInput = document.createElement('input');
        avatarInput.type = 'file';
        avatarInput.accept = 'image/*';
        avatarInput.style.display = 'none';

        avatarUpload.addEventListener('click', () => avatarInput.click());
        avatarInput.addEventListener('change', () => handleImageUpload('avatar', avatarInput));
    }

    if (coverUpload) {
        const coverInput = document.createElement('input');
        coverInput.type = 'file';
        coverInput.accept = 'image/*';
        coverInput.style.display = 'none';

        coverUpload.addEventListener('click', () => coverInput.click());
        coverInput.addEventListener('change', () => handleImageUpload('cover', coverInput));
    }
});
