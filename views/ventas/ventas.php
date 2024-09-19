<?php
include("../../config/conexion.php");

session_start();
$varsesion = $_SESSION['email'];
if ($varsesion == null || $varsesion == '') {
    header('location:../../../Index.php');
    die();
}


try {
    // Variables de conexión a la base de datos
    $host = 'localhost';       // Cambia esto si es necesario
    $dbname = 'aquashine1';    // Cambia esto si es necesario
    $username = 'root';        // Cambia esto si es necesario
    $password = '';            // Deja esto vacío si no tienes contraseña

    // Crear la conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    die();
}

// Consulta para obtener los productos registrados
$sql = "SELECT idProductos, nom_producto, prod_descrp, precio, img_producto FROM productos";
$statement = $conn->prepare($sql);
$statement->execute();
$productos = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Incluye Material Icons -->
    <style>
        /* Estilos para el botón del carrito flotante */
        .shopping-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;

    background-color: #172554; /* Azul */
            border-radius: 50%; /* Botón circular */
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra elegante */
            cursor: pointer;
            transition: transform 0.2s ease-in-out; /* Efecto hover suave */
        }
        .shopping-cart:hover {
            transform: scale(1.1); /* Efecto al pasar el mouse */
        }
        .shopping-cart svg {
            width: 30px;
            height: auto;
            fill: #FFFFFF; /* Icono blanco */
        }

        /* Asegúrate de que la imagen cubra el contenedor sin distorsionarse */
img {
    object-fit: cover; /* Ajusta la imagen para cubrir el contenedor */
    width: 50%;
    height: 80%;
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
                    <a href="../../Index.php" class="flex-shrink-0">
                        <img class="h-10 w-auto" src="../../static/img/logoaquashine.png" alt="Logo">
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
                                    <a href="../../perfilUsuario.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Mi cuenta</a>
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
                        <a href="../../views/servicios/user/indexP.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Servicios</a>
                    </li>
                    <li>
                        <a href="ventas.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Compras</a>
                    </li>
                    <li>
                        <a href="../../ayuda/ayuda.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">Ayuda</a>
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
                    <a href="carritoCompras.php" class="relative text-gray-600 hover:text-gray-800">
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
<br>
<!-- Encabezado -->
<header style="background-color: #172554; color: white; padding: 1.5rem;">
    <div class="container mx-auto text-center">
        <!-- Cambié la tipografía a Merriweather para un estilo más formal -->
        <h1 style="font-size: 1.5rem; font-weight: bold; font-family: 'Merriweather', serif;">Nuestros Productos</h1>
    </div>
</header>


<main class="container mx-auto my-8 p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($productos as $producto): ?>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300">
                <?php
                // Verificar si la imagen existe en la ruta especificada
                $imgPath = "../../uploads/" . htmlspecialchars($producto['img_producto']);
                if (!file_exists($imgPath)) {
                    $imgPath = "imagen_no_disponible.jpg"; // Imagen por defecto
                }
                ?>
                <div class="relative w-full h-48 overflow-hidden">
                    <img src="<?php echo $imgPath; ?>" alt="<?php echo htmlspecialchars($producto['nom_producto']); ?>" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2 text-gray-700"><?php echo htmlspecialchars($producto['nom_producto']); ?></h2>
                    <p class="text-gray-500 mb-4"><?php echo htmlspecialchars($producto['prod_descrp']); ?></p>
                    <p class="text-lg font-bold mb-4" style="color: #172554;">
                        Precio: COP <?php echo number_format($producto['precio'], 2); ?>
                    </p>
                    <div class="flex justify-between items-center">
                        <form action="comprar.php" method="POST">
                            <input type="hidden" name="idProducto" value="<?php echo htmlspecialchars($producto['idProductos']); ?>">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Comprar</button>
                        </form>
                        <form action="agregarCarro.php" method="POST">
    <input type="hidden" name="idProducto" value="<?php echo htmlspecialchars($producto['idProductos']); ?>">
    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Añadir al carrito</button>
</form>
               

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>


<!-- Carrito flotante -->
<div class="shopping-cart">
    <a href="carritoCompras.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#818cf8">
            <path d="m480-560-56-56 63-64H320v-80h167l-64-64 57-56 160 160-160 160ZM280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM40-800v-80h131l170 360h280l156-280h91L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68.5-39t-1.5-79l54-98-144-304H40Z"/>
        </svg>
    </a>
</div>


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
<footer class="bg-gray-900 py-6">
    <div class="container mx-auto text-center text-white">
        <p>&copy; 2024 AquaShine. Todos los derechos reservados.</p>
    </div>
</footer>

</body>
</html>
