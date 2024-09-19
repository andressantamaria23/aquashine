
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

<div class="bg-gray-100 text-gray-800">

    <!-- Barra de Navegación -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="../views/ventas/ventas.php" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="../static/img/logoaquashine.png" alt="Logo">
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
                                    <a href="../login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Inicia sesión</a>
                                </li>
                                <li>
                                    <a href="../register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Regístrate</a>
                                </li>
                                <li>
                                    <a href="../perfilUsuario.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
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
                        <a href="../views/servicios/user/indexP.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                    </li>
                    <li>
                        <a href="../views/ventas/ventas.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                    </li>
                    <li>
                        <a href="ayuda.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
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
                    <a href="../views/ventas/carritoCompras.php" class="relative text-gray-600 hover:text-gray-800">
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

<body class="bg-gray-100">
  <div class="flex h-screen">
    <div class="bg-white w-64 p-4 shadow-md">
      <div class="mb-6">
        <a href="#" class="flex items-center">
          <img src="../static/img/aquashine.png" alt="Logo" class="h-8">
          <span class="ml-2 text-xl font-semibold">Servicio de ayuda</span>
        </a>
      </div>
      <ul class="space-y-4">
        <li>
          <a href="#" class="flex items-center p-3 rounded-md bg-gray-50 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13.059m0-13.059l-7.495 7.495m7.495-7.495L21 12m-7.495 7.495L12 21" />
            </svg>
            <span class="ml-3 font-medium">Funciones de AquaShine</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-3 rounded-md bg-gray-50 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 01-8 0 4 4 0 01-8 0V5.25m8 12.5V15m-8 0V5.25m8 12.5V15m-8 0V5.25" />
            </svg>
            <span class="ml-3 font-medium">Administrar tu cuenta</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-3 rounded-md bg-gray-50 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V5a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2z" />
            </svg>
            <span class="ml-3 font-medium">Seguridad</span>
          </a>
        </li>
     
        <li>
          <a href="#" class="flex items-center p-3 rounded-md bg-gray-50 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-3 font-medium">Condiciones y políticas</span>
          </a>
        </li>
        
      </ul>
    </div>
    <div class="flex-grow p-4">
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">¿En qué podemos ayudarte?</h2>
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input type="text" placeholder="Buscar..." class="ml-3 flex-grow rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500" />
        </div>
        <h3 class="text-xl font-semibold mb-4">Temas destacados</h3>
        <ul class="space-y-2">
          <li>
            <a href="#" class="text-blue-500 hover:underline">Inicio de sesión</a>
          </li>
          <li>
            <a href="#" class="text-blue-500 hover:underline">Registro de usuario</a>
          </li>
          <li>
            <a href="#" class="text-blue-500 hover:underline">Proceso de reserva</a>
          </li>
          <li>
            <a href="#" class="text-blue-500 hover:underline">Compras, carrito y productos</a>
          </li>
          <li>
            <a href="#" class="text-blue-500 hover:underline">Servicios</a>
          </li>
          <li>
            <a href="#" class="text-blue-500 hover:underline">Mi perfil de AquaShine</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="bg-gray-200 p-4 w-64">
      <div class="flex justify-between items-center">
        <span class="text-gray-600 font-medium">Español (España)</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-gray-500">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
  </div>
</body>
</html>
    
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
    </body>

    </html>
    