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
    $password = $_POST['password'];

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
    </style>
</head>
<body class="mx-auto font-[Poppins] bg-image">
    <header class="mt-3">
        <nav class="flex items-center justify-between flex-wrap bg-gray-900 border-inset border-2 border-zinc-200 p-6">
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
                    <a href="Index.php" class="px-4 py-2 rounded-md inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600 mr-4">
                        HOME
                    </a>
                    <a href="views/servicios/user/indexP.php" class="px-4 py-2 rounded-md inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="views/ventas/ventas.php" class="px-4 py-2 rounded-md block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600">
                        TIENDA
                    </a>
                    <a href="ayuda/ayuda.php" class="px-4 py-2 rounded-md block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600">
                        AYUDA
                    </a>
                </div>
                <div>
                    <a href="login.php" class="inline-block text-sm text-gray-200 px-4 py-2 leading-none border rounded border-white hover:border-transparent hover:text-gray-900 hover:bg-purple-300 mt-4 lg:mt-0">INGRESAR</a>
                </div>
            </div>
        </nav>
    </header>

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
        <input type="password" name="contrasena" id="contraseña" placeholder="contraseña" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
            <!-- Iconos de mostrar/ocultar contraseña -->
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            </svg>
            <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill hidden" viewBox="0 0 16 16">
                <path d="M13.359 11.238l1.397 1.398c-.876.659-1.934 1.264-3.105 1.651C10.183 14.776 9.099 15 8 15c-2.694 0-5.048-1.281-7-3.5a13.133 13.133 0 0 1 2.083-2.197"/>
                <path d="M3.383 2.092L2.02.728a.5.5 0 1 1 .707-.707l1.717 1.717c.364-.11.74-.192 1.126-.248 1.16-.177 2.362-.12 3.603.206 1.84.48 3.488 1.472 5.07 3.076A13.13 13.13 0 0 1 16 8c-.632.885-1.317 1.693-2.043 2.419l-1.46-1.46a4.5 4.5 0 0 0-6.445-6.445L3.383 2.092z"/>
            </svg>
        </button>
    </div>
</div>

                    <div class="text-center mb-4">
                        <a href="olvidoContraseña.php" class="text-sm text-gray-500 hover:text-gray-700">Olvidé mi contraseña</a>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg w-full hover:bg-primary-accent-300">Iniciar sesión</button>
                    <div class="text-center mb-4">
                        <br>
                        <a href="register.php" class="text-sm text-gray-500 hover:text-gray-700">¿No tienes cuenta? Registrate!</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

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
</body>
</html>
