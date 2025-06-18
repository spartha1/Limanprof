<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="/Limanprof/public/css/style.css">
    <link rel="stylesheet" href="/Limanprof/public/css/login.css">
    <!-- Estilos cajas alerta -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="/Limanprof/public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {

        if (empty($_POST['nombre_usuario']) || empty($_POST['contraseña'])) {
            echo "<script language='JavaScript'>
                alert('Ingresa un dato valido')
                location.assign('history.back()');
                </script>";
        } else {
            $nombre_usuario  = $_POST['nombre_usuario'];
            $contraseña = $_POST['contraseña'];
            $tipo = "";
            include("../config/config.php");
            $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss", $nombre_usuario, $contraseña);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($fila = $resultado->fetch_assoc()) {
                $_SESSION['id'] = $fila['id'];
                $_SESSION['nombre_usuario'] = $nombre_usuario;
                $_SESSION['tipo'] = $fila['tipo'];

                if ($fila['tipo'] == "admin") {
                    echo "<script language='JavaScript'>
                    alert('Bienvenido " . $nombre_usuario . "  !!!');
                    location.assign('dashboard_administrador.php');
                    </script>";
                } else if ($fila['tipo'] == "cliente") {
                    echo "<script language='JavaScript'>
                    alert('Bienvenido " . $nombre_usuario . "  !!!');
                    location.assign('dashboard_usuario.php');
                    </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                alert('Nombre de usuario o contraseña erroneo')
                location.assign(history.back());
                </script>";
            }
        }
    } else {
    ?>
        <header class="header">
            <div class="logo-container">
                <a href="/Limanprof/index.php">
                    <img class="logo" src="/Limanprof/Public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof">
                </a>
            </div>

            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>

            <nav class="nav-menu">
                <ul class="nav-list">
                    <li><a href="/Limanprof/index.php" class="nav-link">Inicio</a></li>
                    <li><a href="/Limanprof/public/Nosotros.php" class="nav-link">Nosotros</a></li>
                    <li class="nav-dropdown">
                        <a href="#" class="nav-link">Servicios <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="/Limanprof/public/Limpieza.php">Limpieza</a></li>
                            <li><a href="/Limanprof/public/Jardineria.php">Jardinería</a></li>
                            <li><a href="/Limanprof/public/Mantenimiento.php">Mantenimiento</a></li>
                            <li><a href="/Limanprof/public/Especial.php">Especializado</a></li>
                        </ul>
                    </li>
                    <li><a href="/Limanprof/public/Clientes.php" class="nav-link">Nuestros clientes</a></li>
                    <li><a href="/Limanprof/public/Contacto.php" class="nav-link">Contacto</a></li>
                    <li><a href="/Limanprof/public/login.php" class="nav-link">Iniciar sesión</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <br><br><br>
            <!-- Contenedor Login -->
            <div class="wrapper-login">
                <!-- Animaciones -->
                <span class="bg-animated"></span>
                <span class="bg-animated2"></span>
                <!-- Formulario login -->
                <div class="form-box login">
                    <h2 class="animacion" style="--i:0; --j:21;">Inicia Sesion</h2>
                    <!-- Input login -->
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                        <div class="input-box animacion" style="--i:1; --j:22;">
                            <input type="text" name="nombre_usuario" required placeholder="Usuario">
                            <label>Usuario</label>
                            <ion-icon name="person"></ion-icon>
                        </div>

                        <div class="input-box animacion" style="--i:2; --j:23;">
                            <input type="password" name="contraseña" required placeholder="Contraseña">
                            <label>Contraseña</label>
                            <ion-icon name="lock-closed"></ion-icon>
                        </div>

                        <button type="submit" name="enviar" class="btn animacion" style="--i:3; --j:24;">Iniciar Sesion</button>
                        <div class="logreg-link animacion" style="--i:4; --j:25;">
                            <p>No tienes cuenta? <a href="#" class="registrer-link">Crear cuenta</a></p>
                        </div>
                    </form>
                </div>
                <!-- Informacion de login -->
                <div class="info-text login">
                    <h2 class="animacion" style="--i:0; --j:20;">Hola de nuevo!</h2>
                    <p class="animacion" style="--i:1; --j:21;"></p>
                </div>

                <?php
                if (isset($_POST['Registrar'])) {
                    if (empty($_POST['nombre_usuario']) || empty($_POST['email']) || empty($_POST['contraseña'])) {
                        echo "<script language='JavaScript'>
                        alert('Ingresa un dato valido')
                        location.assign(history.back());
                        </script>";
                    } else {
                        $nombre_usuario = $_POST['nombre_usuario'];
                        $email = $_POST['email'];
                        $contraseña = $_POST['contraseña'];
                        include("../config/config.php");

                        // Verificar si el correo ya existe
                        $check_email = "SELECT id FROM usuarios WHERE email = ?";
                        $stmt = $conexion->prepare($check_email);
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            echo "<script language='JavaScript'>
                            alert('Este correo electrónico ya está registrado')
                            location.assign(history.back());
                            </script>";
                        } else {
                            // Verificar si existe el rol 'cliente'
                            $check_role = "SELECT nombre FROM roles WHERE nombre = 'cliente'";
                            $role_result = $conexion->query($check_role);
                            
                            if ($role_result->num_rows == 0) {
                                // Si no existe el rol, lo creamos
                                $create_role = "INSERT INTO roles (nombre, descripcion) VALUES ('cliente', 'Cliente registrado')";
                                $conexion->query($create_role);
                            }

                            // Ahora podemos insertar el usuario con el rol 'cliente'
                            $sql = "INSERT INTO usuarios (nombre_usuario, email, contraseña, tipo, codigo_pais, telefono) 
                                    VALUES (?, ?, ?, 'cliente', '+52', '')";
                            $stmt = $conexion->prepare($sql);
                            $stmt->bind_param("sss", $nombre_usuario, $email, $contraseña);
                            
                            if ($stmt->execute()) {
                                echo "<script language='JavaScript'>
                                alert('Usuario registrado correctamente. Por favor, inicia sesión.')
                                location.assign('login.php');
                                </script>";
                            } else {
                                echo "<script language='JavaScript'>
                                alert('Error al registrar: " . $stmt->error . "')
                                location.assign(history.back());
                                </script>";
                            }
                        }
                        $stmt->close();
                    }
                } else {
                ?>
                    <!-- Formulario de registro -->
                    <div class="form-box registro">
                        <h2 class="animacion" style="--i:17; --j:0;">Registro</h2>
                        <!-- Input registro -->
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="input-box animacion" style="--i:18; --j:1;">
                                <input type="text" name="nombre_usuario" required placeholder="Usuario">
                                <label>Usuario</label>
                                <ion-icon name="person"></ion-icon>
                            </div>
                            <div class="input-box animacion" style="--i:19; --j:2;">
                                <input type="text" name="email" required placeholder="Email">
                                <label>Email</label>
                                <ion-icon name="mail"></ion-icon>
                            </div>
                            <div class="input-box animacion" style="--i:20; --j:3;">
                                <input type="password" name=" contraseña" required placeholder="Contraseña">
                                <label>Contraseña</label>
                                <ion-icon name="lock-closed"></ion-icon>
                            </div>
                            <button type="submit" name="Registrar" class="btn animacion" style="--i:21; --j:4;">Registrarse</button>
                            <div class="logreg-link animacion" style="--i:22; --j:5;">
                                <p>Ya tienes cuenta? <a href="#" class="login-link">Iniciar Sesion</a></p>
                            </div>
                        </form>
                    </div>

                    <!-- Informacion registro de usuario -->
                    <div class="info-text registro">
                        <h2 class="animacion" style="--i:17; --j:1;">Hola de nuevo!</h2>
                        <p class="animacion" style="--i:18; --j:2;"></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </main>
    <?php
    }
    ?>
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="footer-widget">
                    <a href=""><img class="logo" src="/Limanprof/public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
                    <p>No somos una opción, somos la solución.
                    </p>
                    <ul class="social_icon">
                        <li><a href="https://www.facebook.com/profile.php?id=100064008661749"><ion-icon
                                    name="logo-facebook"></ion-icon>
                            </a></li>
                        <li><a href=""><ion-icon name="logo-twitter"></ion-icon>
                            </a></li>
                        <li><a href=""><ion-icon name="logo-linkedin"></ion-icon>
                            </a></li>
                        <li><a href=""><ion-icon name="logo-instagram"></ion-icon>
                            </a></li>
                    </ul>

                </div>
                <div class="footer-widget">
                    <h6>Enlaces</h6>
                    <ul class="links">
                        <li><a href="/Limanprof/index.php">Inicio</a></li>
                        <li><a href="/Limanprof/public/Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="/Limanprof/public/Limpieza.php">Limpieza</a></li>
                        <li><a href="/Limanprof/public/Mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="/Limanprof/public/Jardineria.php">Jardinería</a></li>
                        <li><a href="/Limanprof/public/Especial.php">Especializado</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Ayuda &amp; Soporte</h6>
                    <ul class="links">
                        <li><a href="/Limanprof/public/Contacto.php">Contacto</a></li>
                        <li><a href="/Limanprof/public/Clientes.php">Nuestros clientes</a></li>
                        <li><a href="/Limanprof/public/FAQ.php">Pregunstas frecuentes</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright-wrapper">
                <p>2025 Limanprofnprof. Todos los derechos reservados.
                    <a href="https://Endex.dev" target="blank">Endex.dev</a>
                </p>
            </div>

        </div>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const wrapper = document.querySelector('.wrapper-login');
        const registrerLink = document.querySelector('.registrer-link');
        const loginLink = document.querySelector('.login-link')
        registrerLink.onclick = () => {
            wrapper.classList.add('active');
        }
        loginLink.onclick = () => {
            wrapper.classList.remove('active');
        }
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.querySelector('.nav-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const dropdowns = document.querySelectorAll('.nav-dropdown');

    navToggle.addEventListener('click', () => {
        navMenu.classList.toggle('show');
    });

    dropdowns.forEach(dropdown => {
        const dropdownToggle = dropdown.querySelector('.nav-link');
        const dropdownMenu = dropdown.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', (e) => {
            e.preventDefault();
            dropdown.classList.toggle('show-dropdown');
        });

        // Permitir que los enlaces del menú desplegable funcionen
        const dropdownLinks = dropdown.querySelectorAll('.dropdown-menu a');
        dropdownLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.stopPropagation(); // Evitar que el clic se propague al toggle
                window.location.href = link.href; // Navegar a la página
            });
        });
    });
});
</script>

</body>

</html>