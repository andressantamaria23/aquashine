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
        if (password_verify($password, $user['contrasena'])) {
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
<body class="mx-auto font-[Poppins] bg-cover bg-center" style="background-image: url('static/img/pexels-pixabay-372810.jpg');">
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
                    <a href="views/servicios/indexP.php" class="px-4 py-2 rounded-md inline-block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600 mr-4">
                        SERVICIOS
                    </a>
                    <a href="views/ventas/ventas.html" class="px-4 py-2 rounded-md block hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] mt-4 lg:inline-block lg:mt-0 text-gray-200 hover:bg-blue-600">
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

                <form method="POST" action="login.php">
                    <div class="relative flex w-full flex-col flex-wrap items-stretch mb-4">
                        <input type="email" name="email" placeholder="Correo electrónico" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
                    </div>
                    <div class="relative flex w-full flex-col flex-wrap items-stretch mb-4">
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Contraseña" class="px-4 py-3 placeholder-gray-400 text-gray-700 bg-white border border-gray-300 rounded-lg text-base w-full" required />
                            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <!-- Iconos de mostrar/ocultar contraseña -->
                                <svg id="eyeIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 6.5c-2.5 0-4.5 2-4.5 4.5s2 4.5 4.5 4.5 4.5-2 4.5-4.5S14.5 6.5 12 6.5zM12 13c-1.4 0-2.5-1.1-2.5-2.5S10.6 8 12 8s2.5 1.1 2.5 2.5S13.4 13 12 13z"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8.01-3.61-8.01-8.01 0-1.31.31-2.55.85-3.66L9 15c-1.33 0-2.64-.36-3.73-.95-.15-.11-.26-.25-.36-.39-.35.95-.62 1.97-.62 3.04 0 4.41 3.59 8.01 8 8.01s8.01-3.59 8.01-8.01c0-1.07-.27-2.09-.62-3.04-.1.14-.21.28-.36.39-1.09.59-2.4.95-3.73.95l5.14-6.58c.54 1.11.85 2.35.85 3.66 0 4.41-3.59 8.01-8.01 8.01z"></path></svg>
                                <svg id="eyeSlashIcon" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s1.3-3 11-3c4.64 0 8.66 1.37 10.2 3.68C21.45 12.64 20.5 15.62 19 18.04M6.54 7.24C4.75 8.64 2.79 10.72 1 12s1.3 3 11 3c4.64 0 8.66-1.37 10.2-3.68M6 18l-2.57-2.57C3.11 14.78 2.04 13.29 2 12s1.3-3 11-3c1.26 0 2.5.11 3.65.31"></path></svg>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg w-full hover:bg-primary-accent-300 active:bg-primary-600">Iniciar sesión</button>
                </form>
                <div class="text-center mt-4">
                    <a href="signup.php" class="text-primary hover:text-primary-accent-300">Crear una cuenta</a>
                </div>
            </div>
        </div>
    </section>
    <script>
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeSlashIcon = document.getElementById('eyeSlashIcon');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.add('hidden');
        eyeSlashIcon.classList.remove('hidden');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('hidden');
        eyeSlashIcon.classList.add('hidden');
    }
});
</script>

</body>
</html>
