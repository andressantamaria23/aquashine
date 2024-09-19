
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Incluye Material Icons -->
  
    <title>Resultados de Búsqueda</title>
    <style>
        /* Estilos para la grilla de productos */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        /* Estilos para cada tarjeta de producto */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        /* Imagen del producto */
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Nombre del producto */
        .product-name {
            font-size: 18px;
            font-weight: bold;
            margin: 10px 0;
        }

        /* Descripción del producto */
        .product-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        /* Precio del producto */
        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
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
</body>
</html>

<?php
// Incluir la conexión a la base de datos
require './config/conexion.php';

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    
    // Consulta SQL para buscar coincidencias en la base de datos
    $sql = "SELECT * FROM productos WHERE nom_producto LIKE ? OR prod_descrp LIKE ?";
    $stmt = $conn->prepare($sql);
    
    // Añadir comodines para búsqueda parcial
    $likeTerm = "%" . $searchTerm . "%";
    $stmt->bind_param('ss', $likeTerm, $likeTerm);
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Si hay resultados, mostrarlos
    if ($result->num_rows > 0) {
        echo "<h2>Resultados para '$searchTerm':</h2>";
        echo "<div class='product-grid'>";  // Inicia la grilla de productos
        while ($row = $result->fetch_assoc()) {
            // Obtener datos del producto
            $image = $row['img_producto']; // Se asume que la columna 'imagen' almacena la ruta de la imagen
            $productName = $row['nom_producto'];
            $description = $row['prod_descrp'];
            $price = $row['precio']; // Se asume que hay una columna 'precio'

            // Crear la tarjeta de cada producto
            echo "
            <div class='product-card'>
                <img src='./uploads/$image' alt='$productName' class='product-image'>
                <h3 class='product-name'>$productName</h3>
                <p class='product-description'>$description</p>
                <p class='product-price'>Precio: $$price</p>
                
            </div>";
        }
        echo "</div>";  // Cierra la grilla de productos
    } else {
        echo "No se encontraron resultados para '$searchTerm'";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Por favor ingresa un término de búsqueda.";
}
?>
