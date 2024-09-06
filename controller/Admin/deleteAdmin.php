<<<<<<< HEAD
<?php
$idUsuario = $_GET['idUsuario'];
include("../../config/conexion.php");

$sql = "DELETE FROM usuario WHERE idUsuario='$idUsuario'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("../../views/admin/user/indexAdmin.php");
    </script>';
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("indexAdmin.php");
    </script>';
}

mysqli_close($conectar);
?>
=======
<?php
$idUsuario = $_GET['idUsuario'];
include("../../config/conexion.php");

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
>>>>>>> 6e099628165d0e450fcdf0efb01c7406c331ccb7
