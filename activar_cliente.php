<?php
require 'config/conexion.php';
require 'clienteFunciones.php';

$idUsuario = isset($_GET['idUsuario']) ? $_GET['idUsuario']: '';
$token = isset($_GET['confirmacion']) ? $_GET['confirmacion']: '';

if($idUsuario == '' || $token == '' ){
    header("Location: index.php");
    exit; 
}

validaToken($idUsuario, $token, $conectar)



?>
<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css' rel='stylesheet'>
    <title>Registrarse</title>
    <style>
        .bg-image {
            background-image: url('../aquashine/img/auto.gif');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="mx-auto font-[Poppins] bg-image">
    <header class="mt-3">
        <nav class="flex items-center justify-between flex-wrap bg-gray-900 border-2 border-zinc-200 p-6">
            <div class="text-6xl flex items-center flex-shrink-0 text-blue-600 mr-6">
                <span class="font-semibold text-xl tracking-tight">Aqua Shine</span>
            </div>
            <div class="block lg:hidden">
                <button id="boton" class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
            <div id="menu" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
                <div class="text-sm lg:flex-grow">
                    <a href="Index.php" class="px-4 py-2 rounded-md inline-block hover:shadow-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600 mr-4">
                        HOME
                    </a>
                    <a href="views/servicios/indexP.php" class="px-4 py-2 rounded-md inline-block hover:shadow-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="views/ventas/ventas.html" class="px-4 py-2 rounded-md inline-block hover:shadow-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="ayuda/ayuda.php" class="px-4 py-2 rounded-md inline-block hover:shadow-lg mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600">
                        AYUDA
                    </a>
                </div>
                <div>
                    <a href="login.php" class="inline-block text-sm text-gray-200 px-4 py-2 leading-none border rounded border-white hover:border-transparent hover:text-gray-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mx-auto text-center">
        <div class="mt-2 text-4xl font-bold text-blue-600">
            <p class="my-2">REGÍSTRATE</p>
        </div>

    




        <div class="my-3 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
        </div>

       <div>CLIENTE ACTIVADO</div>
    </div>


    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js'></script>
    <script src="envioemail.js"></script>

    <footer class="bg-gray-900 text-gray-200 py-6">
        <div class="container mx-auto text-center">
            <p class="text-lg mb-4">&copy; 2024 AquaShine. Todos los derechos reservados.</p>
            <div class="flex justify-center">
                <a href="https://www.facebook.com/" class="mx-2 text-gray-200 hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.04c-5.3 0-9.63 4.33-9.63 9.63 0 4.7 3.48 8.6 8.02 9.4v-6.63h-2.4v-2.67h2.4v-1.9c0-2.35 1.42-3.63 3.52-3.63 1 0 1.85.07 2.1.1v2.43l-1.44.01c-1.13 0-1.35.54-1.35 1.32v1.73h2.7l-.36 2.67h-2.34V21c4.53-.8 8.02-4.7 8.02-9.4 0-5.3-4.33-9.63-9.63-9.63z"/>
                    </svg>
                </a>
                <a href="https://www.instagram.com/" class="mx-2 text-gray-200 hover:text-white">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.04c-5.3 0-9.63 4.33-9.63 9.63 0 4.7 3.48 8.6 8.02 9.4v-6.63h-2.4v-2.67h2.4v-1.9c0-2.35 1.42-3.63 3.52-3.63 1 0 1.85.07 2.1.1v2.43l-1.44.01c-1.13 0-1.35.54-1.35 1.32v1.73h2.7l-.36 2.67h-2.34V21c4.53-.8 8.02-4.7 8.02-9.4 0-5.3-4.33-9.63-9.63-9.63z"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
