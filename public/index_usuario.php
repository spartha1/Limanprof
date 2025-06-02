<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="../css/style_users.css">
    <link rel="stylesheet" href="../css/login.css">

    <link href="/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
<?php
    if ($_SESSION['tipo'] == "usuario") {
        ?>
    <header class="header">
        <a href="#"><img class="logo" src="/Limanprof/Public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>
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
            <a href="index.php" style="--i:0;">Inicio</a>
            <a href="Nosotros.php" style="--i:1;">Nosotros</a>
            <a href="Nosotros.php" style="--i:2;">Servicios</a>
            <a href="Contacto.php" style="--i:3;">Contacto</a>
            <a href="logout.php" style="--i:4;">Cerrar sesión</a>
        </nav>

    </header>

    <aside class="sidebar">
    <h2>Menú</h2>
            <a href="PERFIL.php"><button onclick="brinco()" class="btn animacion">Mi perfil</button></a>
            <a href="CURSOS.php"><button onclick="brinco()" class="btn animacion">Mis cursos</button></a>
            <a href="AVANCES.php"><button onclick="brinco()" class="btn animacion">Mis Avances</button></a>
            <a href="ACTIVIDADES.php"><button onclick="brinco()" class="btn animacion">Mis actividades</button></a>
            <a href="OPORTUNIDADES.php"><button onclick="brinco()" class="btn animacion">Mis Oportunidades</button></a>
            <a href="HISTORIAL.php"><button onclick="brinco()" class="btn animacion">Mi Historial</button></a>
            
    </aside>

    <main>
    <img src="LOGO.png" alt="Logo">
            <h1>Bienvenido</h1>
            <p>Selecciona una opción del menú lateral para comenzar.</p>
        
    </main>
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
                    <a href=""><img class="logo" src="/Limanprof/Public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>
                    <p>No somos una opcion, Somos la solución
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
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="#">Limpieza</a></li>
                        <li><a href="#">Mantenimiento</a></li>
                        <li><a href="#">Jardinería</a></li>
                        <li><a href="#">Especializado</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Ayuda &amp; Soporte</h6>
                    <ul class="links">
                        <li><a href="Contacto.php">Contacto</a></li>
                        <li><a href="Clientes.php">Nuestros clientes</a></li>
                        <li><a href="FAQ.php">Pregunstas frecuentes</a></li>
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
    <?php
    } else {
        echo "<script language='JavaScript'>
            alert('No tienes el privilegio para entrar a esta página');
            location.assign(history.back());
            </script>";
    }
    ?>
</body>

</html>