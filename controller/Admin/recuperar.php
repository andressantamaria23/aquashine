<?php
require "../../config/conexion.php";
require "../../clienteFunciones.php";


// Capturar el idUsuario y token desde GET o POST
$idUsuario = $_GET['idUsuario'] ?? $_POST['idUsuario'] ?? '';
$token = $_GET['confirmacion_contrasena'] ?? $_POST['token'] ?? '';
$errors = [];

if (empty($idUsuario) || empty($token)) {
    echo "ID de usuario o token no válido.";
    header('Location: ../../index.php');
    exit;
}

// Verificar si el token es válido
if (!verificarToken($idUsuario, $token, $conectar)) {
    echo "No se pudo verificar la información.";
    exit;
}

// Validar que se ha enviado una contraseña
if (isset($_POST['contrasena'])) {
    $contrasena = $_POST['contrasena'];

    if (empty($contrasena)) {
        echo '<script>alert("La contraseña no puede estar vacía"); location.assign("olvidoContraseña.php");</script>';
        exit();
    }

    // Llamar a la función actualizaPassword que está en clienteFunciones.php
    if (actualizaPassword($idUsuario, $contrasena, $conectar)) {
        echo '<script>alert("Se actualizaron los datos correctamente");
        location.assign("../../login.php");</script>';
    } else {
        // Si la consulta falla, mostrar el error
        echo '<script>alert("Error al actualizar los datos");
        location.assign("recuperar.php?idUsuario='.$idUsuario.'&confirmacion_contrasena='.$token.'");</script>';
    }

} else {
    echo '<script>alert("No se recibió ninguna contraseña"); location.assign("../../index.php");</script>';
    exit();
}
?>
