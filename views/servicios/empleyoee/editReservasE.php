
<?php
include("../../../config/conexion.php");
$sql = "SELECT idServicios, nom_servicio FROM servicios";
    $result = mysqli_query($conectar, $sql);
// Comprobar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Obtener los datos enviados por POST
    $idReservas = $_POST['idReservas'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $estado = $_POST['estado'];
    $FK_usuario = $_POST['FK_usuario'];
    $FK_servicios = $_POST['FK_servicios'];
    


    $sql = "UPDATE reservas SET 
                fecha_reserva = '$fecha_reserva',
                hora_reserva = '$hora_reserva',
                estado = '$estado',
                FK_usuario = '$FK_usuario',
                FK_servicios = '$FK_servicios'
            WHERE idReservas = '$idReservas'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $sql);

    // Verificar si la actualización fue exitosa
    if ($resultado) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("viewReservas.php");</script>';
    } else {
        echo '<script>alert("Error al actualizar los datos");
        location.assign("editReservas.php?idReservas='.$idReservas.'");</script>';
    }

    
    mysqli_close($conectar);

} else {
    // Comprobar si se ha pasado un ID de usuario por GET
    if (isset($_GET['idReservas'])) {
        $idReservas = $_GET['idReservas'];

        // Consulta para obtener los datos del usuario
        $sql = "SELECT * FROM reservas WHERE idReservas ='$idReservas'";
        $resultado = mysqli_query($conectar, $sql);

        // Verificar si el usuario existe
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            // Obtener los datos del usuario
            $fila = mysqli_fetch_assoc($resultado);
                $fecha_reserva = $fila['fecha_reserva'];
                $hora_reserva = $fila['hora_reserva'];
                $estado = $fila['estado'];
                $FK_usuario = $fila['FK_usuario'];
                $FK_servicios = $fila['FK_servicios'];
             
        } else {
            echo '<script>alert("reserva no encontrada"); location.assign("viewservices.php");</script>';
            exit();
        }

        // Cerrar la conexión
        mysqli_close($conectar);
    } else {
        echo '<script>alert("ID de usuario no proporcionado"); location.assign("viewservices.php");</script>';
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
            <h1 class="text-2xl font-semibold text-center mb-4 text-blue-600">Editar Reserva</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="">
                <input type="hidden" name="idReservas" value="<?php echo htmlspecialchars($idReservas); ?>" redondly>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_reserva">Fecha reserva</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="date" id="fecha_reserva" name="fecha_reserva" value="<?php echo $fecha_reserva;?>" readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hora_reserva">Hora reserva</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="time" id="hora_reserva" name="hora_reserva" value="<?php echo $hora_reserva;?>" readonly>
                </div>

                <div class="mb-4 ">
                    <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                    <select id="estado" name="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Pendiente" <?php echo ($estado == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="Completado" <?php echo ($estado == 'Completado') ? 'selected' : ''; ?>>Completado</option>
                        <option value="En Proceso" <?php echo ($estado == 'En proceso') ? 'selected' : ''; ?>>En proceso</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="servicio"> Servicio</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                           type="text" id="FK_servicios" name="FK_servicios" value="<?php echo $FK_servicios;?>" readonly>
                </div>
                
                <input type="hidden" name="FK_usuario" value="<?php echo $FK_usuario; ?>" />

                <div class="col-span-2">
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="enviar">
                        Guardar Cambios
                    </button>
                    <a href="viewReservas.php" class="text-blue-500 hover:text-blue-700 font-semibold text-sm transition duration-200">
                        Cancelar
                    </a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
