<?php
require "../../config/conexion.php";

// Obtener datos del formulario
$nom_usuario = $_POST['nom_usuario'];
$apel_usuario = $_POST['apel_usuario'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];
$FK_rol = $_POST['FK_rol'];

// Validar datos (puedes agregar más validaciones según sea necesario)
if (empty($nom_usuario) || empty($apel_usuario) || empty($fecha_nacimiento) || empty($email) || empty($contraseña) || empty($FK_rol)) {
    echo '<script>alert("Por favor, complete todos los campos.");
    location.assign("register.html");
    </script>';
    exit();
}

// Preparar la consulta SQL para evitar inyecciones SQL
$sql = "INSERT INTO usuario (nom_usuario, apel_usuario, fecha_nacimiento, email, contraseña, FK_rol) VALUES (?, ?, ?, ?, ?, ?)";

if ($stmt = mysqli_prepare($conectar, $sql)) {
    // Encriptar la contraseña antes de almacenarla (opcional pero recomendado)
    $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);

    // Asociar parámetros y ejecutar la consulta
    mysqli_stmt_bind_param($stmt, "sssssi", $nom_usuario, $apel_usuario, $fecha_nacimiento, $email, $contraseña, $FK_rol);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Usuario Registrado");
        location.assign("../../Index.php");
        </script>';
    } else {
        echo '<script>alert("Error al registrar el usuario: ' . mysqli_error($conectar) . '");
        location.assign("register.html");
        </script>';
    }

    mysqli_stmt_close($stmt);
} else {
    echo '<script>alert("Error al preparar la consulta: ' . mysqli_error($conectar) . '");
    location.assign("register.html");
    </script>';
}

mysqli_close($conectar);
?>
