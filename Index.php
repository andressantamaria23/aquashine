<?php
include("./config/conexion.php");

$sql = "SELECT * FROM servicios";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>    
    <link rel="icon" href="static/img/aquashine.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
  
    <title>AquaShine</title>
    <style>
        .swiper-button-next, .swiper-button-prev {
            color: rgb(245, 0, 0);
            top: 50%; 
            transform: translateY(-20%);
        }
    </style>
</head>
<body class="mx-auto mt-5 bg-zinc-50 font-[Poppins]">
    <header>
<!-- Incluye la fuente en tu HTML -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

<div class="bg-gray-100 text-gray-800">

    <!-- Barra de Navegación -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="./static/img/logoaquashine.png" alt="Logo">
                    </a>
                </div>

           <!-- Barra de Búsqueda -->
           <div class="flex-1 flex justify-center">
                    <div class="w-full max-w-lg">
                        <form action="#" method="GET" class="relative">
                            <input type="text" name="search" placeholder="Buscar en AquaShine"
                                class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <button type="submit"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Menú desplegable de inicio de sesión -->
                    <div class="relative login-menu group">
                        <a href="#" class="text-gray-600 hover:text-gray-800 flex items-center">
                            Hola, Inicia sesión
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="absolute hidden dropdown-menu bg-white shadow-lg mt-2 rounded-lg w-40 z-10">
                            <!-- Flecha arriba del menú -->
                            <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-white"></div>
                            
                            <ul class="py-2">
                                <li>
                                    <a href="login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Inicia sesión</a>
                                </li>
                                <li>
                                    <a href="register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Regístrate</a>
                                </li>
                                <li>
                                    <a href="perfilUsuario.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
                                </li>
                                <li>
                                    <hr class="border-gray-200">
                                </li>
                               
                            </ul>
                        </div>
                    </div>

                <!-- Sección Derecha -->
                <div class="flex items-center space-x-4">
        <div class="relative login-menu group">
            <a href="#" class="text-gray-600 hover:text-gray-800 flex items-center" id="menuButton">
                Actividades
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
            <div class="absolute hidden dropdown-menu bg-white shadow-lg mt-2 rounded-lg w-40 z-10" id="dropdownMenu">
                <!-- Flecha arriba del menú -->
                <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-white"></div>
                
                <ul class="py-2">
                    <li>
                        <a href="./views/servicios/user/indexP.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                    </li>
                    <li>
                        <a href="./views/ventas/ventas.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                    </li>
                    <li>
                        <a href="ayuda/ayuda.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
                    </li>
                    <li>
                        <hr class="border-gray-200">
                    </li>
                </ul>
            </div>
        </div>
    </div>


                    <!-- Mis Compras -->
                    
                    <!-- Icono del carrito -->
                    <a href="./views/ventas/carritoCompras.php" class="relative text-gray-600 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-2 9H5L3 3zm5 13a2 2 0 100 4 2 2 0 000-4zm8 2a2 2 0 110 4 2 2 0 010-4z" />
                        </svg>
                        <span class="absolute -top-1 -right-2 bg-red-600 text-white text-xs rounded-full px-1">0</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>

    </header>

    <div class="container bg-gray-900 grid grid-cols-2 mx-auto flex items-center justify-center min-h-screen mt-6">
      <div class="text-center text-4xl text-gray-100 my-10">
        VIVE LA MEJOR EXPERIENCIA 
        <br>
        DE NUESTROS SERVICIOS
        <br>
        PARA TU VEHÍCULO
      </div>
      <div>
        <img class="mr-4 w-120 h-100" src="./static/img/car.gif" alt="Coche">
    </div>
    </div>
    <hr>

    <br>
    <br>



 

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



      
<section id="quienes-somos" class="py-12 px-4">
  <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
      <h1 class="text-3xl font-bold text-gray-800 mb-6">Quiénes Somos</h1>
      <p class="text-lg text-gray-700 mb-4">
          En <strong>AquaShine</strong> nos dedicamos a transformar la manera en que los lavaderos gestionan sus operaciones diarias. Fundados con el objetivo de ofrecer soluciones innovadoras y eficientes, nuestro software está diseñado para simplificar la administración de tu negocio de lavado de vehículos, mejorando la experiencia tanto para los clientes como para los empleados.
      </p>
      
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Misión</h2>
      <p class="text-lg text-gray-700 mb-4">
          Proveer una plataforma integral que optimice la gestión de servicios, ventas e inventario en el sector de lavados de vehículos, facilitando un servicio excepcional y aumentando la satisfacción del cliente.
      </p>

      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Nuestra Visión</h2>
      <p class="text-lg text-gray-700 mb-4">
          Ser el líder en soluciones de software para el sector de lavado de vehículos, reconocido por nuestra innovación, calidad y compromiso con la excelencia.
      </p>
  </div>
</section>



<section id="ubicacion" class="py-12 px-4">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Ubicación</h1>
            <div class="flex justify-center">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127258.0393105533!2d-74.20085311005776!3d4.627297985277856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a45d9f1654b%3A0x3d69138572d157f2!2sSENA%20-%20Centro%20De%20Servicios%20Financieros!5e0!3m2!1ses-419!2sco!4v1725633474964!5m2!1ses-419!2sco" 
                    width="800" 
                    height="600" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <br>
<footer class="bg-gray-900 py-6">
    <div class="container mx-auto text-center text-white">
        <p>&copy; 2024 AquaShine. Todos los derechos reservados.</p>
    </div>
</footer>





<script>
    // Selecciona el elemento del menú y el contenido desplegable
    const loginMenu = document.querySelector('.login-menu');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    // Evento cuando el mouse pasa sobre el menú
    loginMenu.addEventListener('mouseover', () => {
        dropdownMenu.classList.remove('hidden');  // Mostrar el menú
    });

    // Evento cuando el mouse sale del área del menú
    loginMenu.addEventListener('mouseout', () => {
        dropdownMenu.classList.add('hidden');  // Esconder el menú
    });
</script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButton = document.getElementById('menuButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            menuButton.addEventListener('click', function(event) {
                event.preventDefault(); // Evita el comportamiento por defecto del enlace
                dropdownMenu.classList.toggle('hidden');
            });

            // Cierra el menú si se hace clic fuera de él
            document.addEventListener('click', function(event) {
                if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const userLoggedIn = <?php echo json_encode(isset($_SESSION['idUsuario'])); ?>;
            const accountLink = document.querySelector('a[href="../../perfilUsuario.php"]');

            if (userLoggedIn) {
                accountLink.href = "../../perfilUsuario.php";
            } else {
                accountLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = "../../login.php";
                });
            }
        });
    </script>
<script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
