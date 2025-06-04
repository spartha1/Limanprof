-- Verificar y agregar columnas en facturas si no existen
SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'facturas' AND COLUMN_NAME = 'estado');
SET @sql := IF(@exist = 0, 
    'ALTER TABLE facturas ADD COLUMN estado ENUM("pendiente", "generada", "cancelada") DEFAULT "pendiente"',
    'SELECT "Column estado already exists"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'facturas' AND COLUMN_NAME = 'numero_factura');
SET @sql := IF(@exist = 0,
    'ALTER TABLE facturas ADD COLUMN numero_factura VARCHAR(20) AFTER id',
    'SELECT "Column numero_factura already exists"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'facturas' AND COLUMN_NAME = 'fecha_emision');
SET @sql := IF(@exist = 0,
    'ALTER TABLE facturas ADD COLUMN fecha_emision DATETIME DEFAULT CURRENT_TIMESTAMP',
    'SELECT "Column fecha_emision already exists"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

-- Verificar y agregar columnas en solicitudes_servicio si no existen
SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'solicitudes_servicio' AND COLUMN_NAME = 'solicitud_id');
SET @sql := IF(@exist = 0,
    'ALTER TABLE solicitudes_servicio ADD COLUMN solicitud_id VARCHAR(20) AFTER id',
    'SELECT "Column solicitud_id already exists"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'solicitudes_servicio' AND COLUMN_NAME = 'estado');
SET @sql := IF(@exist = 0,
    'ALTER TABLE solicitudes_servicio ADD COLUMN estado ENUM("pendiente", "completada", "cancelada") DEFAULT "pendiente"',
    'SELECT "Column estado ya existe"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

-- Verificar y agregar columna en detalles_factura si no existe
SET @exist := (SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_NAME = 'detalles_factura' AND COLUMN_NAME = 'precio_unitario');
SET @sql := IF(@exist = 0,
    'ALTER TABLE detalles_factura ADD COLUMN precio_unitario DECIMAL(10,2) NOT NULL AFTER cantidad',
    'SELECT "Column precio_unitario already exists"');
PREPARE stmt FROM @sql;
EXECUTE stmt;

DEALLOCATE PREPARE stmt;
