<?php 
// Configuración de la base de datos
$hostbd = "localhost";
$usuariobd = "root";
$passbd = "";
$nombrebd = "liman_prof";
$charset = 'utf8mb4';

try {
    // Habilitar informes de errores en MySQLi
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Intentar conexión a la base de datos
    $conexion = new mysqli($hostbd, $usuariobd, $passbd, $nombrebd);
    
    // Establecer conjunto de caracteres a UTF-8
    $conexion->set_charset("utf8");

} catch (mysqli_sql_exception $e) {
    // Mensaje en caso de error de conexión
    die("❌ Error de conexión a la base de datos: " . $e->getMessage());
}

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("❌ Fallo en la conexión: " . $conexion->connect_error);
} else {
    // Mensaje de conexión exitosa (opcional, para pruebas)
    // echo "✅ Conexión exitosa a la base de datos";
}

?>
