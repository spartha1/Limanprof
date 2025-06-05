<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link rel="stylesheet" href="/Limanprof/Public/css/style.css">
    <link rel="stylesheet" href="/Limanprof/Public/css/slider.css">
    <link href="/Limanprof/Public/img/Icono.png" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
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
        <!--Carrucel-->
        <div class="slider">
            <!-- list Items -->
            <div class="list">
                <div class="item active">
                    <img src="/Limanprof/Public/img/Clientes/C_BINOME_TOWNHOUSES.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Binôme TownHouse</h2>
                        <p>
                            Binôme, un desarrollo de lujo con sólo 30 exclusivos Townhouses & Apartaments
                            en Interlomas de uno y dos niveles. Entrega Inmediata.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_CONDOMINIO_PALMAS.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Palmas Doral Interlomas</h2>
                        <p>
                            Residencial Palmas Doral es un desarrollo de departamentos en Bosques de las Palmas,
                            Interloma Cuenta con áreas comunes como alberca, gimnasio, cancha de tenis, juegos infantiles,
                            salón de eventos y seguridad privada.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_GRAND.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Residencial Grand Viure</h2>
                        <p>
                            Grand Viure es un desarrollo residencial en Bosque Esmeralda, Atizapán de Zaragoza, Estado de México.
                            Cuenta con departamentos y penthouses, además de áreas comunes como jardines, gimnasio, cancha de pádel, ludoteca y salones de fiestas.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_LAGUNA_MAYRAN.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Laguna mayran residencial</h2>
                        <p>
                            nuevo estilo de vida destinado a satisfacer todo lo que tú necesitas. Aprovecha las grandes ventajas 
                            de vivir en un edificio operado profesionalmente, siendo atendido por nuestros de equipos administración 
                            y mantenimiento especializados.
                        </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_ROMANZA.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Residencial Romanza</h2>
                        <p>
                            El Residencial Romanza es un complejo de departamentos y casas en Naucalpan de Juárez, Estado de México.
                            Características
                            Cuenta con áreas verdes y recreativas
                            Tiene amenidades como alberca techada, jacuzzi, gimnasio, spa, cancha de tenis, squash, padel, y más
                            Los departamentos tienen calefacción centralizada
                            Las casas tienen un diseño moderno con amplias ventanas
                        </p>
                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_VILLAS_DEL_LAGO.webp">
                    <div class="content">
                        <p>RESIDENCIAL</p>
                        <h2>Residencial villas del lago</h2>
                        <p>
                            En medio de la naturaleza y con un sinfín de comodidades, nuestro residencial ofrece un ambiente acogedor y seguro para disfrutar en grande.
                            Imaginate pasando tus días rodeado de hermosos lagos, canchas de básquetbol para disfrutar en familia, áreas de recreación para los más pequeños,
                            gazebos para celebrar eventos especiales y extensas zonas verdes para relajarte.
                        </p>
                    </div>
                </div>
            </div>
            <!-- button arrows -->
            <div class="arrows">
                <button id="prev">
                    <</button>
                        <button id="next">></button>
            </div>
            <!-- thumbnail -->
            <div class="thumbnail">
                <div class="item active">
                    <img src="/Limanprof/Public/img/Clientes/C_BINOME_TOWNHOUSES.webp">
                    <div class="content">

                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_CONDOMINIO_PALMAS.webp">
                    <div class="content">

                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_GRAND.webp">
                    <div class="content">

                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_LAGUNA_MAYRAN.webp">
                    <div class="content">

                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_ROMANZA.webp">
                    <div class="content">

                    </div>
                </div>
                <div class="item">
                    <img src="/Limanprof/Public/img/Clientes/C_RESIDENCIAL_VILLAS_DEL_LAGO.webp">
                    <div class="content">

                    </div>
                </div>
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
    <script>
        let items = document.querySelectorAll('.slider .list .item');
        let next = document.getElementById('next');
        let prev = document.getElementById('prev');
        let thumbnails = document.querySelectorAll('.thumbnail .item');

        // config param
        let countItem = items.length;
        let itemActive = 0;
        // event next click
        next.onclick = function() {
            itemActive = itemActive + 1;
            if (itemActive >= countItem) {
                itemActive = 0;
            }
            showSlider();
        }
        //event prev click
        prev.onclick = function() {
            itemActive = itemActive - 1;
            if (itemActive < 0) {
                itemActive = countItem - 1;
            }
            showSlider();
        }
        // auto run slider
        let refreshInterval = setInterval(() => {
            next.click();
        }, 5000)

        function showSlider() {
            // remove item active old
            let itemActiveOld = document.querySelector('.slider .list .item.active');
            let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
            itemActiveOld.classList.remove('active');
            thumbnailActiveOld.classList.remove('active');

            // active new item
            items[itemActive].classList.add('active');
            thumbnails[itemActive].classList.add('active');
            setPositionThumbnail();

            // clear auto time run slider
            clearInterval(refreshInterval);
            refreshInterval = setInterval(() => {
                next.click();
            }, 5000)
        }

        function setPositionThumbnail() {
            let thumbnailActive = document.querySelector('.thumbnail .item.active');
            let rect = thumbnailActive.getBoundingClientRect();
            if (rect.left < 0 || rect.right > window.innerWidth) {
                thumbnailActive.scrollIntoView({
                    behavior: 'smooth',
                    inline: 'nearest'
                });
            }
        }

        // click thumbnail
        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                itemActive = index;
                showSlider();
            })
        })
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