<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="static/img/aquashine.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/3.2.7"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <title>LOGIN AquaShine</title>
    <style>
        .bg-primary {
            background-color: #3490dc;
        }
        .hover\:bg-primary-accent-300:hover {
            background-color: #3b82f6;
        }
        .active\:bg-primary-600:active {
            background-color: #1e40af; 
        }
        .text-danger {
            color: #e3342f; 
        }
        .hover\:text-danger-600:hover {
            color: #cc1f1a; 
        }
        .active\:text-danger-700:active {
            color: #a51e16;
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
                    <a href="#" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="static/img/logoaquashine.png" alt="Logo">
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
                                    <a href="../../login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Inicia sesión</a>
                                </li>
                                <li>
                                    <a href="../../register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Regístrate</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
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
                    <a href="../../login.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                </li>
                <li>
                    <a href="../../register.html" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
                </li>
                <li>
                    <hr class="border-gray-200">
                </li>
            </ul>
        </div>
    </div>
</div>

    </div>


                    <!-- Mis Compras -->
                    
                    <!-- Icono del carrito -->
                    <a href="#" class="relative text-gray-600 hover:text-gray-800">
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
    <section class="relative h-screen bg-cover bg-center" style="background-image: url('static/img/pexels-pixabay-372810.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-2xl font-semibold text-center mb-6">INICIO DE SESIÓN</h2>
                <form action="reset_password_request.php" method="post">
                    <div class="relative flex w-full flex-col flex-wrap items-stretch mb-4">
                        <input type="email" name="email" placeholder="Correo electrónico" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-md hover:bg-primary-accent-300 active:bg-primary-600 transition duration-300">Enviar enlace de restablecimiento</button>
                </form>
                <div class="text-center mt-4">
                    <a href="login.php" class="text-sm text-gray-500 hover:text-gray-700">Volver al inicio de sesión</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        });
    </script>


<footer class="bg-gray-900 text-gray-200 py-6">
    <div class="container mx-auto text-center">
        <p class="text-lg mb-4">&copy; 2024 AquaShine. Todos los derechos reservados.</p>
        <div class="flex justify-center">
            <a href="https://www.facebook.com/" class="mx-2 text-gray-200 hover:text-white">
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
            dropdownMenu.classList.toggle('hidden'); // Alterna la clase 'hidden'
        });

        // Cierra el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden'); // Añade la clase 'hidden' para ocultar el menú
            }
        });
    });
</script>

</body>
</html>
