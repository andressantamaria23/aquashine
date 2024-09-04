<?php
require "../../config/conexion.php";

$Placa = $_POST['Placa'];
$tipo_vehiculo = $_POST['tipo_vehiculo'];
$color_vehiculo = $_POST['color_vehiculo'];
$marca = $_POST['marca'];
$FK_usuario = $_POST['FK_usuario'];

$insert = "INSERT INTO vehiculo(Placa,tipo_vehiculo,color_vehiculo,marca,FK_usuario) 
VALUES('$Placa','$tipo_vehiculo','$color_vehiculo','$marca','$FK_usuario')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Usuario Registrado");
    location.assign("../../views/servicios/viewCar.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/servicios/agregarCar.php");
    </script>';
}

?>