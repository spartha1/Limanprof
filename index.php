<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/video.css">
    <link rel="stylesheet" href="/public/css/carrucel.css">
    <link href="/public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <header class="header">
        <a href="#"><img class="logo" src="public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
        <div class="img-index">
            <img src="/public/img/espacio_limpio.png">
        </div>
        <div class="video-container swiper">
            <video src="public/img.mp4" autoplay loop muted playsinline></video>
        </div>
        <h2 class="Clientes">Nuestos Servicios:</h2>
        
        <!-- Carrusel -->
        <div class="carrucel_container">
            <button class="flecha izquierda" onclick="moverIzquierda()">&lt;</button>
            <div class="slider-wrapper">
                <div class="card-list" id="card-list">
                    <div class="card-item">
                    <img src="/public/img/servicios/Limpieza-Elevador.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">Limpieza</h3>
                    </div>
                    <div class="card-item">
                    <img src="/public/img/servicios/Limpieza-juegos-2.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">Jardinería</h3>
                    </div>
                    <div class="card-item">
                    <img src="/public/img/servicios/Mantenimiento.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">Mantenimiento</h3>
                    </div>
                    <div class="card-item">
                    <img src="/public/img/servicios/lavado.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">Servicios Especializados</h3>
                    </div>
                </div>
            </div>
            <button class="flecha derecha" onclick="moverDerecha()">&gt;</button>
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
                        <li><a href="index.php">Inicio</a></li>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cardItems = document.querySelectorAll(".card-item");

            // URLs de destino en orden
            const urls = [
                "/public/Limpieza.php",
                "/public/Jardineria.php",
                "/public/Mantenimiento.php",
                "/public/Especial.php"
            ];

            // Asignar evento de clic a cada tarjeta
            cardItems.forEach((card, index) => {
                card.addEventListener("click", () => {
                    window.location.href = urls[index];
                });
            });
        });
    </script>
    <script>
        let lista = document.getElementById("card-list");
        let elementos = document.querySelectorAll(".card-item");
        let intervalo;

        function moverDerecha() {
            lista.appendChild(elementos[0]);
            elementos = document.querySelectorAll(".card-item");
        }

        function moverIzquierda() {
            lista.insertBefore(elementos[elementos.length - 1], elementos[0]);
            elementos = document.querySelectorAll(".card-item");
        }

        function iniciarCarrusel() {
            intervalo = setInterval(moverDerecha, 3000);
        }

        function detenerCarrusel() {
            clearInterval(intervalo);
        }

        document.querySelector(".carrucel_container").addEventListener("mouseenter", detenerCarrusel);
        document.querySelector(".carrucel_container").addEventListener("mouseleave", iniciarCarrusel);

        iniciarCarrusel();
    </script>

</body>

</html>