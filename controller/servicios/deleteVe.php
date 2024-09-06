<<<<<<< HEAD
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
=======
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
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
