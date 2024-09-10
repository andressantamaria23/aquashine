<?php
require "conexion.php";

$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['email']= $email; 
// Consulta para validar el usuario
$consulta = "SELECT * FROM usuario 
INNER JOIN rol on rol.idRol = usuario.FK_rol
WHERE email = '$email' AND contraseña = '$contraseña'";
$resultado = mysqli_query($conectar, $consulta);

// Obtener los datos del usuario
$filas = mysqli_fetch_assoc($resultado);

if ($filas) {
    // Verificar el rol del usuario
    if ($filas['FK_rol'] == 1) { // Admin
        header("location:../views/admin/roles/indexR.php");
    } elseif ($filas['FK_rol'] == 2) { // User
        header("location:../views/servicios/user/index.php");
    } elseif ($filas['FK_rol'] == 3) { // Servicio
        header("location:../views/servicios/empleyoee/indexServicesE.php");
    } elseif ($filas['FK_rol'] == 4) { // Vendedor
        header("location:../controller/trabajador/vistaTrabajador.html");
    } else {
        echo '<script>alert("usuario no encontrado");
    location.assign("../login.php");
    </script>';
    }
} else {
    echo '<script>alert("DATOS INCORRECTOS");
    location.assign("../login.php");
    </script>';
}

mysqli_free_result($resultado);
mysqli_close($conectar);
?>
