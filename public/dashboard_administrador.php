<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprofnprof</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./css/style_users.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link href="img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if ($_SESSION['tipo'] == "admin") {
    ?>
        <header class="header">
            <a href="#"><img class="logo" src="/Limanprof/public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>

            <section id="content">
                <!-- NAVBAR -->
                <nav>
                    <i class='bx bx-menu toggle-sidebar'></i>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Search...">
                            <i class='bx bx-search icon'></i>
                        </div>
                    </form>
                    <a href="#" class="nav-link">
                        <i class='bx bxs-bell icon'></i>
                        <span class="badge">5</span>
                    </a>
                    <a href="#" class="nav-link">
                        <i class='bx bxs-message-square-dots icon'></i>
                        <span class="badge">8</span>
                    </a>
                    <span class="divider"></span>
                    <div class="profile">
                        <img src="img/avatars/default-avatar.jpg" alt="<?php echo $_SESSION['nombre_usuario']; ?>">
                        <ul class="profile-link">
                            <li><a href="?page=perfil"><i class='bx bxs-user-circle icon'></i> Mi Perfil</a></li>
                            <li><a href="#"><i class='bx bxs-cog'></i> Configuración</a></li>
                            <li><a href="logout.php" onclick="return confirm('¿Está seguro de cerrar sesión?');">
                                <i class='bx bxs-log-out-circle'></i> Cerrar Sesión
                            </a></li>
                        </ul>
                    </div>
                </nav>
                <!-- NAVBAR -->
            </section>

        </header>

        <aside id="sidebar">
            <section id="sidebar">
                <a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
                <a href="#" class="brand_sesion">
                    <?php
                    echo "Hola: " . $_SESSION['nombre_usuario'];
                    echo "<br>";
                    echo " " . $_SESSION['tipo'];
                    ?>
                </a>

                <ul class="side-menu">
                    <li><a href="?page=dashboard_main" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>

                    <li class="divider" data-text="Gestión">Gestión</li>

                    <li>
                        <a href="#"><i class='bx bxs-user-detail icon'></i> Usuarios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=clientes">Clientes</a></li>
                            <li><a href="?page=usuarios">Usuarios</a></li>
                            <li><a href="?page=roles">Roles y Permisos</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-briefcase icon'></i> Servicios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=servicios_lista">Lista de Servicios</a></li>
                            <li><a href="?page=servicios_agregar">Agregar Servicio</a></li>
                            <li><a href="?page=servicios_lista">Editar Servicios</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-receipt icon'></i> Facturación <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=facturas_generadas">Facturas Generadas</a></li>
                            <li><a href="?page=facturas_pendientes">Facturas Pendientes</a></li>
                            <li><a href="?page=datos_fiscales">Datos Fiscales</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-file-find icon'></i> Cotizaciones <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=admin_cotizaciones">Ver Cotizaciones</a></li>
                            <li><a href="?page=cotizaciones_pendientes">Cotizaciones Pendientes</a></li>
                            <li><a href="?page=cotizaciones_historial">Historial</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-cart icon'></i> Carrito de Compras <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Ver Pedidos</a></li>
                            <li><a href="#">Administrar Productos</a></li>
                        </ul>
                    </li>

                    <li class="divider" data-text="Opciones">Opciones</li>
                    <li><a href="#"><i class='bx bxs-cog icon'></i> Configuración</a></li>
                </ul>
            </section>
        </aside>


        <main>
            <?php
            // Verificar si se ha especificado una página
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard_main';
            
            // Sanitizar el nombre de la página
            $page = preg_replace('/[^a-zA-Z0-9_]/', '', $page);
            
            // Construir la ruta del archivo
            $file_path = "dashboard_content/{$page}.php";
            
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file_path)) {
                include($file_path);
            } else {
                include("dashboard_content/dashboard_main.php");
            }
            ?>
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
                        <a href=""><img class="logo" src="/Limanprof/public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script>
            // Sidebar submenu

            const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

            allDropdown.forEach(item => {
                const a = item.parentElement.querySelector('a:first-child');
                console.log(a);
                a.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (!this.classList.contains('active')) {
                        allDropdown.forEach(i => {
                            const aLink = i.parentElement.querySelector('a:first-child');

                            aLink.classList.remove('active');
                            i.classList.remove('show');
                        })
                    }


                    this.classList.toggle('active');
                    item.classList.toggle('show');
                })
            })

            // Opciones de perfil

            const profile = document.querySelector('nav .profile');
            const imgProfile = profile.querySelector('img');
            const dropdownProfile = profile.querySelector('.profile-link');

            imgProfile.addEventListener('click', function() {
                dropdownProfile.classList.toggle('show');
            })

            // MENU

            const allMenu = document.querySelectorAll('main .content-data .head .menu');

            allMenu.forEach(item => {
                const icon = item.querySelector('.icon');
                const menuLink = item.querySelector('.menu-link');

                icon.addEventListener('click', function() {
                    menuLink.classList.toggle('show');
                })
            })

            window.addEventListener('click', function(e) {
                if (e.target !== imgProfile) {
                    if (e.target !== dropdownProfile) {
                        if (dropdownProfile.classList.contains('show')) {
                            dropdownProfile.classList.remove('show');
                        }
                    }
                }
                allMenu.forEach(item => {
                    const icon = item.querySelector('.icon');
                    const menuLink = item.querySelector('.menu-link');

                    if (e.target !== icon) {
                        if (e.target !== menuLink) {
                            if (menuLink.classList.contains('show')) {
                                menuLink.classList.remove('show');
                            }
                        }
                    }
                })
            })

            // PROGRESSBAR

            const allProgress = document.querySelectorAll('main .card .progress');

            allProgress.forEach(item => {
                item.style.setProperty('--value', item.dataset.value)
            })

            // SIDEBAR COLAPSE

            const toggleSidebar = document.querySelector('nav .toggle-sidebar');
            const brand_sesion = document.querySelector('.brand_sesion');
            const sidebar = document.getElementById('sidebar');
            const allSideDivider = document.querySelectorAll('#sidebar .divider');

            toggleSidebar.addEventListener('click', function() {
                sidebar.classList.toggle('hide');
                brand_sesion.classList.toggle('hide');
            })

            // APEXCHART - Solo inicializar si existe el elemento
            if (document.querySelector("#chart")) {
                var options = {
                    series: [{
                        name: 'series1',
                        data: [31, 40, 28, 51, 42, 109, 100]
                    }, {
                        name: 'series2',
                        data: [11, 32, 45, 32, 34, 52, 41]
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        foreColor: '#fff' // Color del texto
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                    },
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            }
        </script>

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