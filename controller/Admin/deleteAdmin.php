<?php
$idUsuario = $_GET['idUsuario'];
include("../../config/conexion.php");

$sql = "DELETE FROM usuario WHERE idUsuario='$idUsuario'";
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
                     text: 'Se elimino el usuario correctamente.',
                     icon: 'error'
                 }).then(function() {
                     window.location = '../../views/Admin/user/indexAdmin.php'; // Redirige después de cerrar el Swal
                 });
             </script>
         </body>
         </html>";
} else {
    echo '<script>alert("Error al eliminar los datos");
    location.assign("indexAdmin.php");
    </script>';
}

mysqli_close($conectar);
?>
