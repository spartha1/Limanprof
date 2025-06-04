<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la cookie de sesión si existe
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

// Destruir la sesión
session_destroy();

// Redirigir al index con mensaje de éxito
echo "<script>
        alert('Sesión cerrada correctamente');
        window.location.href = '/Limanprof/index.php';
      </script>";
exit();