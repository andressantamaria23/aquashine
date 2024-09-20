<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Ensure body is relative for absolute positioning of the nav */
        }

        .nav-wrapper {
            position: absolute; /* Position navigation absolutely */
            top: 0;
            left: 0;
            right: 0;
            z-index: 10; /* Ensure nav is above other content */
        }

        .container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
        }

        .product-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            width: 100%;
            max-width: 350px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .product-details {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            text-align: left;
            background-color: #fdfdfd;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .product-title {
            font-size: 2.2em;
            margin-bottom: 15px;
            color: #333;
            font-weight: 600;
        }

        .product-description {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .product-price {
            font-size: 1.8em;
            color: #27ae60;
            font-weight: bold;
            margin: 10px 0;
        }

        .quantity-input {
            width: 80px;
            padding: 10px;
            font-size: 1.2em;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 20px;
            transition: border-color 0.3s ease;
        }

        .quantity-input:focus {
            border-color: #2980b9;
            outline: none;
        }

        .buy-button {
            background-color: #2980b9;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1.2em;
            font-weight: 500;
            text-transform: uppercase;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .buy-button:hover {
            background-color: #1f639a;
            transform: scale(1.05);
        }

        .dropdown-menu {
            display: none;
        }
        
        .login-menu:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <div class="nav-wrapper bg-gray-100 text-gray-800">
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="carritoCompras.php" class="flex-shrink-0">
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

                        <!-- Menú desplegable de Actividades -->
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

    <!-- Contenido del producto -->
    <div class="container">
        <?php
        include("../../config/conexion.php");

        // Verifica si se envió el ID del producto
        if (isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];

            try {
                // Crear la conexión PDO
                $host = 'localhost';  // Cambia si es necesario
                $dbname = 'aquashine1';  // Cambia si es necesario
                $username = 'root';  // Cambia si es necesario
                $password = '';  // Deja vacío si no tienes contraseña

                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para obtener el producto por su ID
                $sql = "SELECT idProductos, nom_producto, prod_descrp, precio, img_producto FROM productos WHERE idProductos = :idProducto";
                $statement = $conn->prepare($sql);
                $statement->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
                $statement->execute();
                $producto = $statement->fetch(PDO::FETCH_ASSOC);

                if ($producto) {
                    // Mostrar los detalles del producto
                    echo "
                    <div class='product-card'>
                        <div class='product-image'>
                            <img src='../../uploads/{$producto['img_producto']}' alt='{$producto['nom_producto']}' />
                        </div>
                        <div class='product-details'>
                            <h1 class='product-title'>{$producto['nom_producto']}</h1>
                            <p class='product-description'>{$producto['prod_descrp']}</p>
                            <p class='product-price'>COP " . number_format($producto['precio'], 2) . "</p>

                            <form method='POST' action='pago.php'>
                                <label for='cantidad'>Cantidad:</label>
                                <input type='number' id='cantidad' name='cantidad' min='1' value='1' class='quantity-input' required />
                                
                                <input type='hidden' name='idProducto' value='{$producto['idProductos']}' />
                                <input type='hidden' name='precio' value='{$producto['precio']}' />

                                <button type='submit' class='buy-button'>Comprar ahora</button>
                            </form>
                        </div>
                    </div>";
                } else {
                    echo "<p>Producto no encontrado.</p>";
                }
            } catch (PDOException $e) {
                echo "Error en la conexión: " . $e->getMessage();
            }
        } else {
            echo "<p>ID de producto no enviado.</p>";
        }
        ?>
    </div>

    

    <script>
        document.querySelector('#menuButton').addEventListener('click', function() {
            document.querySelector('#dropdownMenu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
