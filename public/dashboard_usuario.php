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
    if ($_SESSION['tipo'] == "usuario") {
    ?>
        <header class="header">
            <a href="#"><img class="logo" src="/Limanprof/Public/img/logoLimanprofnprofSB.png" alt="Logo de Limanprofnprof"></a>

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
                <a href="#" class="brand"><i class='bx bxs-smile icon'></i> UserSite</a>
                <ul class="side-menu">
                    <li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i> Mi perfil</a></li>
                    <li class="divider" data-text="main">Main</li>
                    <li>
                        <a href="#"><i class='bx bxs-inbox icon'></i> Servicios <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Mis servicios</a></li>
                            <li><a href="#">Cotizaciones</a></li>
                            <li><a href="#">Productos</a></li>
                            <li><a href="#">Mis pedidos</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class='bx bxs-chart icon'></i> Charts</a></li>
                    <li><a href="#"><i class='bx bxs-widget icon'></i> Widgets</a></li>
                    <li class="divider" data-text="table and forms">Table and forms</li>
                    <li><a href="#"><i class='bx bx-table icon'></i> Tables</a></li>
                    <li>
                        <a href="#"><i class='bx bxs-notepad icon'></i> Forms <i class='bx bx-chevron-right icon-right'></i></a>
                        <ul class="side-dropdown">
                            <li><a href="#">Basic</a></li>
                            <li><a href="#">Select</a></li>
                            <li><a href="#">Checkbox</a></li>
                            <li><a href="#">Radio</a></li>
                        </ul>
                    </li>
                </ul>
            </section>

        </aside>

        <main>
        <h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<!-- <div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>1500</h2>
							<p>Traffic</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
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
						<i class='bx bx-trending-down icon down' ></i>
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
						<i class='bx bx-trending-up icon' ></i>
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
						<i class='bx bx-trending-up icon' ></i>
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
							<button type="submit" class="btn-send"><i class='bx bxs-send' ></i></button>
						</div>
					</form>
				</div>
			</div> -->

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