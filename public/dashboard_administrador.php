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
    <link rel="stylesheet" href="/Limanprof/public/css/style_users.css">
    <link rel="stylesheet" href="/Limanprof/public/css/dashboard.css">
    <link href="/Limanprof/public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if ($_SESSION['tipo'] == "admin") {
    ?>
        <header class="header">
            <a href="#"><img class="logo" src="/Limanprof/public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>

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
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                        <ul class="profile-link">
                            <li><a href="dashboard_administrador_perfil.php"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
                            <li><a href="#"><i class='bx bxs-cog'></i> Settings</a></li>
                            <li><a href="logout.php"><i class='bx bxs-log-out-circle'></i> Logout</a></li>
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
                    <li><a href="dashboard_administrador.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>

                    <li class="divider" data-text="Gestión">Gestión</li>

                    <li>
                        <a href="#"><i class='bx bxs-user-detail icon'></i> Usuarios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="dashboard_administrador_usuarios.php">Ver Usuarios</a></li>
                            <li><a href="#">Agregar Usuario</a></li>
                            <li><a href="#">Roles y Permisos</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-briefcase icon'></i> Servicios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Lista de Servicios</a></li>
                            <li><a href="#">Agregar Servicio</a></li>
                            <li><a href="#">Editar Servicios</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-receipt icon'></i> Facturación <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Facturas Generadas</a></li>
                            <li><a href="#">Facturas Pendientes</a></li>
                            <li><a href="#">Datos Fiscales</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-file-find icon'></i> Cotizaciones <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Ver Cotizaciones</a></li>
                            <li><a href="#">Responder Cotización</a></li>
                            <li><a href="#">Generar Factura</a></li>
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
            <h1 class="title">Dashboard</h1>
            <ul class="breadcrumbs">
                <li><a href="dashboard_administrador.php">Home</a></li>
                <li class="divider">/</li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="info-data">
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>1500</h2>
                            <p>Traffic</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="40%"></span>
                    <span class="label">40%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>234</h2>
                            <p>Sales</p>
                        </div>
                        <i class='bx bx-trending-down icon down'></i>
                    </div>
                    <span class="progress" data-value="60%"></span>
                    <span class="label">60%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>465</h2>
                            <p>Pageviews</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="30%"></span>
                    <span class="label">30%</span>
                </div>
                <div class="card">
                    <div class="head">
                        <div>
                            <h2>235</h2>
                            <p>Visitors</p>
                        </div>
                        <i class='bx bx-trending-up icon'></i>
                    </div>
                    <span class="progress" data-value="80%"></span>
                    <span class="label">80%</span>
                </div>
            </div>
            <div class="data">
                <div class="content-data">
                    <div class="head">
                        <h3>Sales Report</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="content-data">
                    <div class="head">
                        <h3>Chatbox</h3>
                        <div class="menu">
                            <i class='bx bx-dots-horizontal-rounded icon'></i>
                            <ul class="menu-link">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Save</a></li>
                                <li><a href="#">Remove</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-box">
                        <p class="day"><span>Today</span></p>
                        <div class="msg">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                            <div class="chat">
                                <div class="profile">
                                    <span class="username">Alan</span>
                                    <span class="time">18:30</span>
                                </div>
                                <p>Hello</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatum eos quam dolores eligendi exercitationem animi nobis reprehenderit laborum! Nulla.</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, architecto!</p>
                            </div>
                        </div>
                        <div class="msg me">
                            <div class="chat">
                                <div class="profile">
                                    <span class="time">18:30</span>
                                </div>
                                <p>Lorem ipsum, dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" placeholder="Type...">
                            <button type="submit" class="btn-send"><i class='bx bxs-send'></i></button>
                        </div>
                    </form>
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
                        <a href=""><img class="logo" src="/Limanprof/public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>
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

            // APEXCHART
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
                    type: 'area'
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