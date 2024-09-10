<?php
$idrol = $_GET['idRol'];
include("../../config/conexion.php");

$sql = "DELETE FROM rol WHERE idrol='$idrol'";
$resultado = mysqli_query($conn, $sql);

if ($resultado) {
    echo '<script>alert("Se eliminaron los datos correctamente");
    location.assign("../../views/admin/roles/indexR.php");
    </script>';
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("../../views/admin/roles/indexR.php");
    </script>';
}

mysqli_close($conn);
?>
