<?php
$idServicios = $_GET['idServicios'];
include("../../config/conexion.php");

$sql = "DELETE FROM servicios WHERE idServicios ='$idServicios'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Cambio Exitoso</title>
        <link rel='shortcut icon' href='../../static/img/aquashine.php' type='image/x-icon'>
        <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css' rel='stylesheet'>
    </head>
    <body>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js'></script>
        <script>
            Swal.fire({
                title: '¡Excelente!',
                text: 'Se elimino el servicio correctamente.',
                icon: 'error'
            }).then(function() {
                window.location = '../../views/servicios/empleyoee/viewservicesE.php'; // Redirige después de cerrar el Swal
            });
        </script>
    </body>
    </html>";
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("../../views/servicios/employee/viewservicesE.php");
    </script>';
}

mysqli_close($conectar);
?>
