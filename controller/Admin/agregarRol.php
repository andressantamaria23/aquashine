<?php
require "../../config/conexion.php";

$nom_rol = $_POST['nom_rol'];
$descripcion = $_POST['descripcion'];

$insert = "INSERT INTO rol(nom_rol,descripcion) 
VALUES('$nom_rol','$descripcion')";
  
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
                window.location = '../../views/Admin/roles/indexR.php'; // Redirige después de cerrar el Swal
            });
        </script>
    </body>
    </html>";

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/admin/roles/agregarRol.php");
    </script>';
}

?>