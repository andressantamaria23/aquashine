<?php
$idrol = $_GET['idRol'];
include("../../config/conexion.php");

$sql = "DELETE FROM rol WHERE idrol='$idrol'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    header("Content-Type: text/html; charset=UTF-8");

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
                     text: 'Se elimino el rol correctamente.',
                     icon: 'error'
                 }).then(function() {
                     window.location = '../../views/Admin/roles/indexR.php'; // Redirige después de cerrar el Swal
                 });
             </script>
         </body>
         </html>";
        exit();
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("../../views/admin/roles/indexR.php");
    </script>';
}

mysqli_close($conectar);
?>
