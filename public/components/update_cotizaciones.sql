-- Primero eliminar la tabla si existe para crearla con la estructura correcta
DROP TABLE IF EXISTS cotizaciones;

-- Crear la tabla cotizaciones con la estructura completa
CREATE TABLE cotizaciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    servicio_id INT NOT NULL,
    usuario_id INT NOT NULL,
    descripcion_cliente TEXT,
    area_aproximada DECIMAL(10,2),
    fecha_deseada DATE,
    estado ENUM('pendiente', 'en_proceso', 'respondida', 'aceptada', 'rechazada') DEFAULT 'pendiente',
    precio_cotizado DECIMAL(10,2),
    comentarios_admin TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (servicio_id) REFERENCES servicios(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Verificar que la tabla servicios existe y tiene la estructura correcta
CREATE TABLE IF NOT EXISTS servicios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio_base DECIMAL(10,2) NOT NULL,
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla de seguimiento si no existe
CREATE TABLE IF NOT EXISTS seguimiento_estados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    entidad VARCHAR(50) NOT NULL,
    entidad_id INT NOT NULL,
    estado_anterior VARCHAR(50),
    estado_nuevo VARCHAR(50),
    comentarios TEXT,
    usuario_id INT NOT NULL,
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabla de notificaciones
CREATE TABLE IF NOT EXISTS notificaciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    mensaje TEXT NOT NULL,
    leida BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
