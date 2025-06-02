<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/nosotros.css">
    <link href="/public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <header class="header">
        <a href="#"><img class="logo" src="/public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
            <a href="/index.php" style="--i:0;">Inicio</a>
            <a href="/public/Nosotros.php" style="--i:1;">Nosotros</a>
            <!-- Submenu Servicios -->
            <div class="menu-item">
                <a href="#" style="--i:2;">Servicios ▼</a>
                <div class="submenu">
                    <a href="/public/Limpieza.php" style="--i:3;">Limpieza</a>
                    <a href="/public/Jardineria.php" style="--i:4;">Jardinería</a>
                    <a href="/public/Mantenimiento.php" style="--i:5;">Mantenimiento</a>
                    <a href="/public/Especial.php" style="--i:6;">Especializado</a>
                </div>
            </div>
            <a href="/public/Clientes.php" style="--1:6;">Nuestros clientes</a>
            <a href="/public/Contacto.php" style="--i:3;">Contacto</a>
            <a href="/public/login.php" style="--i:4;">Iniciar sesión</a>
        </nav>

    </header>
    <main>
        <section class="home" id="home">
            <div class="home-content">
                <h1>¿Quiénes somos? <span>Limanprofnprof</span></h1>
                <div class="text-animate">
                    <h3>No somos una opcion, somos la solución</h3>
                </div>
                <p>
                    LimanprofNPROF S.A. de C.V. Es una empresa mexicana creada y fundada recientemente con un grupo de colaboradores con más de diez años de experiencia en limpieza.
                    Preocupados por la problemática constante de dicha actividad y a su vez poder agilizar dichos procesos de servicio de manera óptima.
                    Encontrarán un respaldo de mayor confianza y profesionalismo en cuanto a limpieza residencial, mantenimiento de inmuebles, jardinería, así como costos competitivos en la venta de productos y materiales.
                </p>
            </div>
            <div class="home-image">
                <img src="/public/img/Icono.png" alt="Limanprofnprof">
            </div>

        </section>
        <section class="about" id="about">
            <h2 class="heading">Nuestro Camino al <span>Exito !!</span></h2>

            <div class="about-row">
                <div class="about-column">
                    <h3 class="titulo">Misión</h3>
                    <div class="about-box">
                        <div class="about-content">
                            <div class="contendio">
                                <p>Satisfacer y exceder las expectativas de nuestros clientes brindándoles servicios de limpieza y
                                    mantenimiento integral, así como materiales de calidad.
                                    Creamos un ambiente de colaboración que se refleja en la excelencia de nuestros servicios.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-column">
                    <h3 class="titulo">Visión</h3>
                    <div class="about-box">
                        <div class="about-content">
                            <div class="contendio">
                                <p>Ser un grupo sólido e innovador, estableciéndonos como la empresa líder en la provisión de servicios
                                    estratégicos, con plena satisfacción de nuestros clientes y amplio desarrollo de nuestros colaboradores.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="about-column">
                    <h3 class="titulo">Objetivos</h3>
                    <div class="about-box">
                        <div class="about-content">
                            <div class="contendio">
                                <p>Trabajar en equipo para crear espacios limpios y agradables, respetando y cuidando el medio ambiente.
                                    Desarrollamos planes de trabajo personalizados, ofreciendo servicios y materiales accesibles y de calidad,
                                    adaptados a los requerimientos de nuestros clientes.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section class="contacto" id="contacto">
            <h3 class="subtitle">Contacto</h3>
            <h3 class="text"><strong>Dirección:</strong> C. de Preciados, México</h3>
            <h3 class="text"><strong>Teléfono:</strong> 554039764</h3>
            <h3 class="text"><strong>Email:</strong> direccion@Limanprofnprof.com</h3>
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
                    <a href=""><img class="logo" src="/public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
                        <li><a href="/index.php">Inicio</a></li>
                        <li><a href="/public/Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="/public/Limpieza.php">Limpieza</a></li>
                        <li><a href="/public/Mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="/public/Jardineria.php">Jardinería</a></li>
                        <li><a href="/public/Especial.php">Especializado</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Ayuda &amp; Soporte</h6>
                    <ul class="links">
                        <li><a href="/public/Contacto.php">Contacto</a></li>
                        <li><a href="/public/Clientes.php">Nuestros clientes</a></li>
                        <li><a href="/public/FAQ.php">Pregunstas frecuentes</a></li>
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
</body>

</html>