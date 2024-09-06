<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Inventario</title>
    <style>
        /* Estilos personalizados */
        .swiper-button-next,
        .swiper-button-prev {
            color: rgb(245, 0, 0);
            top: 50%;
            transform: translateY(-20%);
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 90%;
            margin: auto;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }
        .green {
            background-color: #4CAF50;
            color: white;
        }
        .blue {
            background-color: #2196F3;
            color: white;
        }
        .red {
            background-color: #f44336;
            color: white;
        }
        .search {
            float: right;
            padding: 8px;
            margin: 5px;
            width: 20%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            padding: 10px;
            text-align: right;
        }
        .actions i {
            margin: 0 5px;
            cursor: pointer;
            color: #1e40af;
        }
        .actions i:hover {
            color: #1e3a8a;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
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
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>
                        <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="../perfilUsuario.html" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mi perfil</a>
                            <a href="../login.html" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<br>
    <div class="container">
        <a href="añadirInventario.php" class="btn green">+ Añadir al inventario</a>
        <a href="visualizarInventario.php" class="btn blue">Visualizar inventario</a>

        <input type="text" placeholder="Buscar..." class="search">

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Inventario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proveedor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                // Conexión a la base de datos
                $conn = new mysqli('localhost', 'root', '', 'aquashine');

                // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Obtener los datos del inventario
                $sql = "SELECT i.idInventario, i.cantidad, p.nom_producto, s.Nombre 
                        FROM inventario i 
                        JOIN productos p ON i.FK_producto = p.idProductos
                        JOIN proveedores s ON p.FK_proveedores = s.idProveedores";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['idInventario']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['cantidad']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['nom_producto']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap'>" . htmlspecialchars($row['Nombre']) . "</td>";
                        echo "<td class='px-6 py-4 whitespace-nowrap actions'>";
                        echo "<a href='editarInventario.php?id=" . htmlspecialchars($row['idInventario']) . "'><i class='fas fa-edit'></i></a>";
                        echo "<a href='eliminarInventario.php?id=" . htmlspecialchars($row['idInventario']) . "'><i class='fas fa-trash'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='px-6 py-4 text-center text-gray-500'>No se encontraron datos.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; 2024 AquaShine. Todos los derechos reservados.</p>
        </div>
    </div>
    <!-- Agrega el script de FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
