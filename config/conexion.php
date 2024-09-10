<?php

$host = 'localhost';
$user = 'root';
$clave = '';
$bd = 'aquashine1';
$puerto = '3306';

// Crear la conexión y asignarla a $conn
$conn = mysqli_connect($host, $user, $clave, $bd, $puerto);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>
