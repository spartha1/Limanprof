<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprof</title>
    <link rel="stylesheet" href="/lima/public/css/style.css">
    <link rel="stylesheet" href="/lima/public/css/login.css">
    <!-- Estilos cajas alerta -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="/lima/public/img/Icono.png" rel="icon" type="image/x-icon">
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
            $sql = "select * from usuarios where nombre_usuario ='" . $nombre_usuario  . "' and contraseña ='" . $contraseña . "' ";
            $resultado = mysqli_query($conexion, $sql);

            if ($fila = mysqli_fetch_assoc($resultado)) {
                $tipo = $fila['tipo'];
                $_SESSION['nombre_usuario'] = $nombre_usuario;
                $_SESSION['tipo'] = $tipo;


                if ($tipo == "admin") {
                    echo "<script language='JavaScript'>
                    alert('Bienvenido " . $nombre_usuario . "  !!!');
                    location.assign('dashboard_administrador.php');
                    </script>";
                } else if ($tipo == "usuario") {
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
            <a href="#"><img class="logo" src="/lima/public/img/logoLimanprofSB.png" alt="Logo de Limanprof"></a>
            <input type="checkbox" id="check">

            <label for="check" class="icons">
                <i class='bx bx-menu' id="menu-icon"><ion-icon name="menu-outline"></ion-icon></i>
                <i class='bx bx-x' id="close-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></i>
            </label>
            <nav class="menu">
                <a href="/lima/index.php" style="--i:0;">Inicio</a>
                <a href="/lima/public/Nosotros.php" style="--i:1;">Nosotros</a>
                <!-- Submenu Servicios -->
                <div class="menu-item">
                    <a href="#" style="--i:2;">Servicios ▼</a>
                    <div class="submenu">
                        <a href="/lima/public/Limpieza.php" style="--i:3;">Limpieza</a>
                        <a href="/lima/public/Jardineria.php" style="--i:4;">Jardinería</a>
                        <a href="/lima/public/Mantenimiento.php" style="--i:5;">Mantenimiento</a>
                        <a href="/lima/public/Especial.php" style="--i:6;">Especializado</a>
                    </div>
                </div>
                <a href="/lima/public/Clientes.php" style="--1:6;">Nuestros clientes</a>
                <a href="/lima/public/Contacto.php" style="--i:3;">Contacto</a>
                <a href="/lima/public/login.php" style="--i:4;">Iniciar sesión</a>
            </nav>

        </header>

        <main>
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

                    if (
                        empty($_POST['nombre_usuario']) ||
                        empty($_POST['email']) || empty($_POST['contraseña'])
                    ) {
                        echo "<script language='JavaScript'>
                    alert('Ingresa un dato valido')
                    location.assign(history.back());
                    </script>";
                    } else {

                        $nombre_usuario = $_POST['nombre_usuario'];
                        $email = $_POST['email'];
                        $contraseña = $_POST['contraseña'];
                        include("../config/config.php");


                        // $sql="insert into alumnos (Id_CURP,Ap_Paterno,Ap_Materno,Nombre,Genero,Grupo) values ('".$Id."','".$Ap."','".$Am."','".$N."','".$Genero."','".$Grupo."')";
                        $sql = "insert into usuarios (nombre_usuario, email, contraseña, tipo) VALUES ('$nombre_usuario', '$email ','$contraseña','usuario')";
                        $resultado = mysqli_query($conexion, $sql);
                        if ($resultado == true) {
                            echo "<script language='JavaScript'>
                    alert('Se ha agregado usuario correctamente')
                    location.assign('index_usuario.php');
                    </script>";
                        } else {
                            echo "<script language='JavaScript'>
                    alert('No existe el nombre o password en la BD')
                    location.assign(history.back());
                    </script>";
                        }
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
                    <a href=""><img class="logo" src="/lima/public/img/logoLimanprofSB.png" alt="Logo de Limanprof"></a>
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
                        <li><a href="/lima/public/index.php">Inicio</a></li>
                        <li><a href="/lima/public/Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="/lima/public/Limpieza.php">Limpieza</a></li>
                        <li><a href="/lima/public/Mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="/lima/public/Jardineria.php">Jardinería</a></li>
                        <li><a href="/lima/public/Especial.php">Especializado</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Ayuda &amp; Soporte</h6>
                    <ul class="links">
                        <li><a href="/lima/public/Contacto.php">Contacto</a></li>
                        <li><a href="/lima/public/Clientes.php">Nuestros clientes</a></li>
                        <li><a href="/lima/public/FAQ.php">Pregunstas frecuentes</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright-wrapper">
                <p>2025 Limanprof. Todos los derechos reservados.
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

</body>

</html>