<?php
require "../../config/conexion.php";

$nom_usuario = $_POST['nom_usuario'];
$apel_usuario = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$FK_rol = $_POST['FK_rol'];

$insert = "INSERT INTO usuario(nom_usuario,apel_usuario,fecha_nacimiento,email,contrasena,FK_rol) 
VALUES('$nom_usuario','$apel_usuario','$fecha_nacimiento','$email','$contrasena','$FK_rol')";
  
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
                     text: 'Se agrego usuario correctamente.',
                     icon: 'success'
                 }).then(function() {
                     window.location = '../../login.php'; // Redirige después de cerrar el Swal
                 });
             </script>
         </body>
         </html>";

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("register.html");
    </script>';
}

?>