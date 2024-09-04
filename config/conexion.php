<?php

$host = 'localhost';
$user = 'root';
$clave = ''; // Contraseña vacía si no estás usando una
$bd = 'AquaShine';
$puerto = '3306';

// Conectar a la base de datos
$conectar = mysqli_connect($host, $user, $clave, $bd, $puerto);

// Verificar la conexión
if (!$conectar) {
    die("Error de conexión: " . mysqli_connect_error());
}

// La conexión se deja abierta para su uso posterior
?>
