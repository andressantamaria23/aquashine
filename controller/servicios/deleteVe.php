<?php
$idVehiculo = $_GET['idVehiculo'];
include("../../config/conexion.php");

$sql = "DELETE FROM vehiculo WHERE idVehiculo='$idVehiculo'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("../../views/servicios/viewCar.php");
    </script>';
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("../../views/servicios/agregarCar.php");
    </script>';
}

mysqli_close($conectar);
?>
