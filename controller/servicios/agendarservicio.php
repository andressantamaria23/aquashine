<?php
require "../../config/conexion.php";

$fecha_reserva = $_POST['fecha_reserva'];
$hora_reserva = $_POST['hora_reserva'];
$estado = $_POST['estado'];
$FK_usuario = $_POST['FK_usuario'];
$FK_servicios = $_POST['FK_servicios'];

$insert = "INSERT INTO reservas(fecha_reserva,hora_reserva,estado,FK_usuario,FK_servicios) 
VALUES('$fecha_reserva','$hora_reserva','$estado','$FK_usuario','$FK_servicios')";
  
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
                         window.location = '../../views/servicios/user/viewservicesU.php'; // Redirige después de cerrar el Swal
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