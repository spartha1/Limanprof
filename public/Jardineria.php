<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprof</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nosotros.css">
    <link href="/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
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
        </h3>
        <div class="contenedor">
            <div class="cuadro">
                <h2 class="titulo">Jardinería</h2>
                <p class="descripcion">
                    Es un servicio de mantenimiento que tiene como objetivo el cuidado de las zonas verdes de un espacio. Mejorando la calidad del aire o moderación de temperaturas. Mejorando el bienestar de los usuarios. Es un protocolo de mantenimiento de un espacio.
                </p>
            </div>


            <div class="contenedor-imagen">

            </div>
            <div class="imagen">
                <img src="/lima/public/img/jardineria.webp" alt="limpieza" width="600" height="500">
            </div>
        </div>
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
</body>

</html>