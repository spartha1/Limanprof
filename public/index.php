<?php
// Redirección programada después de 3 segundos
header("Refresh: 5; url=../index.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Redirigiendo a Limanprofnprof</title>
    <link rel="stylesheet" href="/Limanprof/public/css/style.css">
    <link rel="stylesheet" href="/Limanprof/public/css/nosotros.css">
    <style>
        body {
            margin: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .logo {
            width: 250px;
            margin-bottom: 30px;
        }

        .loader {
            position: relative;
            width: 200px;
            height: 10px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }

        .loader::before {
            content: "";
            position: absolute;
            height: 100%;
            width: 0;
            background-color: #007bff;
            animation: loading 5s ease-in-out forwards;
        }

        @keyframes loading {
            0% {
                width: 0;
            }

            100% {
                width: 100%;
            }
        }

    </style>
</head>

<body>
    <section>
        <img src="/Limanprof/public/img/logoLimanprofnprofSB.png" alt="Limanprofnprof Logo" class="logo">

        <div class="loader"></div>
        <div class="text"><span>Redirigiendo a la página principal...</span></div>

    </section>
    <!-- Cambia esta ruta por tu logo real -->

</body>

</html>