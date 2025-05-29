<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprof</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/lima/public/css/style_users.css">
    <link rel="stylesheet" href="/lima/public/css/dashboard.css">
    <link rel="stylesheet" href="/lima/public/css/profile.css">
    <link href="/lima/public/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
    <?php
    if ($_SESSION['tipo'] == "admin") {
    ?>
        <header class="header">
            <a href="#"><img class="logo" src="/lima/public/img/logoLimanprofSB.png" alt="Logo de Limanprof"></a>

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

        <aside>
            <section id="sidebar">
                <a href="#" class="brand"><i class='bx bxs-smile icon'></i> AdminSite</a>
                <a href="#" class="brand">
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
                            <li><a href="dashboard_administrador_usuarios">Ver Usuarios</a></li>
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
                    <li><a href="#"><i class='bx bxs-log-out-circle'></i> Cerrar Sesión</a></li>
                </ul>
            </section>
        </aside>


        <main>

            <section>

                <div class="container">

                    <div class="row">
                        <div class="col-sm-4" style="margin-top: 50px;">
                            <div class="text-center">
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                                    alt="avatar">
                                <h6>Actualizar foto</h6>
                                <input type="file" class="text-center center-block file-upload">
                            </div>
                            </hr><br>

                            <div class="panel panel-default">
                                <div class="panel-heading">BIENVENIDO <i class="fa fa-link fa-1x"></i></div>

                            </div>


                        </div>

                        <div class="col-sm-8" style="margin-top: 50px;">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Perfil</a></li>
                            </ul>


                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>
                                    <form class="form" action="##" method="post" id="registrationForm">
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="nombre">
                                                    <h4>Nombre</h4>
                                                </label>
                                                <input type="text" class="form-control" name="nombre" id="nombre"
                                                    placeholder="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h4>Apellido paterno</h4>
                                                </label>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                    placeholder="apellido paterno">
                                            </div>
                                        </div>

                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h4>Apellido materno</h4>
                                            </label>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                placeholder="apellido materno">
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label for="telefono">
                                            <h4>Telefono</h4>
                                        </label>
                                        <input type="text" class="form-control" name="movil" id="movil"
                                            placeholder="Ingresa tu numero">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="email">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="you@email.com">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="ciudad">
                                            <h4>Direcciòn</h4>
                                        </label>
                                        <input type="text" class="form-control" id="Direccion" placeholder="Direccion">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password">
                                            <h4>Contraseña</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="contraseña">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-xs-6">
                                        <label for="password2">
                                            <h4>Verifica la contraseña</h4>
                                        </label>
                                        <input type="password" class="form-control" name="password2" id="password2"
                                            placeholder="password2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <br>
                                        <button class="btn btn-success" type="submit"><i
                                                class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                                        <button class="btn btn-danger" type="reset"><i
                                                class="glyphicon glyphicon-repeat"></i> Borrar</button>
                                    </div>
                                </div>
                                </form>

                                <hr>

                            </div>
                        </div>

                    </div>
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
                    <p>2025 Limanprof. Todos los derechos reservados.
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
                if (e.target !== imgProfile) {
                    if (dropdownProfile.classList.contains('show')) {
                        dropdownProfile.classList.remove('show');
                    }
                }
            })
        </script>

    <?php
    } else {
        echo "<script language='JavaScript'>
            alert('No tienes el privilegio para entrar a esta página');
            location.assign(history.back());
            </script>";
    }
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>

</body>

</html>