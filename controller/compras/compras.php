<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <title>Compras</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('../img/fondo.jpg'); 
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .container {
            width: 90%;
            margin: auto;
            padding-top: 20px;
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
        .search {
            padding: 8px;
            margin: 5px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .copy-btn {
            background-color: #1D4ED8;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 4px 8px;
            cursor: pointer;
        }
        .copy-btn:hover {
            background-color: #2563EB;
        }
        .actions i {
            cursor: pointer;
            margin: 0 5px;
            color: #333;
        }
        .actions i:hover {
            color: #007bff;
        }
        .footer {
            padding: 10px;
            text-align: right;
        }
    </style>
</head>
<body>
    <!--BARRA DE NAVEGACIÓN-->
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
<<<<<<< HEAD
                        <img class="h-8 w-auto" src="../../static/img/aquashine.png" alt="Your Company">
=======
                        <img class="h-8 w-auto" src="../img/aquashine.png" alt="Your Company">
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="../producto/producto.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Producto</a>
                            <a href="../inventario/inventario.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Inventario</a>
                            <a href="../proveedores/proveedores.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Proveedores</a>
                            <a href="compras.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">Compras</a>
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
                            <a href="../perfilUsuario.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mi perfil</a>
                            <a href="../login.html" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="añadirCompras.php" class="btn green">Agregar Nueva Compra</a>
        <input type="text" placeholder="Buscar..." class="search">
        
        <table>
            <thead>
                <tr>
                    <th>ID Compra</th>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
<<<<<<< HEAD
=======
                    <th>Estado</th>
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

<<<<<<< HEAD
require "../../config/conexion.php"; // Aquí se abre la conexión
=======
require "../conexion.php"; // Aquí se abre la conexión
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7

// Verificar que la conexión está abierta
if (!$conectar) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Ejecutar la consulta solo si la conexión está abierta
$sql = "SELECT * FROM compras";
$result = $conectar->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td class='px-6 py-4'>{$row['idCompras']}</td>
                <td class='px-6 py-4'>{$row['fechaCompra']}</td>
                <td class='px-6 py-4'>{$row['cantidad']}</td>
                <td class='px-6 py-4'>{$row['precioUnitario']}</td>
                <td class='px-6 py-4'>{$row['precioTotal']}</td>
<<<<<<< HEAD
=======
                <td class='px-6 py-4'>{$row['estado']}</td>
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
                <td class='px-6 py-4'>{$row['observaciones']}</td>
                <td class='px-6 py-4 actions'>
                    <i class='fas fa-edit' onclick=\"window.location.href='editarCompras.php?id={$row['idCompras']}'\" title='Editar'></i>
                    <i class='fas fa-trash' onclick=\"if(confirm('¿Estás seguro de que quieres eliminar esta compra?')) window.location.href='eliminarCompras.php?id={$row['idCompras']}'\" title='Eliminar'></i>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='px-6 py-4 text-center'>No hay compras registradas.</td></tr>";
    }
    $result->free(); // Liberar el resultado
} else {
    echo "Error en la consulta: " . $conectar->error;
}

// Cerrar la conexión solo después de usarla
$conectar->close();
?>


            </tbody>
        </table>
    </div>
</body>
</html>