<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra de articulos</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/Limanprof/Public/css/style_users.css">
    <link rel="stylesheet" href="/Limanprof/Public/css/dashboard.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="/img/Icono.png" rel="icon" type="image/x-icon">
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

    <aside class="sidebar">
        <a href="#" class="brand"><i class='bx bxs-book'>Admin. Admin Panel</i</a>
        <ul class="side-menu">
            <li><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li class="divider">Main</li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon' ></i>elements <i class='bx bx-chevron-righ icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">alert</a></li>
                    <li><a href="#">badges</a></li>
                    <li><a href="#">breadcrumbs</a></li>
                    <li><a href="#">buttom</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='bx bxs-char icon'></i>Charts</a></li>
            <li><a href="#"><i class='bx bxs-widget icon'></i>Widgets</a></li>
            <li class="divider">Table and forms</li>
            <li><a href="#"><i class='bx bxs-table icon'></i>Tables</a></li>
            <li>
                <a href="#"><i class='bx bxs-notepad icon' >Forms</i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Basic</a></li>
                    <li><a href="#">select</a></li>
                    <li><a href="#">Checkbox</a></li>
                    <li><a href="#">Radio</a></li>
                </ul>
            </li>
        </ul>
    </aside>

    <main>
        <br><br><br>
        <section class=".cards">
            
        </section>
        <section class="cart-list">
            <h2>tu carrito (0)</h2>
            <div class="cart-list_items">
                <div class="items_img">
                    <img src="/Limanprof/Public/img/IconoLimanprofnprofSB.png" alt="compraslogo">
                </div>
                <p>Tus porductos apareceran aqui</p>
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
                    <a href=""><img class="logo" src="/Limanprof/Public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>
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
                        <li><a href="../Limanprof/index.php">Inicio</a></li>
                        <li><a href="Nosotros.php">Nosotros</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h6>Servicios</h6>
                    <ul class="links">
                        <li><a href="Limpieza.php">Limpieza</a></li>
                        <li><a href="Mantenimiento.php">Mantenimiento</a></li>
                        <li><a href="Jardineria.php">Jardinería</a></li>
                        <li><a href="Especial.php">Especializado</a></li>
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
    <script src="/js/compras.js"></script>
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