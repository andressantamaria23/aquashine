<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aquashine1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Línea de depuración
echo "Conexión establecida correctamente";
?>
