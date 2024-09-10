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

    echo '<script>alert("Usuario Registrado");
    location.assign("../../views/admin/user/indexAdmin.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/admin/user/a.php");
    </script>';
}

<?php
require "../../config/conexion.php";

$nom_usuario = $_POST['nom_usuario'];
$apel_usuario = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$FK_rol = $_POST['FK_rol'];

$insert = "INSERT INTO usuario(nom_usuario,apel_usuario,fecha_nacimiento,email,contraseña,FK_rol) 
VALUES('$nom_usuario','$apel_usuario','$fecha_nacimiento','$email','$contraseña','$FK_rol')";
  
$query = mysqli_query($conectar,$insert);

if($query){

    echo '<script>alert("Usuario Registrado");
    location.assign("../../views/admin/user/indexAdmin.php");
    </script>';

}else{
    echo '<script>alert("Error al conectarse a la BD");
    location.assign("../../views/admin/user/a.php");
    </script>';
}

?>