<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

if (isset($_GET['id'])) {
    $idProductos = $_GET['id'];

    // Obtener los datos actuales del producto
    $sql = "SELECT * FROM productos WHERE idProductos = ?";
    if ($stmt = mysqli_prepare($conectar, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $idProductos);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $producto = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: No se pudo preparar la consulta: " . mysqli_error($conectar);
    }

    // Obtener la lista de proveedores
    $sqlProveedores = "SELECT idProveedores, Nombre FROM proveedores";
    $resultProveedores = mysqli_query($conectar, $sqlProveedores);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $nom_producto = $_POST['nom_producto'];
        $prod_descrp = $_POST['prod_descrp'];
        $precio = $_POST['precio'];
        $categoria_prod_idcat = $_POST['categoria_prod_idcat'];
        $FK_proveedores = $_POST['FK_proveedores'];

        // Crear la consulta SQL para actualizar el producto
        $sql = "UPDATE productos SET nom_producto = ?, prod_descrp = ?, precio = ?, categoria_prod_idcat = ?, FK_proveedores = ? WHERE idProductos = ?";
        if ($stmt = mysqli_prepare($conectar, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssii", $nom_producto, $prod_descrp, $precio, $categoria_prod_idcat, $FK_proveedores, $idProductos);
            if (mysqli_stmt_execute($stmt)) {
                // Redirigir a la página de productos con un mensaje de éxito
                header("Location: producto.php?msg=Producto actualizado correctamente");
                exit();
            } else {
                echo "Error: No se pudo ejecutar la consulta: " . mysqli_error($conectar);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: No se pudo preparar la consulta: " . mysqli_error($conectar);
        }
    }

    mysqli_close($conectar);
} else {
    echo "Error: ID de producto no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Producto</h1>
            <form action="editarProducto.php?id=<?php echo $producto['idProductos']; ?>" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="idProductos">
                        Identificador de Producto
                    </label>
                    <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200 cursor-not-allowed" type="text" id="idProductos" value="<?php echo htmlspecialchars($producto['idProductos']); ?>">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_producto">
                        Nombre del Producto
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="nom_producto" name="nom_producto" value="<?php echo htmlspecialchars($producto['nom_producto']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="prod_descrip">
                        Descripción del Producto
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="prod_descrp" name="prod_descrp" value="<?php echo htmlspecialchars($producto['prod_descrp']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                        Precio
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria_prod_idcat">
                        Categoría del Producto
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="categoria_prod_idcat" name="categoria_prod_idcat" value="<?php echo htmlspecialchars($producto['categoria_prod_idcat']); ?>" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_proveedores">
                        Proveedor
                    </label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="FK_proveedores" name="FK_proveedores" required>
                        <?php while ($proveedor = mysqli_fetch_assoc($resultProveedores)): ?>
                            <option value="<?php echo $proveedor['idProveedores']; ?>" <?php if ($producto['FK_proveedores'] == $proveedor['idProveedores']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($proveedor['Nombre']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200" type="submit">
    Guardar Cambios
</button>

                    <a href="producto.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
