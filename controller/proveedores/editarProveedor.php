<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../config/conexion.php"; // Ajusta esta ruta según la ubicación de tu archivo de conexión

if (isset($_GET['id'])) {
    $idProveedores = $_GET['id'];

    // Obtener los datos actuales del proveedor
    $sql = "SELECT * FROM proveedores WHERE idProveedores = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $idProveedores);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $proveedor = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: No se pudo preparar la consulta: " . mysqli_error($conn);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos del formulario
        $Nombre = $_POST['Nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        // Crear la consulta SQL para actualizar el proveedor
        $sql = "UPDATE proveedores SET Nombre = ?, email = ?, telefono = ? WHERE idProveedores = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssi", $Nombre, $email, $telefono, $idProveedores);
            if (mysqli_stmt_execute($stmt)) {
                // Redirigir a la página de proveedores con un mensaje de éxito
                header("Location: proveedores.php?msg=Proveedor actualizado correctamente");
                exit();
            } else {
                echo "Error: No se pudo ejecutar la consulta: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: No se pudo preparar la consulta: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    echo "Error: ID de proveedor no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
            <h1 class="text-3xl font-semibold text-center mb-6 text-blue-600">Editar Proveedor</h1>
            <form action="editarProveedor.php?id=<?php echo $idProveedores; ?>" method="POST">
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="idProveedores">
                        Identificador de Proveedor
                    </label>
                    <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200 cursor-not-allowed" type="text" id="idProveedores" value="<?php echo htmlspecialchars($proveedor['idProveedores']); ?>">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                        Nombre
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="nombre" name="Nombre" value="<?php echo htmlspecialchars($proveedor['Nombre']); ?>" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" name="email" value="<?php echo htmlspecialchars($proveedor['email']); ?>" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="telefono">
                        Teléfono
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($proveedor['telefono']); ?>" required>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline transition duration-200" type="submit">
                        Guardar Cambios
                    </button>
                    <a href="proveedores.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
