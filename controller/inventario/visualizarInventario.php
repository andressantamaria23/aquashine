<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="../../static/img/aquashine.png" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="inventario.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Inventario</a>
                            <a href="../proveedores/proveedores.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Proveedores</a>
                            <a href="../producto/producto.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Producto</a>
                            <a href="../compras/compras.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Compras</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <!-- Botón de regresar alineado a la izquierda -->
        <div class="flex justify-start mb-4">
            <a href="javascript:history.back()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Regresar
            </a>
        </div>

        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Inventario de Productos</h2>

        <?php
        // Datos de conexión
        $host = 'localhost';
        $user = 'root';
        $clave = ''; // Contraseña vacía si no estás usando una
        $bd = 'aquashine1';
        $puerto = '3306';

        // Conectar a la base de datos
        $conectar = mysqli_connect($host, $user, $clave, $bd, $puerto);

        // Verificar la conexión
        if (!$conectar) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta para obtener el stock de productos en el inventario
        $sql = "SELECT p.nom_producto, p.precio, i.cantidad, i.FK_proveedores 
                FROM inventario i
                JOIN productos p ON i.FK_producto = p.idProductos
                ORDER BY p.nom_producto ASC";

        $resultado = mysqli_query($conectar, $sql);

        // Verificar si la consulta tuvo resultados
        if (mysqli_num_rows($resultado) > 0) {
            echo "<div class='overflow-x-auto'>
                    <table class='min-w-full bg-white border border-gray-300 rounded-lg shadow-lg'>
                        <thead>
                            <tr>
                                <th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b'>Producto</th>
                                <th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b'>Precio</th>
                                <th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b'>Cantidad en Stock</th>
                                <th class='px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b'>Proveedor</th>
                            </tr>
                        </thead>
                        <tbody class='bg-white divide-y divide-gray-200'>";

            // Recorrer los resultados y mostrarlos en una tabla
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>
                        <td class='px-6 py-4 whitespace-nowrap'>" . $fila['nom_producto'] . "</td>
                        <td class='px-6 py-4 whitespace-nowrap'>" . $fila['precio'] . "</td>
                        <td class='px-6 py-4 whitespace-nowrap'>" . $fila['cantidad'] . "</td>
                        <td class='px-6 py-4 whitespace-nowrap'>" . $fila['FK_proveedores'] . "</td>
                    </tr>";
            }

            echo "</tbody>
                </table>
                </div>";
        } else {
            echo "<p class='text-center text-gray-600'>No hay productos en el inventario.</p>";
        }

        // Cerrar la conexión
        mysqli_close($conectar);
        ?>
    </div>
</body>
</html>
