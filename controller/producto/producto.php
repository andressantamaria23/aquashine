<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Productos</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('../img/fondo.jpg'); /* Ruta a la imagen de fondo */
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

        .section-title {
            background: linear-gradient(to right, #1e3a8a, #6ee7b7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2.5rem; /* Adjust as needed */
            font-weight: 800; /* Bold font weight */
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
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
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="../inventario/inventario.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Inventario</a>
              <a href="proveedores.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Proveedores</a>
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
  
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>
  
            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <a href="../../perfilUsuario.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Mi perfil</a>
              <a href="../../login.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar sesión</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <h1 class="section-title">
        Listado de productos
    </h1>
  <div class="container">
    <div class="flex justify-between items-center mb-4">
        <a href="añadirProducto.php" class="btn green">+ Añadir Producto</a>
        <a href="../../fpdf/reporteProducto.php" target="_blank" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <i class="far fa-file-pdf mr-2"></i>Generar Reportes
        </a>
    </div>


    <table id="myTable" class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>

        </tr>
    </thead>
    <tbody>
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

// Consulta SQL para obtener productos
$sql = "SELECT idProductos, nom_producto, prod_descrp, categoria_prod_idcat, precio, img_producto, FK_proveedores FROM productos";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Mostrar imagen si está disponible
        $img_src = !empty($row['img_producto']) ? $row['img_producto'] : 'path/to/default-image.jpg'; // Asegúrate de tener una imagen por defecto
        $img_producto = "<img src='{$img_src}' alt='Imagen de producto' style='width: 50px; height: auto;'>";

        echo "<tr>
            <td class='px-6 py-4'>{$row['nom_producto']}</td>
            <td class='px-6 py-4'>{$row['prod_descrp']}</td>
            <td class='px-6 py-4'>{$row['categoria_prod_idcat']}</td>
            <td class='px-6 py-4'>{$row['precio']}</td>

            <td class='px-6 py-4 text-gray-500'>
                <i class='fas fa-edit cursor-pointer text-blue-500 hover:text-blue-700' onclick=\"window.location.href='editarProducto.php?id={$row['idProductos']}'\" title='Editar'></i>
                <i class='fas fa-trash cursor-pointer text-red-500 hover:text-red-700' onclick=\"if(confirm('¿Estás seguro de que quieres eliminar este producto?')) window.location.href='eliminarProducto.php?id={$row['idProductos']}'\" title='Eliminar'></i>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7' class='px-6 py-4 text-center'>No hay productos registrados.</td></tr>";
}

// Cerrar la conexión
mysqli_close($conn);
?>

    </tbody>
</table>

<!-- Include this script at the end of your HTML file, just before the closing </body> tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.querySelector('[role="menu"]');
        
        userMenuButton.addEventListener('click', function () {
            // Toggle the 'hidden' class to show/hide the dropdown
            userMenu.classList.toggle('hidden');
        });

        // Optional: Close the dropdown if clicked outside
        document.addEventListener('click', function (event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });

        // Initialize DataTable
        $('#myTable').DataTable({
            responsive: true,
            paging: true,
            searching: true,
            ordering: true,
            info: true,
            language: {
                search: "Buscar:",
                paginate: {
                    next: "Siguiente",
                    previous: "Anterior"
                },
                emptyTable: "No hay datos disponibles en la tabla",
                info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                lengthMenu: "Mostrar _MENU_ entradas"
            }
        });
    });
</script>

</body>
</html>
