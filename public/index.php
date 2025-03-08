<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limanprof</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/video.css">
    <link rel="stylesheet" href="../css/carrucel.css">
    <link href="/img/Icono.png" rel="icon" type="image/x-icon">
</head>

<body>
<?php include '../public/components/header.html'; ?>


    <main>
        <div class="img-index">
            <img src="/lima/public/img/espacio_limpio.png">
        </div>
        <div class="video-container swiper">
            <video src="/lima/public/img/LIMANPROF.mp4" autoplay loop muted playsinline></video>
        </div>
        <h2 class="Clientes">Nuestos Servicios:</h2>
        <!--Carrucel-->
        <div class="carrucel_container">
            <button class="flecha izquierda">&lt;</button>
            <div class="slider-wrapper">
                <div class="card-list">
                    <div class="card-item">
                        <img src="/lima/public/img/Clientes/C_BINOME_TOWNHOUSES.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">BINOME TOWN HOUSES</h3>
                        <p class="review">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                    <div class="card-item">
                        <img src="/lima/public/img/Clientes/C_CONDOMINIO_PALMAS.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">CONDOMINIO LAS PALMAS</h3>
                        <p class="review">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                    <div class="card-item">
                        <img src="/lima/public/img/Clientes/C_RESIDENCIAL_GRAND.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">RESIDENCIAL GRAND</h3>
                        <p class="review">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                    <div class="card-item">
                        <img src="/lima/public/img/Clientes/C_RESIDENCIAL_LAGUNA_MAYRAN.webp" alt="" class="client-image" loading="lazy" />
                        <h3 class="client_name">RESIDENCIAL LAGUNA MAYRAN</h3>
                        <p class="review">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>

                </div>
            </div>
            <button class="flecha derecha">&gt;</button>
        </div>
    </main>
    
    <?php include '../public/components/footer.html'; ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cardItems = document.querySelectorAll(".card-item");

            // URLs de destino en orden
            const urls = [
                "limpieza.html",
                "jardineria.html",
                "mantenimiento.html",
                "servicios-especiales.html"
            ];

            // Asignar evento de clic a cada tarjeta
            cardItems.forEach((card, index) => {
                card.addEventListener("click", () => {
                    window.location.href = urls[index];
                });
            });
        });
    </script>

</body>

</html>