<?php
require "conexion.php";

$email = $_POST['email'];
$contraseña = $_POST['contraseña']; // Ensure the variable name is consistent
session_start();
$_SESSION['email'] = $email; 

// Consulta para validar el usuario
$consulta = "SELECT * FROM usuario 
INNER JOIN rol on rol.idRol = usuario.FK_rol
WHERE email = '$email' AND contrasena = '$contraseña'"; // Use the correct variable name
$resultado = mysqli_query($conn, $consulta);

// Obtener los datos del usuario
$filas = mysqli_fetch_assoc($resultado);

if ($filas) {
    // Verificar el rol del usuario
    if ($filas['FK_rol'] == 1) { // Admin
        header("location:../views/admin/roles/indexR.php");
    } elseif ($filas['FK_rol'] == 2) { // User
        header("location:../views/ventas/ventas.php");
    } elseif ($filas['FK_rol'] == 3) { // Servicio
        header("location:../views/servicios/empleoye/indexServicesE.php");
    }elseif ($filas['FK_rol'] == 4) { // Vendedor
        header("location:../controller/Trabajador/vistaTrabajador.php");
        exit();
    }
    else {
        echo '<h1 class="bad">Datos incorrectos</h1>';
    }
} else {
    echo '<h1 class="bad">Datos incorrectos</h1>';
}

mysqli_free_result($resultado);
mysqli_close($conn);
?>
