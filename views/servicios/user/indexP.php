<?php
  include("../../../config/Conexion.php");
  
  $sql = "SELECT * FROM servicios";
  
  $resultado = mysqli_query($conectar, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../../static/img/aquashine.png" image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>SERVICIOS</title>
</head>
<style>
  .hero-section {
    position: relative;
    height: 300px;
    background-image: url('../../../static/img/c111.jpg');
    background-size: cover;
    background-position: center;
    color: white;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .hero-section::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(255, 0, 0, 0.6);
    z-index: 1;
  }

  .hero-text {
    z-index: 2;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .hero-button {
    z-index: 2;
    font-size: 18px;
    padding: 10px 20px;
    background-color: yellow;
    color: black;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }

  .logo-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  svg {
    width: 50px;
    height: 50px;
  }

  a {
    text-decoration: none;
  }
  .product-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    padding: 20px;
  }

  .card {
    background-color: #ffffff;
    border: 1px solid #e2e8f0; /* Color del borde */
    border-radius: 10px; /* Bordes redondeados */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
    padding: 20px;
    text-align: center;
    transition: transform 0.2s ease, box-shadow 0.2s ease; /* Efecto al pasar el cursor */
  }

  .card:hover {
    transform: translateY(-10px); /* Efecto hover que mueve la tarjeta hacia arriba */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efecto hover de sombra más fuerte */
  }

  .card-info {
    font-family: 'Poppins', sans-serif;
    color: #1e1b4b; /* Color del texto */
    font-size: 16px;
  }

  .card-info hr {
    margin: 15px 0;
    border: none;
    border-top: 1px solid #e2e8f0;
  }

  .card-info a {
    color: #1e1b4b; /* Color del enlace */
    font-weight: bold;
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .card-info a:hover {
    color: #ff3e00; /* Color al pasar el cursor por el enlace */
    text-decoration: underline;
  }



</style>

<div class="bg-gray-100 text-gray-800">

    <!-- Barra de Navegación -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="../../../Index.php" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="../../../static/img/logoaquashine.png" alt="Logo">
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
                                    <a href="../../../login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Inicia sesión</a>
                                </li>
                                <li>
                                    <a href="../../../register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Regístrate</a>
                                </li>
                                <li>
                                    <a href="../../../perfilUsuario.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
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
                        <a href="indexP.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                    </li>
                    <li>
                        <a href="../../ventas/ventas.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                    </li>
                    <li>
                        <a href="../../../ayuda/ayuda.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
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
                    <a href="../../ventas/carritoCompras.php" class="relative text-gray-600 hover:text-gray-800">
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
    <div class="hero-section">
      <div class="hero-text">Bienvenido a AquaShine<br>¡Servicio profesional</div>
      <a href="agendarservicio.php" class="hero-button">Agenda tu cita</a>
    </div>
  </header>
  <br>

  <div class="flex justify-center items-center h-full">
    <h1 class="text-4xl font-bold mb-4 text-[#1e1b4b]">BIENVENIDOS, QUEREMOS QUE CONOZCAN NUESTROS SERVICIOS</h1>
</div>


<div class="product-cards">
  <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
    <div class="card">
      <div class="card-info">
        <p><strong><?php echo $fila['nom_servicio']; ?></strong></p>
        <p><?php echo $fila['descripcion']; ?></p>
        <p><strong>Precio: </strong><?php echo $fila['precio']; ?></p>
        <hr>
        <a href="agendarservicio.php">¡Aparta tu cita!</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<div class="logo-container">
  <a href="https://wa.link/l0pntg" target="_blank">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M12 0C5.373 0 0 5.373 0 12c0 2.119.555 4.167 1.607 5.986L0 24l5.215-1.585C6.9 23.438 9.412 24 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-2.39 0-4.739-.78-6.679-2.229l-.481-.344-3.087.939.937-3.073-.355-.482C2.78 16.742 2 14.393 2 12 2 6.486 6.486 2 12 2s10 4.486 10 10-4.486 10-10 10zm5.031-6.222c-.278-.139-1.643-.811-1.896-.902-.252-.093-.437-.139-.623.139-.184.278-.715.902-.874 1.084-.162.184-.324.206-.602.07-.278-.139-1.175-.432-2.24-1.377-.829-.74-1.387-1.653-1.548-1.931-.162-.278-.017-.43.122-.569.126-.125.278-.324.417-.487.14-.162.185-.278.278-.463.093-.185.046-.347-.024-.487-.07-.139-.623-1.502-.852-2.057-.223-.537-.451-.463-.623-.463-.162-.007-.347-.008-.533-.008-.184 0-.485.07-.74.324s-.97.953-.97 2.323c0 1.37.993 2.695 1.131 2.878.139.185 1.957 2.987 4.746 4.019.665.285 1.185.454 1.59.586.668.211 1.276.182 1.757.111.536-.079 1.643-.67 1.876-1.317.23-.648.23-1.203.162-1.317-.07-.114-.253-.184-.53-.324z" />
    </svg>
  </a>
</div>

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
</html>
