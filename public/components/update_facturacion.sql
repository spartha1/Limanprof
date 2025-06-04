-- Primero creamos la tabla si no existe
CREATE TABLE IF NOT EXISTS datos_facturacion (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    nombre_completo VARCHAR(255) NOT NULL,
    rfc VARCHAR(13) NOT NULL,
    direccion TEXT NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    estado VARCHAR(100) NOT NULL,
    codigo_postal VARCHAR(5) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Creamos la tabla de facturas si no existe
CREATE TABLE IF NOT EXISTS facturas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    datos_facturacion_id INT NOT NULL,
    numero_factura VARCHAR(20) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    subtotal DECIMAL(10,2) NOT NULL,
    iva DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente', 'pagada', 'cancelada') DEFAULT 'pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (datos_facturacion_id) REFERENCES datos_facturacion(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Creamos la tabla de detalles de factura si no existe
CREATE TABLE IF NOT EXISTS detalles_factura (
    id INT PRIMARY KEY AUTO_INCREMENT,
    factura_id INT NOT NULL,
    concepto VARCHAR(255) NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (factura_id) REFERENCES facturas(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Índices para mejorar el rendimiento
ALTER TABLE facturas ADD INDEX idx_usuario_id (usuario_id);
ALTER TABLE facturas ADD INDEX idx_datos_facturacion_id (datos_facturacion_id);
ALTER TABLE detalles_factura ADD INDEX idx_factura_id (factura_id);
