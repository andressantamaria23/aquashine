<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Trabajador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="../../static/img/aquashine.png" alt="Aquashine" class="h-8">
                <h1 class="text-white ml-4">Bienvenido, Trabajador</h1>
            </div>
            <div>
    <a href="../../Index.php" class="text-gray-300 hover:text-white">Cerrar Sesión</a>
</div>

        </div>
    </nav>

    <!-- Panel de Trabajador -->
    <div class="container mx-auto mt-10">
        <h2 class="text-center text-2xl font-bold mb-6">Panel del Trabajador</h2>
        
      

        <!-- Grid de botones -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <!-- Botón Proveedores -->
            <a href="../proveedores/proveedores.php" class="block bg-blue-500 hover:bg-blue-700 text-white text-center py-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="flex justify-center items-center space-x-2">
                    <span>Proveedores</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 10a5 5 0 1110 0 5 5 0 01-10 0zm8.35 4.17A8.5 8.5 0 0010 18a8.5 8.5 0 00-3.35-.83l-1.91 2.09A9.98 9.98 0 0110 20c2.64 0 5.05-.93 6.96-2.49l-1.91-2.09z"/>
                    </svg>
                </div>
            </a>

            <!-- Botón Productos -->
            <a href="../producto/producto.php" class="block bg-green-500 hover:bg-green-700 text-white text-center py-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="flex justify-center items-center space-x-2">
                    <span>Productos</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zM5 5v10h10V5H5zm3 2h4v2H8V7z"/>
                    </svg>
                </div>
            </a>

            <!-- Botón Inventario -->
            <a href="../inventario/inventario.php" class="block bg-yellow-500 hover:bg-yellow-700 text-white text-center py-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="flex justify-center items-center space-x-2">
                    <span>Inventario</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9 2a1 1 0 00-.8.4L6 5H4a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V6a1 1 0 00-1-1h-2l-2.2-2.6A1 1 0 0011 2H9zM9 4h2l1 1H8l1-1zM5 7h10v7H5V7zm2 2v2h6V9H7z"/>
                    </svg>
                </div>
            </a>

            <!-- Botón Ventas -->
            <a href="../compras/compras.php" class="block bg-red-500 hover:bg-red-700 text-white text-center py-4 rounded-lg shadow-md transform hover:scale-105 transition duration-300">
                <div class="flex justify-center items-center space-x-2">
                    <span>Compras</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M4.5 2a1 1 0 00-.832 1.555l7 10.5a1 1 0 001.664 0l7-10.5A1 1 0 0016.5 2h-12z"/>
                    </svg>
                </div>
            </a>
        </div>

        <!-- Panel de Actividad Reciente -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold mb-4">Actividad Reciente</h3>
            <ul class="space-y-2">
                <li class="text-gray-600">Registraste una nueva venta</li>
                <li class="text-gray-600">Actualizaste el inventario de productos</li>
                <li class="text-gray-600">Consultaste los proveedores</li>
            </ul>
        </div>
    </div>
</body>
</html>
