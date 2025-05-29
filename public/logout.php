<?php
session_start();
$_SESSION = []; // Vaciar las variables de sesión

// Invalidar la cookie de sesión si existe
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir la sesión
session_destroy();

// Redirigir al inicio de sesión
header("Location: ../index.php");
exit();