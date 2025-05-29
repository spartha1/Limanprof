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

        </section>
            <?php

            include("../config/config.php");

            $sql = "select * from usuarios where tipo = 'usuario' ";

            $resultado = mysqli_query($conexion, $sql);

            ?>
            <div class="card-body">
                <!-- Botón Crear posicionado sobre la tabla -->
                <div class="mb-3">
                    <a href="AddNewUser.php" class="btn btn-success">Crear</a>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Ap_Paterno</th>
                            <th>Ap_Materno</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Tipo de usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($fila = mysqli_fetch_assoc($resultado)) {

                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre_usuario']; ?></td>
                                <td><?php echo $fila['email']; ?></td>
                                <td><?php echo $fila['codigo_pais']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['tipo']; ?></td>
                                <td><?php echo $fila['fecha_registro']; ?></td>
                                <!-- Columna de acciones con botones de modificar y eliminar -->
                                <td>
                                    <a href="UpdateUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Modificar</a>
                                    <a href="DeleteUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php

                        }

                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Empleados / Administradores -->

            <?php

            include("../config/config.php");

            $sql = "select * from usuarios where tipo = 'admin' ";

            $resultado = mysqli_query($conexion, $sql);

            ?>
            <div class="card-body">
                <!-- Botón Crear posicionado sobre la tabla -->
                <div class="mb-3">
                    <a href="AddNewUser.php" class="btn btn-success">Crear</a>
                </div>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Ap_Paterno</th>
                            <th>Ap_Materno</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Tipo de usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($fila = mysqli_fetch_assoc($resultado)) {

                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre_usuario']; ?></td>
                                <td><?php echo $fila['email']; ?></td>
                                <td><?php echo $fila['codigo_pais']; ?></td>
                                <td><?php echo $fila['telefono']; ?></td>
                                <td><?php echo $fila['tipo']; ?></td>
                                <td><?php echo $fila['fecha_registro']; ?></td>
                                <!-- Columna de acciones con botones de modificar y eliminar -->
                                <td>
                                    <a href="UpdateUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">Modificar</a>
                                    <a href="DeleteUser.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php

                        }

                        ?>
                    </tbody>
                </table>
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
    
</body>

</html>