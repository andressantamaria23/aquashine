<?php
require "conexion.php";

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
session_start();
$_SESSION['email'] = $email; 

// Consulta para obtener al usuario sin filtrar por estado
$consulta = "SELECT * FROM usuario 
INNER JOIN rol on rol.idRol = usuario.FK_rol
WHERE email = '$email' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conectar, $consulta);

// Obtener los datos del usuario
$filas = mysqli_fetch_assoc($resultado);

if ($filas) {
    // Verificar si el usuario está activo
    if ($filas['estado'] == 1) { // Si el estado es diferente de 1 (activo)
        echo '<script>alert("El usuario no está activo.");
        location.assign("../login.php");
        </script>';
    } else {
        // Verificar el rol del usuario
        if ($filas['FK_rol'] == 1) { // Admin
            header("location:../views/admin/roles/indexR.php");
        } elseif ($filas['FK_rol'] == 2) { // User
            header("location:../views/servicios/user/index.php");
        } elseif ($filas['FK_rol'] == 3) { // Servicio
            header("location:../views/servicios/empleyoee/indexServicesE.php");
        } elseif ($filas['FK_rol'] == 4) { // Vendedor
            header("location:../views/servicios/user/perfil.php");
        } else {
            echo '<script>alert("Usuario no encontrado.");
            location.assign("../login.php");
            </script>';
        }
    }
} else {
    echo '<script>alert("DATOS INCORRECTOS");
    location.assign("../login.php");
    </script>';
}

mysqli_free_result($resultado);
mysqli_close($conectar);
?>
