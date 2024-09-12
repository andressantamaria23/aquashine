
<?php
include("../../../config/conexion.php");
$sql = "SELECT idTipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo";
    $result = mysqli_query($conectar, $sql);
// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idServicios = $_POST['idServicios'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $nom_servicio = $_POST['nom_servicio'];
    $FK_tipoVehiculo = $_POST['FK_tipoVehiculo'];


    $sql = "UPDATE servicios SET 
                nom_servicio = '$nom_servicio',
                descripcion = '$descripcion',
                precio = '$precio',
                FK_tipoVehiculo = '$FK_tipoVehiculo'
            WHERE idServicios = '$idServicios'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("viewservicesE.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editServicio.php?idServicios='.$idServicios.'");</script>';
    }

    
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idServicios'])) {
        $idServicios = $_GET['idServicios'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM servicios WHERE idServicios ='$idServicios'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
                $nom_servicio = $fila['nom_servicio'];
                $descripcion = $fila['descripcion'];
                $precio = $fila['precio'];
                $FK_tipoVehiculo = $fila['FK_tipoVehiculo'];
            
             
        } else {
            echo '<script>alert("servicio no encontrada"); location.assign("viewServicesE.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de servicio no proporcionado"); location.assign("viewServicesE.php");</script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-12">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md mx-auto">
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Servicio</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="grid grid-cols-2 gap-x-6 gap-y-4">
                <input type="hidden" name="idServicios" value="<?php echo htmlspecialchars($idServicios); ?>">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nom_servicio">Servicio</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="nom_servicio" name="nom_servicio" value="<?php echo $nom_servicio;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">Descripcion</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">Precio</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="number" id="precio" name="precio" value="<?php echo $precio;?>" >
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="FK_tipoVehiculo">Tipo de Vehiculo</label>
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            id="FK_tipoVehiculo" name="FK_tipoVehiculo" required>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['idTipo_vehiculo']; ?>">
                                <?php echo htmlspecialchars($row['tipo_vehiculo']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Guardar Cambios
                    </button>
                    <a href="viewservicesE.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
