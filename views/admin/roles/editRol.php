<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Rol</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<?php
include("../../../config/conexion.php");

// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idRol = $_POST['idRol'];
    $nom_rol = $_POST['nom_rol'];
    $descripcion = $_POST['descripcion'];

    // Consulta para actualizar los datos del usuario
    $sql = "UPDATE rol SET 
                nom_rol = '$nom_rol',
                descripcion = '$descripcion'
            WHERE idRol = '$idRol'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("indexR.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editarRol.php?idRol='.$idRol.'");</script>';
    }

    // Cerrar la conexión
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idRol'])) {
        $idRol = $_GET['idRol'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM rol WHERE idRol='$idRol'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
            $nom_rol = $fila['nom_rol'];
            $descripcion = $fila['descripcion'];
        } else {
            echo '<script>alert("Usuario no encontrado"); location.assign("#");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de rol no proporcionado"); location.assign("indexR.php");</script>';
        exit();
    }
}
?>
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Rol</h1>
            <form action="editRol.php?idRol=<?php echo $fila['idRol']; ?>" method="POST">
                <input type="hidden" name="idRol" value="<?php echo htmlspecialchars($fila['idRol']); ?>">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_rol">Nombre del Rol</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           type="text" id="nom_rol" name="nom_rol" value="<?php echo $idRol;?>" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripción</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="descripcion" name="descripcion" rows="4" required><?php echo htmlspecialchars($fila['descripcion']); ?></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Guardar Cambios
                    </button>
                    <a href="indexR.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
