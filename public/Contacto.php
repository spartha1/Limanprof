<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="/Limanprof/Public/css/style.css">
    <link rel="stylesheet" href="/Limanprof/Public/css/contacto.css">
    <link href="/Limanprof/Public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        if (
            empty($_POST['nombre_completo']) || empty($_POST['asunto']) ||
            empty($_POST['telefono']) || empty($_POST['correo_electronico']) ||
            empty($_POST['mensaje'])
        ) {
        }
    }
    ?>
    <header class="header">
        <a href="#"><img class="logo" src="/Limanprof/Public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
            <a href="/Limanprof/index.php" style="--i:0;">Inicio</a>
            <a href="/Limanprof/Public/Nosotros.php" style="--i:1;">Nosotros</a>
            <!-- Submenu Servicios -->
            <div class="menu-item">
                <a href="#" style="--i:2;">Servicios ▼</a>
                <div class="submenu">
                    <a href="/Limanprof/Public/Limpieza.php" style="--i:3;">Limpieza</a>
                    <a href="/Limanprof/Public/Jardineria.php" style="--i:4;">Jardinería</a>
                    <a href="/Limanprof/Public/Mantenimiento.php" style="--i:5;">Mantenimiento</a>
                    <a href="/Limanprof/Public/Especial.php" style="--i:6;">Especializado</a>
                </div>
            </div>
            <a href="/Limanprof/Public/Clientes.php" style="--1:6;">Nuestros clientes</a>
            <a href="/Limanprof/Public/Contacto.php" style="--i:3;">Contacto</a>
            <a href="/Limanprof/Public/login.php" style="--i:4;">Iniciar sesión</a>
        </nav>

    </header>
    <main>
        <!-- seccion contacto -->
        <div class="contact" id="contact">
            <h2 class="heading">Contactanos <span>!!!</span></h2>
            <form action="#">
                <div class="inputBox">
                    <div class="inputField">
                        <input type="text" placeholder="Nombre Completo" required name="nombre_completo">
                        <label>Nombre Completo</label>
                        <span class="focus"></span>
                    </div>
                    <div class="inputField">
                        <input type="text" placeholder="Asunto" required name="asunto">
                        <label>Asunto</label>
                        <span class="focus"></span>
                    </div>
                </div>

                <div class="inputBox">
                    <div class="inputField">
                        <input type="tel" placeholder="Teléfono" required name="telefono" pattern="\d{10}"
                            title="El número debe contener exactamente 10 dígitos" maxlength="10" inputmode="numeric" />
                        <label>Telefono</label>
                        <span class="focus"></span>
                    </div>
                    <div class="inputField">
                        <input type="text" placeholder="Correo electronico" required name="correo_electronico">
                        <label>Correo electronico</label>
                        <span class="focus"></span>
                    </div>
                </div>

                <div class="textarea-field">
                    <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Tu mensaje"></textarea>
                    <label>Tu mensaje</label>
                    <span class="focus"></span>
                </div>
                <div class="btn-box btns">
                    <button type="submit" class="btn" name="enviar">Enviar</button>
                </div>

            </form>
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
                    <a href=""><img class="logo" src="/Limanprof/Public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
                        <li><a href="/Limanprof/Public/Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="/Limanprof/Public/Limpieza.php">Limpieza</a></li>
                        <li><a href="/Limanprof/Public/Mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="/Limanprof/Public/Jardineria.php">Jardinería</a></li>
                        <li><a href="/Limanprof/Public/Especial.php">Especializado</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Ayuda &amp; Soporte</h6>
                    <ul class="links">
                        <li><a href="/Limanprof/Public/Contacto.php">Contacto</a></li>
                        <li><a href="/Limanprof/Public/Clientes.php">Nuestros clientes</a></li>
                        <li><a href="/Limanprof/Public/FAQ.php">Pregunstas frecuentes</a></li>
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