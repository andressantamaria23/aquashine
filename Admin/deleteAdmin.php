<?php
$idUsuario = $_GET['idUsuario'];
include("../conexion.php");

$sql = "DELETE FROM usuario WHERE idUsuario='$idUsuario'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("indexAdmin.php");
    </script>';
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("indexAdmin.php");
    </script>';
}

mysqli_close($conectar);
?>
