<?php
// Detectar entorno
$is_production = ($_SERVER['SERVER_NAME'] !== 'localhost');

// Configuración de la base de datos
if ($is_production) {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'usuario_cpanel');
    define('DB_PASS', 'contraseña_cpanel');
    define('DB_NAME', 'nombre_db_cpanel');
    define('BASE_URL', 'https://tudominio.com');
} else {
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'limanprof');
    define('BASE_URL', 'http://localhost/Limanprof');
}

// Función para manejar rutas
function get_asset_url($path) {
    return BASE_URL . '/public/' . ltrim($path, '/');
}

// Conexión a la base de datos
try {
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conexion->set_charset("utf8");
    
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Error: No se pudo conectar a la base de datos");
}

// Configuración de errores
if ($is_production) {
    error_reporting(0);
    ini_set('display_errors', 0);
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

// Configuración de sesión
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
if ($is_production) {
    ini_set('session.cookie_secure', 1);
}
?>
