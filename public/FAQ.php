<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprof</title>
    <link rel="stylesheet" href="/lima/public/css/style.css">
    <link rel="stylesheet" href="/lima/public/css/nosotros.css">
    <link href="/lima/public/img/Icono.png" rel="icon" type="image/x-icon">
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
            <a href="/lima/public/index.php" style="--i:0;">Inicio</a>
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
        <section class="home" id="home">
            <div class="home-content">
                <h1>PREGUNTAS FRECUENTES!!!</h1>
                <div class="text-animate">
                    <h3>¿Que servicios ofrecemos?</h3>
                </div>
                <p>
                    En Limanprof ofrecemos serivios de limpieza, jardineria, mantenimiento y otros servicios mas especificos a
                    Condondominios, sitios residenciales ademas de ofrecer la venta de ariculos varios de limpieza.
                </p>
                <div class="text-animate">
                    <h3>¿Como solicito un servicio?</h3>
                </div>
                <p>
                    Para solicitar un servicios deveras llenar un formulario que econtraras dentro de la opcionn de servicios
                    una vez hayas iniciado sesion.
                </p>
                <div class="text-animate">
                    <h3>¿Cómo sé si mi solicitud de servicio ha sido correctamente registrado?</h3>
                </div>
                <p>
                    Una vez hayas registrado los datos de tu dolicitud de servicio veras un mensaje en caso de exito y se mostrara en
                    una tabla donde podras llevar el seguimiento de los serivios que hayas solicitado.
                </p>
                <div class="text-animate">
                    <h3>¿Puedo cambiar mi contraseña y datos de perfil?</h3>
                </div>
                <p>
                    Puedes hacer cambios de seguridad dentro de la opcion de ajustes en tu panel de usuario.
                </p>
                <div class="text-animate">
                    <h3>¿Cómo puedo visualizar un informe de las solicitudes aprobadas?</h3>
                </div>
                <p>
                    Al solicitar un servicio este aparecera como pendiete por aprobacion, cuando un administrador se ponga en Contacto
                    contigo para mas detalles este actualizara el estado de su servicio como aprobado o cancelado segun sea especificado.
                </p>
                <div class="text-animate">
                    <h3>¿Cómo puedo contactar con el administrador en caso de problemas?</h3>
                </div>
                <p>
                    Si necesitas ponerte en contacto con algun administrador podras hacerlo al relaizar tu inicio de sesion dentro de la
                    contacto, donde podras dejar tus datos para que alguien entre en contacto contigo ademas de un mensaje para hacernos
                    saber el tema en que necesitas asesoramiento.
                </p>
            </div>
        </section>
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