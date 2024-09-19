<?php
require "../../config/conexion.php";

$Placa = $_POST['Placa'];
$FK_tipoVehiculo = $_POST['FK_tipoVehiculo'];
$color_vehiculo = $_POST['color_vehiculo'];
$marca = $_POST['marca'];
$FK_usuario = $_POST['FK_usuario'];

$insert = "INSERT INTO vehiculo(Placa,FK_tipoVehiculo,color_vehiculo,marca,FK_usuario) 
VALUES('$Placa','$FK_tipoVehiculo','$color_vehiculo','$marca','$FK_usuario')";
  
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
                text: 'La información se actualizo correctamente.',
                icon: 'success'
            }).then(function() {
                window.location = '../../views/servicios/user/viewCar.php'; // Redirige después de cerrar el Swal
            });
        </script>
    </body>
    </html>";

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/servicios/agregarCar.php");
    </script>';
}

?>