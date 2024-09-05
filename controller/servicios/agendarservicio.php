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

    echo '<script>alert("AGENDA RESERVADA");
    location.assign("../../views/servicios/user/viewservicesU.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/servicios/user/agendarservicio.php");
    </script>';
}

?>