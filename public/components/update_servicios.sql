-- Tabla de servicios disponibles
CREATE TABLE IF NOT EXISTS servicios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio_base DECIMAL(10,2) NOT NULL,
    imagen VARCHAR(255) DEFAULT 'img/services/default.jpg',
    activo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de cotizaciones
CREATE TABLE IF NOT EXISTS cotizaciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    servicio_id INT NOT NULL,
    descripcion_cliente TEXT,
    area_aproximada DECIMAL(10,2),
    fecha_deseada DATE,
    estado ENUM('pendiente', 'en_proceso', 'respondida', 'aceptada', 'rechazada') DEFAULT 'pendiente',
    precio_cotizado DECIMAL(10,2),
    comentarios_admin TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

-- Tabla de solicitudes de servicio
CREATE TABLE IF NOT EXISTS solicitudes_servicio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cotizacion_id INT,
    usuario_id INT NOT NULL,
    servicio_id INT NOT NULL,
    fecha_solicitud TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_programada DATE,
    estado ENUM('pendiente', 'aprobada', 'en_proceso', 'completada', 'cancelada') DEFAULT 'pendiente',
    precio_final DECIMAL(10,2),
    comentarios TEXT,
    calificacion INT CHECK (calificacion BETWEEN 1 AND 5),
    comentario_calificacion TEXT,
    FOREIGN KEY (cotizacion_id) REFERENCES cotizaciones(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (servicio_id) REFERENCES servicios(id)
);

-- Tabla para seguimiento de estados
CREATE TABLE IF NOT EXISTS seguimiento_servicio (
    id INT PRIMARY KEY AUTO_INCREMENT,
    solicitud_id INT NOT NULL,
    estado_anterior VARCHAR(50),
    estado_nuevo VARCHAR(50),
    comentarios TEXT,
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuario_id INT NOT NULL,
    FOREIGN KEY (solicitud_id) REFERENCES solicitudes_servicio(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
