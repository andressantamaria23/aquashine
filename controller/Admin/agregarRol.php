<?php
require "../../config/conexion.php";

$nom_rol = $_POST['nom_rol'];
$descripcion = $_POST['descripcion'];

$insert = "INSERT INTO rol(nom_rol,descripcion) 
VALUES('$nom_rol','$descripcion')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Rol Registrado");
    location.assign("../../views/admin/roles/indexR.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/admin/roles/agregarRol.php");
    </script>';
}

?>