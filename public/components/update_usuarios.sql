ALTER TABLE usuarios
ADD COLUMN avatar_path VARCHAR(255) DEFAULT 'img/avatars/default-avatar.jpg' AFTER foto_perfil,
ADD COLUMN cover_path VARCHAR(255) DEFAULT 'img/covers/default-cover.jpg' AFTER avatar_path,
ADD COLUMN biografia TEXT DEFAULT 'Usuario de Limanprof' AFTER cover_path,
ADD COLUMN ultima_conexion TIMESTAMP NULL DEFAULT NULL AFTER biografia,
MODIFY COLUMN fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;

-- Actualizar registros existentes
UPDATE usuarios 
SET avatar_path = 'img/avatars/default-avatar.jpg',
    cover_path = 'img/covers/default-cover.jpg',
    biografia = 'Usuario de Limanprof'
WHERE avatar_path IS NULL;

-- Crear índice para búsquedas más rápidas
CREATE INDEX idx_usuario_tipo ON usuarios(tipo);
