<?php
session_start();


if (isset($_SESSION['usuario'])) {
    header("Location: index.php"); 
    exit();
}


require './config/conexion.php'; // Asegúrate de que tienes un archivo de configuración con la conexión a la base de datos

$error = '';

// Si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Consulta para verificar el correo y la contraseña
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verificación de contraseña
        if (password_verify($password, $user['password'])) {
            // Guardar el usuario en la sesión
            $_SESSION['usuario'] = $user['email'];
            header("Location: index.php"); // Redirigir al inicio
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
    
    $stmt->close();
    $conn->close();
}
?>

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

        /* Añadir estilo para el hover del botón */
.button-primary {
    background-color: #172554;
    color: white;
    transition: background-color 0.3s;
}

.button-primary:hover {
    background-color: #1d2b50; /* Ajusta el color de hover si es necesario */
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
                    <a href="Index.php" class="flex-shrink-0">
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
                
                <!-- Mostrar error si existe -->
                <?php if (!empty($error)): ?>
                    <div class="text-danger mb-4">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="config/validar.php">
                    <div class="relative flex w-full flex-col flex-wrap items-stretch mb-4">
                        <input type="email" name="email" placeholder="Correo electrónico" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
                    </div>
                    <div class="relative flex w-full flex-col flex-wrap items-stretch mb-4">
                        <div class="relative">
                            <input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <!-- Iconos de mostrar/ocultar contraseña -->
                                <svg id="eyeIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 6.5c-2.5 0-4.5 2-4.5 4.5s2 4.5 4.5 4.5 4.5-2 4.5-4.5S14.5 6.5 12 6.5zM12 13c-1.4 0-2.5-1.1-2.5-2.5S10.6 8 12 8s2.5 1.1 2.5 2.5S13.4 13 12 13z"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8.01-3.61-8.01-8.01 0-1.31.31-2.55.87-3.67 1.6-2.48 4.32-4.32 7.16-5.07.46-.13.93-.21 1.41-.21s.95.08 1.41.21c2.83.75 5.55 2.59 7.15 5.07.56 1.12.87 2.36.87 3.67 0 4.4-3.6 8.01-8.01 8.01z"></path></svg>
                                <svg id="eyeSlashIcon" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4c2.2 0 4.3.8 5.9 2.1l-1.6 1.6c-1.1-.8-2.4-1.4-3.8-1.7-.5-.1-1-.2-1.6-.2-2.2 0-4.3.8-5.9 2.1l1.6 1.6c1.1-.8 2.4-1.4 3.8-1.7.5-.1 1-.2 1.6-.2zM21.6 5.5l-2.6 2.6c-.4-.6-.8-1.1-1.3-1.5l2.6-2.6c1.6 2.5 2.7 5.5 2.7 8.8s-1.1 6.3-2.7 8.8l-2.6-2.6c.4-.6.8-1.1 1.3-1.5l-2.6-2.6c-.5 1.5-.8 3.2-.8 4.8s.3 3.3.8 4.8l2.6-2.6c.6-.4 1.1-.8 1.5-1.3l2.6 2.6c-2.5 1.6-5.4 2.6-8.7 2.6-2.2 0-4.3-.8-5.9-2.1l-1.6 1.6c1.6 1.3 3.7 2.1 5.9 2.1 4.4 0 8.3-2 11-5.3l2.6 2.6c1.4-2.2 2.6-4.7 3.3-7.4.6-2.4.9-5 1.1-7.6z"></path></svg>
                            </button>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <a href="olvidoContraseña.php" class="text-sm text-gray-500 hover:text-gray-700">Olvidé mi contraseña</a>
                    </div>
                    <button type="submit" class="px-4 py-2 rounded-lg w-full" style="background-color: #172554; color: white; transition: background-color 0.3s;">
    Iniciar sesión
</button>
                    <div class="text-center mb-4">
                        <br>
                        <a href="register.html" class="text-sm text-gray-500 hover:text-gray-700">¿No tienes cuenta? Registrate!</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer class="bg-gray-900 py-6">
    <div class="container mx-auto text-center text-white">
        <p>&copy; 2024 AquaShine. Todos los derechos reservados.</p>
    </div>
</footer>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('togglePassword').addEventListener('click', function () {
            const password = document.getElementById('contraseña');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            if (password.type === 'password') {
                password.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                password.type = 'password';
                eyeSlashIcon.classList.add('hidden');
                eyeIcon.classList.remove('hidden');
            }
        });
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
