
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
        <nav class="flex items-center justify-between flex-wrap bg-gray-900 border-inset border-2 border-zinc-200 p-6">
            <div class="text-6xl flex items-center flex-shrink-0 text-blue-600 mr-6">
                <span class="font-semibold text-xl tracking-tight">AquaShine</span>
            </div>
            <div class="block lg:hidden">
                <button id='boton' class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menú</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div id='menu' class="w-full block flex-grow lg:flex lg:items-center lg:w-auto text-center">
                <div class="text-sm lg:flex-grow">
<<<<<<< HEAD
                    <a href="../Index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        INICIO
                    </a>
                    <a href="../views/servicios/user/indexP.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="../views/ventas/ventas.html" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="ayuda.php" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
=======
                    <a href="Index.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        INICIO
                    </a>
                    <a href="./views/servicios/indexP.php" class="px-4 py-2 rounded-full inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="./views/ventas/ventas.html" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="./ayuda/ayuda.php" class="px-4 py-2 rounded-full block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:text-white rounded-md hover:bg-blue-600">
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
                      AYUDA
                  </a>
                  
                </div>
                <div>
<<<<<<< HEAD
                    <a href="../login.php" class="inline-block text-gray-200 text-sm px-4 py-2 leading-none border rounded hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
=======
                    <a href="login.html" class="inline-block text-gray-200 text-sm px-4 py-2 leading-none border rounded hover:border-transparent hover:text-sky-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
                </div>
            </div>
        </nav>
    </header>

<<<<<<< HEAD

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

=======
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
    
    <footer class="bg-gray-900 text-gray-200 py-6">
    <div class="container mx-auto text-center">
        <p class="text-lg mb-4">&copy; 2024 AquaShine. Todos los derechos reservados.</p>
        <div class="flex justify-center">
            <a href="https://www.facebook.com/profile.php?id=61564508919321" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.04c-5.3 0-9.63 4.33-9.63 9.63 0 4.7 3.48 8.6 8.02 9.4v-6.63h-2.4v-2.67h2.4v-1.9c0-2.4 1.44-3.76 3.61-3.76 1.03 0 2.1.08 2.1.08v2.31h-1.18c-1.16 0-1.52.71-1.52 1.45v1.74h2.61l-.42 2.67h-2.19v6.63c4.53-.8 8.01-4.7 8.01-9.4 0-5.3-4.32-9.63-9.62-9.63z"/></svg>
            </a>
            <a href="https://twitter.com/" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23 3c-.88.39-1.82.66-2.8.78 1.01-.61 1.78-1.57 2.14-2.72-.94.56-1.98.97-3.09 1.2-.89-.95-2.16-1.54-3.57-1.54-2.7 0-4.89 2.19-4.89 4.89 0 .38.04.76.1 1.12-4.07-.2-7.68-2.15-10.1-5.11-.42.72-.66 1.55-.66 2.45 0 1.69.86 3.18 2.17 4.06-.8-.03-1.55-.25-2.21-.62v.06c0 2.35 1.67 4.31 3.89 4.75-.41.11-.84.17-1.29.17-.31 0-.61-.03-.91-.09.62 1.94 2.42 3.35 4.55 3.39-1.67 1.31-3.76 2.09-6.04 2.09-.39 0-.77-.02-1.16-.07 2.12 1.36 4.63 2.14 7.34 2.14 8.8 0 13.6-7.29 13.6-13.6 0-.21-.01-.42-.02-.63.94-.68 1.76-1.53 2.42-2.5z"/></svg>
            </a>
            <a href="https://www.instagram.com/" class="mx-2 text-gray-200 hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.16c3.2 0 3.6.01 4.88.07 1.12.06 1.91.25 2.36.42.58.2 1.02.45 1.47.9.45.45.7.9.9 1.47.17.45.36 1.24.42 2.36.06 1.28.07 1.68.07 4.88s-.01 3.6-.07 4.88c-.06 1.12-.25 1.91-.42 2.36-.2.58-.45 1.02-.9 1.47-.45.45-.9.7-1.47.9-.45.17-1.24.36-2.36.42-1.28.06-1.68.07-4.88.07s-3.6-.01-4.88-.07c-1.12-.06-1.91-.25-2.36-.42-.58-.2-1.02-.45-1.47-.9-.45-.45-.7-.9-.9-1.47-.17-.45-.36-1.24-.42-2.36-.06-1.28-.07-1.68-.07-4.88s.01-3.6.07-4.88c.06-1.12.25-1.91.42-2.36.2-.58.45-1.02.9-1.47.45-.45.9-.7 1.47-.9.45-.17 1.24-.36 2.36-.42 1.28-.06 1.68-.07 4.88-.07zM12 0c-3.23 0-3.63.01-4.91.07-1.24.06-2.32.28-3.15.65-.85.38-1.6.89-2.27 1.56-.67.67-1.18 1.42-1.56 2.27-.37.83-.6 1.91-.65 3.15-.06 1.28-.07 1.68-.07 4.91 0 3.23.01 3.63.07 4.91.06 1.24.28 2.32.65 3.15.38.85.89 1.6 1.56 2.27.67.67 1.42 1.18 2.27 1.56.83.37 1.91.6 3.15.65 1.28.06 1.68.07 4.91.07 3.23 0 3.63-.01 4.91-.07 1.24-.06 2.32-.28 3.15-.65.85-.38 1.6-.89 2.27-1.56.67-.67 1.18-1.42 1.56-2.27.37-.83.6-1.91.65-3.15.06-1.28.07-1.68.07-4.91 0-3.23-.01-3.63-.07-4.91-.06-1.24-.28-2.32-.65-3.15-.38-.85-.89-1.6-1.56-2.27-.67-.67-1.42-1.18-2.27-1.56-.83-.37-1.91-.6-3.15-.65-1.28-.06-1.68-.07-4.91-.07zm0 5.83c-3.41 0-6.17 2.76-6.17 6.17 0 3.41 2.76 6.17 6.17 6.17 3.41 0 6.17-2.76 6.17-6.17 0-3.41-2.76-6.17-6.17-6.17zm0 10.72c-2.53 0-4.57-2.04-4.57-4.57 0-2.53 2.04-4.57 4.57-4.57 2.53 0 4.57 2.04 4.57 4.57 0 2.53-2.04 4.57-4.57 4.57zm4.12-8.91c-.67 0-1.21-.54-1.21-1.21s.54-1.21 1.21-1.21 1.21.54 1.21 1.21-.54 1.21-1.21 1.21z"/></svg>
            </a>
        </div>
    </div>
</footer>
    </body>

    </html>
    