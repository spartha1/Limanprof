ALTER TABLE servicios 
ADD COLUMN activo BOOLEAN DEFAULT TRUE AFTER precio_base;
