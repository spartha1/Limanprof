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
    <link rel="stylesheet" href="/Limanprof/Public/css/style_users.css">
    <link rel="stylesheet" href="/Limanprof/Public/css/dashboard.css">
    <link href="/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if ($_SESSION['tipo'] == "cliente") {
    ?>
        <header class="header">
            <a href="#"><img class="logo" src="/Limanprof/Public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>

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
                            <li><a href="#"><i class='bx bxs-user-circle icon'></i> Profile</a></li>
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
                <a href="#" class="brand"><i class='bx bxs-smile icon'></i> ClientSite</a>
                <a href="#" class="brand_sesion">
                    <?php
                    echo "Hola: " . $_SESSION['nombre_usuario'];
                    echo "<br>";
                    echo " " . $_SESSION['tipo'];
                    ?>
                </a>

                <ul class="side-menu">
                    <li><a href="?page=dashboard_main" class="active">
                        <i class='bx bxs-dashboard icon'></i> Dashboard
                    </a></li>

                    <li class="divider" data-text="Principal">Principal</li>

                    <li>
                        <a href="#"><i class='bx bxs-user icon'></i> Mi Perfil <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=perfil">Datos Generales</a></li>
                            <li><a href="?page=datos_fiscales">Datos Fiscales</a></li>
                            <li><a href="?page=cambiar_password">Cambiar Contraseña</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-briefcase icon'></i> Servicios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=historial_servicios">Historial de Servicios</a></li>
                            <li><a href="?page=solicitar_servicio">Solicitar Servicio</a></li>
                            <li><a href="?page=cotizaciones">Mis Cotizaciones</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class='bx bxs-cart icon'></i> Compras <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="?page=productos">Catálogo de Productos</a></li>
                            <li><a href="?page=carrito">Mi Carrito</a></li>
                            <li><a href="?page=pedidos">Mis Pedidos</a></li>
                        </ul>
                    </li>

                    <li class="divider" data-text="Extra">Extra</li>
                    <li><a href="?page=ayuda"><i class='bx bxs-help-circle icon'></i> Ayuda</a></li>
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
            $file_path = "dashboard_user_content/{$page}.php";
            
            // Verificar si el archivo existe y cargarlo
            if (file_exists($file_path)) {
                include($file_path);
            } else {
                include("dashboard_user_content/dashboard_main.php");
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
                        <a href=""><img class="logo" src="/Limanprof/Public/img/logoLimanprofSB.png" alt="Logo de Limanprofnprof"></a>
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

            window.addEventListener('click', function(e) {
                if(e.target !== imgProfile){
                    if(dropdownProfile.classList.contains('show')){
                        dropdownProfile.classList.remove('show');
                    }
                }
            })

            function loadNotifications() {
                fetch('process/get_notifications.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateNotificationBadge(data.unread);
                            updateNotificationDropdown(data.notifications);
                        }
                    });
            }

            function updateNotificationBadge(count) {
                const badge = document.querySelector('.nav-link .badge');
                badge.textContent = count;
                badge.style.display = count > 0 ? 'flex' : 'none';
            }

            function updateNotificationDropdown(notifications) {
                const dropdown = document.createElement('div');
                dropdown.className = 'notification-dropdown';
                
                notifications.forEach(notif => {
                    const item = document.createElement('div');
                    item.className = `notification-item ${notif.leida ? '' : 'unread'}`;
                    item.innerHTML = `
                        <div class="notification-content">
                            <p>${notif.mensaje}</p>
                            <small>${notif.tiempo}</small>
                        </div>
                    `;
                    
                    if (!notif.leida) {
                        item.addEventListener('click', () => markAsRead(notif.id));
                    }
                    
                    dropdown.appendChild(item);
                });

                const container = document.querySelector('.notifications-container');
                container.innerHTML = '';
                container.appendChild(dropdown);
            }

            function markAsRead(id) {
                fetch('process/mark_notification_read.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        loadNotifications();
                    }
                });
            }

            // Cargar notificaciones al inicio y cada minuto
            loadNotifications();
            setInterval(loadNotifications, 60000);
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