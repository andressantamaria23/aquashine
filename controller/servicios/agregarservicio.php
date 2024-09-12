<?php
require "../../config/conexion.php";

$nom_servicio = $_POST['nom_servicio'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$FK_tipoVehiculo = $_POST['FK_tipoVehiculo'];

$insert = "INSERT INTO servicios(nom_servicio,descripcion,precio,FK_tipoVehiculo) 
VALUES('$nom_servicio','$descripcion','$precio','$FK_tipoVehiculo')";
  
$query = mysqli_query($conectar,$insert);

if($query){
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
                         text: 'Se agrego reserva correctamente.',
                         icon: 'success'
                     }).then(function() {
                         window.location = '../../views/servicios/empleyoee/viewServicesE.php'; // Redirige después de cerrar el Swal
                     });
                 </script>
             </body>
             </html>";

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/servicios/user/agendarservicio.php");
    </script>';
}

?>