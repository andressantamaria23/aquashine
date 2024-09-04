<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

// Obtener la lista de productos
$sqlProductos = "SELECT idProductos, nom_producto FROM productos";
$resultProductos = mysqli_query($conectar, $sqlProductos);

// Obtener la lista de proveedores
$sqlProveedores = "SELECT idProveedores, nombre FROM proveedores";
$resultProveedores = mysqli_query($conectar, $sqlProveedores);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $cantidad = $_POST['cantidad'];
    $FK_producto = $_POST['FK_producto'];
    $FK_proveedores = $_POST['FK_proveedores'];

    // Verificar los datos del formulario
    if (empty($cantidad) || empty($FK_producto) || empty($FK_proveedores)) {
        echo "Error: Todos los campos son obligatorios.";
        exit();
    }

    // Crear la consulta SQL para añadir al inventario
    $sql = "INSERT INTO inventario (cantidad, FK_producto, FK_proveedores) VALUES (?, ?, ?)";
    if ($stmt = mysqli_prepare($conectar, $sql)) {
        mysqli_stmt_bind_param($stmt, "iii", $cantidad, $FK_producto, $FK_proveedores);
        if (mysqli_stmt_execute($stmt)) {
            // Redirigir a la página de inventario con un mensaje de éxito
            header("Location: inventario.php?msg=Inventario añadido correctamente");
            exit();
        } else {
            echo "Error: No se pudo ejecutar la consulta: " . mysqli_error($conectar);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: No se pudo preparar la consulta: " . mysqli_error($conectar);
    }

    mysqli_close($conectar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Añadir Inventario</h1>
            <form action="añadirInventario.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cantidad">Cantidad</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           type="number" id="cantidad" name="cantidad" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_producto">Producto</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="FK_producto" name="FK_producto" required>
                        <?php while ($row = mysqli_fetch_assoc($resultProductos)) { ?>
                            <option value="<?php echo $row['idProductos']; ?>">
                                <?php echo htmlspecialchars($row['nom_producto']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_proveedores">Proveedor</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="FK_proveedores" name="FK_proveedores" required>
                        <?php while ($row = mysqli_fetch_assoc($resultProveedores)) { ?>
                            <option value="<?php echo $row['idProveedores']; ?>">
                                <?php echo htmlspecialchars($row['nombre']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Añadir Inventario
                    </button>
                    <a href="inventario.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
